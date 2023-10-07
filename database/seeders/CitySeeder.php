<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::create([
            'city_name' => 'Banda Aceh',
        ]);

        City::create([
            'city_name' => 'Meulaboh',
        ]);

        City::create([
            'city_name' => 'Medan',
        ]);
    }
}
