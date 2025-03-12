<?php

namespace Database\Seeders;

use App\Models\BusinessTrip;
use Illuminate\Database\Seeder;
use App\Models\Pic;
use App\Models\BussinessTrip;
use App\Models\Employee;
use Faker\Factory as Faker;

class PicSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');
        $businessTrips = BusinessTrip::all();
        $employees = Employee::all();

        foreach ($businessTrips as $trip) {
            Pic::create([
                'business_trip_id' => $trip->id,
                'employee_id' => $employees->random()->id,
                'uraian_tugas' => $faker->sentence,
                'surat_tugas_nomor' => 'ST-' . $faker->unique()->numerify('####'),
                'surat_tugas_tanggal' => $faker->dateTimeBetween('-2 years', 'now'),
                'tanggal_mulai' => $faker->dateTimeBetween('-1 year', 'now'),
                'tanggal_selesai' => $faker->dateTimeBetween('now', '+1 year')
            ]);
        }
    }
}
