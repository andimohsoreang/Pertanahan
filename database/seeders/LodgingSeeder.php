<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lodging;
use App\Models\Employee;
use App\Models\Pic;
use Faker\Factory as Faker;

class LodgingSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');
        $pics = Pic::all();

        foreach ($pics as $pic) {
            Lodging::create([
                'pic_id' => $pic->id,
                'jumlah_malam' => $faker->numberBetween(1, 7),
                'satuan' => $faker->numberBetween(100000, 1000000),
                'total' => $faker->numberBetween(500000, 7000000)
            ]);
        }
    }
}
