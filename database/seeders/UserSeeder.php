<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Seksi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cek apakah sudah ada seksi
        $seksi = Seksi::first();

        if (!$seksi) {
            $this->command->error('Tidak ada data seksi. Mohon buat data seksi terlebih dahulu.');
            return;
        }

        // Cek apakah sudah ada pegawai
        $employee = Employee::where('seksi_id', $seksi->id)->first();

        if (!$employee) {
            $this->command->error('Tidak ada data pegawai. Mohon buat data pegawai terlebih dahulu.');
            return;
        }

        // Cek apakah sudah ada user superadmin
        $existingSuperAdmin = User::where('role', 'superadmin')->first();

        if ($existingSuperAdmin) {
            $this->command->info('User SuperAdmin sudah ada!');
            $this->command->table(
                ['Username', 'Email', 'Role'],
                [[$existingSuperAdmin->username, $existingSuperAdmin->email, $existingSuperAdmin->role]]
            );
            return;
        }

        // Buat User SuperAdmin berdasarkan employee yang sudah ada
        $superAdmin = User::create([
            'employee_id' => $employee->id,
            'username' => 'superadmin',
            'email' => $employee->nama_pelaksana . '@pertanahan.go.id',
            'password' => Hash::make('password'),
            'role' => 'superadmin'
        ]);

        $this->command->info('Berhasil membuat akun Super Admin!');
        $this->command->table(
            ['Username', 'Email', 'Nama Pegawai', 'Seksi'],
            [[$superAdmin->username, $superAdmin->email, $employee->nama_pelaksana, $seksi->nama_seksi]]
        );
    }
}
