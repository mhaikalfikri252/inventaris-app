<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::create([
            'employee_name' => 'Usman',
            'city_id' => '1',
            'address' => 'Ulee Kareng',
            'phone' => '081340708090',
            'position' => 'Staff ICT',
        ]);

        Employee::create([
            'employee_name' => 'Abu',
            'city_id' => '1',
            'address' => 'Banda Raya',
            'phone' => '081340702678',
            'position' => 'Staff Keuangan',
        ]);

        Employee::create([
            'employee_name' => 'Ali',
            'city_id' => '1',
            'address' => 'Lueng Bata',
            'phone' => '081340706789',
            'position' => 'Manager',
        ]);

        Employee::create([
            'employee_name' => 'Ridho',
            'city_id' => '2',
            'address' => 'Syiah Kuala',
            'phone' => '081340702456',
            'position' => 'Staff Keuangan',
        ]);

        Employee::create([
            'employee_name' => 'Roma',
            'city_id' => '2',
            'address' => 'Meuraxa',
            'phone' => '081340702099',
            'position' => 'Staff ICT',
        ]);
    }
}
