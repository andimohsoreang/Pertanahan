<?php

namespace App\Http\Controllers;

use App\Http\Requests\PegwaiStroreRequest;
use App\Models\Employee;
use App\Models\Seksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\PegawaiUpdateRequest; // Pastikan untuk mengimpor PegawaiUpdateRequest


class PegawaiController extends Controller
{

    public function getDataPegawai()
    {


        // Ambil daftar seksi untuk filter
        $seksis = Seksi::all();

        // Ambil data pegawai
        $employees = Employee::with('seksi')->get();

//        dd($employees);

        return view('employee.getData', [
            'employees' => $employees,
            'seksis' => $seksis
        ]);
    }

    public function getDataPegawaiJson(Request $request)
    {
        // Log incoming request for debugging
        Log::channel('pegawai_debug')->info('Incoming request to getDataPegawaiJson', [
            'jenis_kelamin' => $request->jenis_kelamin,
            'status_pegawai' => $request->status_pegawai,
            'seksi_id' => $request->seksi_id
        ]);

        $query = Employee::with('seksi'); // Eager loading seksi

        // Filter berdasarkan jenis kelamin
        if ($request->filled('jenis_kelamin')) {
            Log::channel('pegawai_debug')->info('Filtering by jenis_kelamin', ['jenis_kelamin' => $request->jenis_kelamin]);
            $query->where('jenis_kelamin', $request->jenis_kelamin);
        }

        // Filter berdasarkan status pegawai (KLHK/Non KLHK)
        if ($request->filled('status_pegawai')) {
            Log::channel('pegawai_debug')->info('Filtering by status_pegawai', ['status_pegawai' => $request->status_pegawai]);
            $query->where('status_pegawai', $request->status_pegawai);
        }

        // Filter berdasarkan seksi
        if ($request->filled('seksi_id')) {
            Log::channel('pegawai_debug')->info('Filtering by seksi_id', ['seksi_id' => $request->seksi_id]);
            $query->where('seksi_id', $request->seksi_id);
        }

        // Tambahkan pencarian nama pelaksana
        if ($request->filled('nama_pelaksana')) {
            Log::channel('pegawai_debug')->info('Filtering by nama_pelaksana', ['nama_pelaksana' => $request->nama_pelaksana]);
            $query->where('nama_pelaksana', 'like', "%{$request->nama_pelaksana}%");
        }

        // Log the query to check the SQL being executed
        Log::channel('pegawai_debug')->info('Executing query:', [
            'query' => $query->toSql(),
            'bindings' => $query->getBindings()
        ]);

        // Execute the query and get the employees
        $employees = $query->get();

        // Transform the data to include seksi information
        $transformedEmployees = $employees->map(function ($employee) {
            return [
                'id' => $employee->id,
                'nama_pelaksana' => $employee->nama_pelaksana,
                'jenis_kelamin' => $employee->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan',
                'pangkat_golongan' => $employee->pangkat_golongan,
                'jabatan' => $employee->jabatan,
                'status_pegawai' => $employee->status_pegawai,
                'no_telp' => $employee->no_telp,
                'seksi' => $employee->seksi ? [
                    'id' => $employee->seksi->id,
                    'nama_seksi' => $employee->seksi->nama_seksi
                ] : null
            ];
        });

        // Log the response data
        Log::channel('pegawai_debug')->info('Returned employees', [
            'employees_count' => $transformedEmployees->count(),
            'employees_data' => $transformedEmployees
        ]);

        return response()->json($transformedEmployees);
    }


