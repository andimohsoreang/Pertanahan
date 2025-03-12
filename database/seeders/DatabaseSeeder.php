<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            DocumentTypeSeeder::class,
            DocumentSeeder::class,
            EmployeeSeeder::class,
            BussinessTripSeeder::class,
            PicSeeder::class,
            DepartureSeeder::class,
            ArrivalSeeder::class,
            PerdiemsSeeder::class,
            LodgingSeeder::class
        ]);
    }
}
