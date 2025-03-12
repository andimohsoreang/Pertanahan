<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


use Exception;


class AccountController extends Controller
{
    public function index()
    {
        Log::info('Users List Account Accessed', [
            'user_id' => Auth::id(),
            'username' => Auth::user()->username,
            'role' => Auth::user()->role,
            'full_url' => request()->fullUrl()
        ]);
        $users = User::with('employee')->get();
        return view('users.get', compact('users'));
    }

    public function createAccount()
    {
        $employees = Employee::whereDoesntHave('user')->get();
        return view('users.create', compact('employees'));
    }

    public function storeAccount(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'role' => 'required'
        ]);

        // Menggunakan Hash::make() yang direkomendasikan di Laravel
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash::make diperlukan agar password bekerja dengan Auth
            'role' => $request->role,
            'employee_id' => $request->employee_id
        ]);

        return redirect()->route('users.listAccount')->with('success', 'User berhasil dibuat');
    }

    public function editAccount($id)
    {
        try {
            $user = User::findOrFail($id);
            $employees = Employee::whereDoesntHave('user')
                ->orWhere(function ($query) use ($user) {
                    $query->whereHas('user', function ($q) use ($user) {
                        $q->where('id', $user->id);
                    });
                })
                ->get();

            return view('users.edit', compact('user', 'employees'));
        } catch (Exception $e) {
            return redirect()->route('users.listAccount')
                ->with('error', 'User tidak ditemukan');
        }
    }

    public function updateAccount(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);

            // Validasi
            $request->validate([
                'username' => 'required|unique:users,username,' . $id,
                'email' => 'required|email|unique:users,email,' . $id,
                'role' => 'required'
            ]);

            // Update data user
            $user->username = $request->username;
            $user->email = $request->email;
            $user->employee_id = $request->employee_id;
            $user->role = $request->role;

            // Update password jika diisi
            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }

            $user->save();

            return redirect()->route('users.listAccount')
                ->with('success', 'User berhasil diupdate');
        } catch (Exception $e) {
            Log::error('User Update Error', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->back()
                ->with('error', 'Gagal mengupdate user: ' . $e->getMessage());
        }
    }

    public function destroyAccount($id)
    {
        try {
            $user = User::findOrFail($id);

            // Cek apakah user adalah superadmin terakhir
            $superadminCount = User::where('role', 'superadmin')->count();

            if ($user->role === 'superadmin' && $superadminCount <= 1) {
                return response()->json([
                    'success' => false,
                    'message' => 'Tidak dapat menghapus satu-satunya superadmin'
                ], 400);
            }

            $user->delete();

            return response()->json([
                'success' => true,
                'message' => 'User berhasil dihapus'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus user: ' . $e->getMessage()
            ], 500);
        }
    }

    public function getJson(Request $request)
    {
        try {
            $query = User::with('employee.seksi');

            // Implementasi filtering dan sorting
            if ($request->filled('nama_user')) {
                $query->where('username', 'like', '%' . $request->nama_user . '%')
                    ->orWhereHas('employee', function ($q) use ($request) {
                        $q->where('nama_pelaksana', 'like', '%' . $request->nama_user . '%');
                    });
            }
            // Tambahkan filter nama seksi
            if ($request->filled('nama_seksi')) {
                $query->whereHas('employee.seksi', function ($q) use ($request) {
                    $q->where('nama_seksi', 'like', '%' . $request->nama_seksi . '%');
                });
            }

            if ($request->filled('role')) {
                $query->where('role', $request->role);
            }

            $users = $query->get()->map(function ($user) {
                return [
                    'id' => $user->id,
                    'username' => $user->username,
                    'email' => $user->email,
                    'role' => $user->role,
                    'employee' => $user->employee ? [
                        'nama_pelaksana' => $user->employee->nama_pelaksana,
                        'jabatan' => $user->employee->jabatan,
                        'seksi' => $user->employee->seksi ? [
                            'nama_seksi' => $user->employee->seksi->nama_seksi
                        ] : null
                    ] : null
                ];
            });

            return response()->json([
                'status' => 'success',
                'data' => $users
            ]);
        } catch (Exception $e) {
            Log::error('User JSON Error', [
                'message' => $e->getMessage()
            ]);

            return response()->json([
                'status' => 'error',
                'message' => 'Gagal memuat data'
            ], 500);
        }
    }
}
