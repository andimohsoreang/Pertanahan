<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DocumentType;
use Faker\Factory as Faker;

class DocumentTypeSeeder extends Seeder
{
    public function run()
    {
        $documentTypes = [
            'Surat Tugas',
            'Surat Perjalanan Dinas',
            'Laporan Perjalanan',
            'Kwitansi Pembayaran',
            'Surat Perintah Membayar'
        ];

        foreach ($documentTypes as $type) {
            DocumentType::create([
                'jenis_dokumen' => $type
            ]);
        }
    }
}
