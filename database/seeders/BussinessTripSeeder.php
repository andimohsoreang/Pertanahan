<?php

namespace Database\Seeders;

use App\Models\BusinessTrip;
use App\Models\Document;
use App\Models\Seksi;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class BussinessTripSeeder extends Seeder
{
    public function run()
    {
        // Pastikan dokumen dan seksi sudah ada
        $documents = Document::all();
        $seksis = Seksi::all();

        // Jika dokumen atau seksi kosong, jalankan seeder terkait
        if ($documents->isEmpty()) {
            $this->call(DocumentSeeder::class);
            $documents = Document::all();
        }

        if ($seksis->isEmpty()) {
            $this->call(SeksiSeeder::class);
            $seksis = Seksi::all();
        }

        $faker = Faker::create('id_ID');

        for ($i = 0; $i < 100; $i++) {
            // Perhitungan biaya perjalanan dinas
            $transportAntarKota = $faker->numberBetween(100000, 1000000);
            $taksiAirport = $faker->numberBetween(50000, 500000);
            $lainLain = $faker->numberBetween(20000, 200000);
            $grandTotal = $transportAntarKota + $taksiAirport + $lainLain;

            BusinessTrip::create([
                'id' => Str::ulid(), // Gunakan ULID
                'document_id' => $documents->random()->id,
                'seksi_id' => $seksis->random()->id, // Tambahkan relasi seksi
                'nomor_spm' => 'SPM-' . $faker->unique()->numerify('####'),
                'nomor_sp2d' => 'SP2D-' . $faker->unique()->numerify('####'),
                'transport_antar_kota' => $transportAntarKota,
                'taksi_airport' => $taksiAirport,
                'lain_lain' => $lainLain,
                'grand_total' => $grandTotal,
                // Opsional: Tambahkan status atau keterangan tambahan
                // 'status_lengkap' => $faker->randomElement(['Berkas Lengkap', 'Berkas Belum Lengkap'])
            ]);
        }
    }
}
