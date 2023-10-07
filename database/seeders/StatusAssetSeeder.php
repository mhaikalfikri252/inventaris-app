<?php

namespace Database\Seeders;

use App\Models\StatusAsset;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusAssetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StatusAsset::create([
            'status_name' => 'Baik',
        ]);

        StatusAsset::create([
            'status_name' => 'Rusak',
        ]);
    }
}
