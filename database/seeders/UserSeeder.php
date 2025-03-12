<?php

namespace Database\Seeders;

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
        // Hapus data existing
        DB::table('users')->delete();

        // Data user dengan role berbeda
        $users = [
            [
                'id' => Str::ulid(),
                'name' => 'Super Admin',
                'email' => 'superadmin@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('SuperAdmin123!'),
                'role' => 'superadmin',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::ulid(),
                'name' => 'Head of Department',
                'email' => 'hod@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('HeadOfDept123!'),
                'role' => 'hod',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::ulid(),
                'name' => 'Verificator',
                'email' => 'verificator@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('Verificator123!'),
                'role' => 'verificator',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::ulid(),
                'name' => 'Operator',
                'email' => 'operator@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('Operator123!'),
                'role' => 'operator',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::ulid(),
                'name' => 'User Tidak Aktif',
                'email' => 'nonactive@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('NonActive123!'),
                'role' => 'operator',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];

        // Masukkan data
        User::insert($users);

        // Output informasi
        $this->command->info('User seeder berhasil dijalankan!');
        $this->command->info('Email dan Password:');
        $this->command->table(['Role', 'Email', 'Password'], [
            ['Super Admin', 'superadmin@example.com', 'SuperAdmin123!'],
            ['Head of Department', 'hod@example.com', 'HeadOfDept123!'],
            ['Verificator', 'verificator@example.com', 'Verificator123!'],
            ['Operator', 'operator@example.com', 'Operator123!'],
            ['Non Active', 'nonactive@example.com', 'NonActive123!']
        ]);
    }
}
