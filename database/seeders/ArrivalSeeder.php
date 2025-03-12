<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Arrival;
use App\Models\Employee;
use App\Models\Pic;
use Faker\Factory as Faker;

class ArrivalSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');
        $pics = Pic::all();
        $modaTransportasi = ['Pesawat', 'Kereta', 'Bus', 'Mobil Dinas'];

        foreach ($pics as $pic) {
            Arrival::create([
                'pic_id' => $pic->id,
                'moda_transportasi' => $faker->randomElement($modaTransportasi),
                'harga_tiket' => $faker->numberBetween(100000, 2000000),
                'nomor_tiket' => $faker->unique()->numerify('############'),
                'kode_booking' => $faker->unique()->bothify('??######'),
                'arrival_date' => $faker->dateTimeBetween('-1 year', '+1 year')
            ]);
        }
    }
}
