<?php

namespace Database\Seeders;

use App\Models\Facility;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Facility::create([
            'facility_code' => 'R871562',
            'facility_name' => 'FS',
            'city_id' => '1',
        ]);

        Facility::create([
            'facility_code' => 'R877812',
            'facility_name' => 'SFC',
            'city_id' => '1',
        ]);

        Facility::create([
            'facility_code' => 'R898312',
            'facility_name' => 'YC',
            'city_id' => '1',
        ]);

        Facility::create([
            'facility_code' => 'R111312',
            'facility_name' => 'EDC',
            'city_id' => '1',
        ]);

        Facility::create([
            'facility_code' => 'R871312',
            'facility_name' => 'SFC',
            'city_id' => '2',
        ]);

        Facility::create([
            'facility_code' => 'R230202',
            'facility_name' => 'FS',
            'city_id' => '2',
        ]);
    }
}
