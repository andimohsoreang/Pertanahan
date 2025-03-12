<?php

namespace App\Http\Controllers;

use App\Models\BusinessTrip;
use App\Models\TripFile;
use App\Models\Seksi;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function showDashboard(Request $request)
    {
        // Mendapatkan user dan seksi_id melalui relasi employee
        if (Auth::check()) {
            $user = Auth::user();
            $userRole = $user->role ?? 'user';

            // Dapatkan seksi_id melalui relasi employee
            $userSeksiId = null;
            if ($user->employee) {
                $userSeksiId = $user->employee->seksi_id;
            }
        } else {
            $userRole = 'guest';
            $userSeksiId = null;
        }

        // Log untuk debugging
        Log::info('User Role: ' . $userRole);
        Log::info('User Seksi ID: ' . ($userSeksiId ?? 'null'));

        // Total keseluruhan
        $totalbusinessTrips = BusinessTrip::count();
        $totalFilesTrips = TripFile::count();

        // Dapatkan semua seksi
        $seksis = Seksi::all();

        // Array untuk menyimpan statistik per seksi
        $seksiStats = [];

        // Filter seksi berdasarkan role - Sesuaikan dengan enum di migrasi
        if (in_array($userRole, ['superadmin', 'hod', 'admin'])) {
            // Superadmin, HOD, dan admin melihat semua seksi
            $seksiToShow = $seksis;
            Log::info('User is admin/superadmin/hod, showing all seksi');
        } else {
            // User biasa (operator, verificator) hanya melihat seksi mereka sendiri
            if ($userSeksiId) {
                $seksiToShow = Seksi::where('id', $userSeksiId)->get();
                Log::info('User has seksi_id, showing only their seksi');
            } else {
                // Jika tidak memiliki seksi_id, tampilkan kosong
                $seksiToShow = collect([]);
                Log::info('User has no seksi_id, showing empty data');
            }
        }

        // Looping untuk setiap seksi yang akan ditampilkan
        foreach ($seksiToShow as $seksi) {
            $employeeIds = Employee::where('seksi_id', $seksi->id)->pluck('id');

            $totalPerjalanan = BusinessTrip::whereHas('pics', function ($query) use ($employeeIds) {
                $query->whereIn('employee_id', $employeeIds);
            })->count();

            $totalLengkap = BusinessTrip::whereHas('pics', function ($query) use ($employeeIds) {
                $query->whereIn('employee_id', $employeeIds);
            })
                ->whereHas('document')
                ->whereHas('files')
                ->count();

            $totalBelumLengkap = $totalPerjalanan - $totalLengkap;

            $totalFiles = TripFile::whereHas('businessTrip.pics', function ($query) use ($employeeIds) {
                $query->whereIn('employee_id', $employeeIds);
            })->count();

            $seksiStats[$seksi->id] = [
                'nama_seksi' => $seksi->nama_seksi,
                'total_perjalanan' => $totalPerjalanan,
                'total_lengkap' => $totalLengkap,
                'total_belum_lengkap' => $totalBelumLengkap,
                'total_files' => $totalFiles
            ];
        }

        // Tambahkan log untuk debugging
        Log::info('Seksi to show count: ' . count($seksiToShow));
        Log::info('Seksi stats count: ' . count($seksiStats));

        // Hitung total untuk semua seksi
        $totalPerjalananAll = 0;
        $totalLengkapAll = 0;
        $totalBelumLengkapAll = 0;
        $totalFilesAll = 0;

        foreach ($seksiStats as $stat) {
            $totalPerjalananAll += $stat['total_perjalanan'];
            $totalLengkapAll += $stat['total_lengkap'];
            $totalBelumLengkapAll += $stat['total_belum_lengkap'];
            $totalFilesAll += $stat['total_files'];
        }

        // Pass user role dan totals ke view
        return view('mainDashboard.dashMain', compact(
            'totalbusinessTrips',
            'totalFilesTrips',
            'seksiStats',
            'userRole',
            'totalPerjalananAll',
            'totalLengkapAll',
            'totalBelumLengkapAll',
            'totalFilesAll'
        ));
    }
}