    public function createPegawai()
    {
        try {
            // Log debug info
            Log::info('Membuka halaman tambah pegawai');

            // Ambil daftar seksi untuk dropdown
            $seksis = Seksi::all();

            // Logika rendering tampilan dengan mengirim data seksi
            return view('employee.createData', [
                'seksis' => $seksis
            ]);
        } catch (\Exception $e) {
            // Menangkap exception dan mencatat error
            Log::error('Error dalam method createPegawai', [
                'error_message' => $e->getMessage(),
                'error_trace' => $e->getTraceAsString()
            ]);

            // Mengembalikan response error atau redirect ke halaman error
            return redirect()->route('pegawai.get')->with('error', 'Gagal membuka halaman tambah pegawai: ' . $e->getMessage());
        }
    }



    public function storePegawai(Request $request)
    {
        try {
            // Validasi input
            $validator = Validator::make($request->all(), [
                'nama_pelaksana' => 'required|string|max:255',
                'jenis_kelamin' => 'required|in:L,P',
                'status_pegawai' => 'required|in:KLHK,Non KLHK',
                'pangkat_golongan' => 'required|string|max:255',
                'jabatan' => 'required|string|max:255',
                'no_telp' => 'required|string|max:255',
                'seksi_id' => 'required|exists:seksis,id'
            ]);

            // Jika validasi gagal
            if ($validator->fails()) {
                Log::warning('Validasi tambah pegawai gagal', [
                    'errors' => $validator->errors()->toArray(),
                    'input' => $request->all()
                ]);

                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            // Buat pegawai baru
            $employee = new Employee();
            $employee->nama_pelaksana = $request->nama_pelaksana;
            $employee->jenis_kelamin = $request->jenis_kelamin;
            $employee->status_pegawai = $request->status_pegawai;
            $employee->pangkat_golongan = $request->pangkat_golongan;
            $employee->no_telp = $request->no_telp;
            $employee->jabatan = $request->jabatan;
            $employee->seksi_id = $request->seksi_id;
            $employee->save();

            // Log keberhasilan
            Log::info('Pegawai berhasil ditambahkan', [
                'employee_id' => $employee->id,
                'nama_pelaksana' => $employee->nama_pelaksana
            ]);

            // Redirect dengan pesan sukses
            return redirect()->route('pegawai.get')->with('success', 'Pegawai berhasil ditambahkan');
        } catch (\Exception $e) {
            // Tangkap dan catat error
            Log::error('Error dalam method storePegawai', [
                'error_message' => $e->getMessage(),
                'error_trace' => $e->getTraceAsString(),
                'input' => $request->all()
            ]);

            // Redirect dengan pesan error
            return redirect()->back()->with('error', 'Gagal menambahkan pegawai: ' . $e->getMessage());
        }
    }



    public function editPegawai($id)
    {
        try {
            // Mencari data pegawai berdasarkan ID dengan relasi seksi
            $employee = Employee::with('seksi')->findOrFail($id);

            // Ambil daftar seksi untuk dropdown
            $seksis = Seksi::all();

            // Mencatat data pegawai yang ditemukan
            Log::channel('pegawai_debug')->info('Employee data retrieved for editing', [
                'employee_id' => $employee->id,
                'nama_pelaksana' => $employee->nama_pelaksana
            ]);

            // Mengembalikan view edit dengan membawa data pegawai dan seksi
            return view('employee.editData', [
                'employee' => $employee,
                'seksis' => $seksis
            ]);
        } catch (\Exception $e) {
            // Menangkap error jika pegawai tidak ditemukan atau ada masalah lain
            Log::channel('pegawai_error')->error('Error in editPegawai method', [
                'employee_id' => $id,
                'error_message' => $e->getMessage(),
                'error_trace' => $e->getTraceAsString()
            ]);

            // Redirect dengan pesan error
            return redirect()->route('pegawai.get')
                ->with('error', 'Pegawai tidak ditemukan: ' . $e->getMessage());
        }
    }




    public function updatePegawai(Request $request, $id)
    {
        try {
            // Validasi input dengan aturan yang lebih detail
            $validator = Validator::make($request->all(), [
                'nama_pelaksana' => 'required|string|max:255',
                'jenis_kelamin' => 'required|in:L,P',
                'pangkat_golongan' => 'required|string|max:100',
                'jabatan' => 'required|string|max:255',
                'no_telp' => 'required|string|max:255',
                'status_pegawai' => 'required|in:KLHK,Non KLHK',
                'seksi_id' => 'required|exists:seksis,id'
            ], [
                // Custom error messages
                'nama_pelaksana.required' => 'Nama pelaksana wajib diisi.',
                'jenis_kelamin.required' => 'Jenis kelamin wajib dipilih.',
                'pangkat_golongan.required' => 'Pangkat golongan wajib diisi.',
                'jabatan.required' => 'Jabatan wajib diisi.',
                'status_pegawai.required' => 'Status pegawai wajib dipilih.',
                'no_telp.required' => 'Nomor Telp Wajib diisi.',

                'seksi_id.required' => 'Seksi wajib dipilih.',
                'seksi_id.exists' => 'Seksi yang dipilih tidak valid.'
            ]);

            // Jika validasi gagal
            if ($validator->fails()) {
                // Mencatat error validasi
                Log::channel('pegawai_debug')->warning('Validation failed for employee update', [
                    'employee_id' => $id,
                    'errors' => $validator->errors()->toArray(),
                    'input' => $request->except(['_token', '_method'])
                ]);

                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            // Mencari data pegawai berdasarkan ID
            $employee = Employee::findOrFail($id);

            // Menyimpan perubahan pada data pegawai
            $employee->update([
                'nama_pelaksana' => $request->nama_pelaksana,
                'jenis_kelamin' => $request->jenis_kelamin,
                'pangkat_golongan' => $request->pangkat_golongan,
                'jabatan' => $request->jabatan,
                'status_pegawai' => $request->status_pegawai,
                'no_telp' => $request->no_telp,
                'seksi_id' => $request->seksi_id
            ]);

            // Mencatat keberhasilan update
            Log::channel('pegawai_debug')->info('Employee updated successfully', [
                'employee_id' => $employee->id,
                'nama_pelaksana' => $employee->nama_pelaksana
            ]);

            // Redirect dengan pesan sukses
            return redirect()->route('pegawai.get')
                ->with('success', 'Pegawai berhasil diperbarui.');
        } catch (\Illuminate\Database\QueryException $e) {
            // Menangkap kesalahan terkait query/database
            Log::channel('pegawai_error')->error('Database error while updating employee', [
                'employee_id' => $id,
                'error_message' => $e->getMessage(),
                'error_code' => $e->getCode(),
                'sql_state' => $e->getSqlState()
            ]);

            // Mengembalikan error ke halaman sebelumnya
            return redirect()->route('pegawai.get')
                ->with('error', 'Gagal memperbarui data pegawai. Terjadi masalah pada database.');
        } catch (\Exception $e) {
            // Menangkap kesalahan lainnya yang tidak terduga
            Log::channel('pegawai_error')->error('General error in updatePegawai method', [
                'employee_id' => $id,
                'error_message' => $e->getMessage(),
                'error_trace' => $e->getTraceAsString()
            ]);

            // Mengembalikan error ke halaman sebelumnya
            return redirect()->route('pegawai.get')
                ->with('error', 'Terjadi kesalahan saat memperbarui pegawai: ' . $e->getMessage());
        }
    }


    public function destroyPegawai($id)
    {
        try {
            // Mencari data pegawai berdasarkan ID
            $employee = Employee::findOrFail($id);
            $employee->delete();

            // Mengalihkan ke halaman daftar pegawai dengan pesan sukses
            return redirect()->route('pegawai.get')->with('success', 'Pegawai berhasil dihapus.');
        } catch (\Exception $e) {
            // Menangkap error jika ada masalah dalam menghapus
            Log::error('Error in destroy method: ' . $e->getMessage());

            return redirect()->route('pegawai.get')->with('error', 'Terjadi kesalahan saat menghapus pegawai.');
        }
    }
}
