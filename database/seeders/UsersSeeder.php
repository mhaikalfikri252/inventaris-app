<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userData = [
            [
                'name' => 'mas admin',
                'email' => 'haikalfikri106@gmail.com',
                'password' => bcrypt('haikal106'),
                'role' => 'admin',
                'city_id' => '1',
            ],
            [
                'name' => 'mas user',
                'email' => 'haikal@vhiweb.com',
                'password' => bcrypt('haikal123'),
                'role' => 'user',
                'city_id' => '2',
            ]
        ];

        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
}
