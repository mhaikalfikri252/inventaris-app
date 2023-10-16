<?php

namespace Database\Seeders;

use App\Models\StatusBorrow;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusBorrowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StatusBorrow::create([
            'status_name' => 'Dipinjam',
        ]);

        StatusBorrow::create([
            'status_name' => 'Dikembalikan',
        ]);
    }
}
