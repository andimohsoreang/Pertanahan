<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Document;
use App\Models\DocumentType;
use Faker\Factory as Faker;

class DocumentSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');
        $documentTypes = DocumentType::all();

        for ($i = 0; $i < 50; $i++) {
            Document::create([
                'jenis_dokumen_id' => $documentTypes->random()->id,
                'nomor_dokumen' => 'DOK-' . $faker->unique()->numerify('####'),
                'tanggal_pembuatan' => $faker->dateTimeBetween('-2 years', 'now')
            ]);
        }
    }
}
