<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\City;
use App\Models\Employee;
use App\Models\Facility;
use App\Models\StatusAsset;
use App\Models\StatusBorrow;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        // City
        City::create([
            'city_name' => 'Banda Aceh',
        ]);

        City::create([
            'city_name' => 'Meulaboh',
        ]);

        City::create([
            'city_name' => 'Medan',
        ]);


        // Facility
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


        // Employee
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


        // Role
        Role::create([
            'name' => 'Admin',
        ]);

        Role::create([
            'name' => 'User',
        ]);


        // Status Asset
        StatusAsset::create([
            'status_name' => 'Baik',
        ]);

        StatusAsset::create([
            'status_name' => 'Rusak',
        ]);


        //Status Borrow
        StatusBorrow::create([
            'status_name' => 'Dipinjam',
        ]);

        StatusBorrow::create([
            'status_name' => 'Dikembalikan',
        ]);


        // User
        $admin = User::create([
            'username' => 'haikal106',
            'email' => 'haikalfikri106@gmail.com',
            'password' => bcrypt('haikal106'),
            'role_id' => '1',
            'city_id' => '1',
        ]);
        $admin->assignRole('admin');

        $user = User::create([
            'username' => 'haikal123',
            'email' => 'haikal@vhiweb.com',
            'password' => bcrypt('haikal123'),
            'role_id' => '2',
            'city_id' => '1',
        ]);
        $user->assignRole('user');

        $user = User::create([
            'username' => 'meulaboh123',
            'email' => 'meulaboh123@gmail.com',
            'password' => bcrypt('meulaboh123'),
            'role_id' => '2',
            'city_id' => '2',
        ]);
        $user->assignRole('user');
    }
}
