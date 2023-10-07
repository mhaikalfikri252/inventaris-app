<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
