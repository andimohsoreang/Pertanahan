<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Perdiem;
use App\Models\Employee;
use App\Models\Pic;
use Faker\Factory as Faker;

class PerdiemsSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');
        $pics = Pic::all();

        foreach ($pics as $pic) {
            Perdiem::create([
                'pic_id' => $pic->id,
                'jumlah_hari' => $faker->numberBetween(1, 10),
                'satuan' => $faker->numberBetween(50000, 500000),
                'total' => $faker->numberBetween(100000, 5000000)
            ]);
        }
    }
}
