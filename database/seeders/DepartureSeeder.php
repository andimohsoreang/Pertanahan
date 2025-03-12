<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Departure;
use App\Models\Employee;
use App\Models\Pic;
use Faker\Factory as Faker;

class DepartureSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');
        $pics = Pic::all();
        $modaTransportasi = ['Pesawat', 'Kereta', 'Bus', 'Mobil Dinas'];

        foreach ($pics as $pic) {
            Departure::create([
                'pic_id' => $pic->id,
                'mode_transportation' => $faker->randomElement($modaTransportasi),
                'ticket_price' => $faker->numberBetween(100000, 2000000),
                'ticket_number' => $faker->unique()->numerify('############'),
                'booking_code' => $faker->unique()->bothify('??######'),
                'departure_date' => $faker->dateTimeBetween('-1 year', '+1 year')
            ]);
        }
    }
}
