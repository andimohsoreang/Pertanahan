<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SeksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seksis = [
            [
                'id' => Str::ulid(),
                'nama_seksi' => 'Penguatan Kelembagaan DAS',
                'deskripsi' => 'Bertanggung jawab atas Penguatan Kelembagaan DAS'
            ],
            [
                'id' => Str::ulid(),
                'nama_seksi' => 'RHL',
                'deskripsi' => 'Mengelola dan mengawasi RHL'
            ],
            [
                'id' => Str::ulid(),
                'nama_seksi' => 'Perencanaan dan Evaluasi DAS',
                'deskripsi' => 'Menangani Perencanaan dan Evaluasi DAS'
            ],
            [
                'id' => Str::ulid(),
                'nama_seksi' => 'Sub Bagian Tata Usaha',
                'deskripsi' => 'Menangani Perencanaan dan Evaluasi DAS'
            ],
            // Tambahkan seksi lain sesuai kebutuhan
        ];

        // Masukkan data ke dalam tabel
        foreach ($seksis as $seksi) {
            DB::table('seksis')->insert($seksi);
        }
    }

}
