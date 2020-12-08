<?php

namespace Database\Seeders;

use App\Models\CommodityCategory;
use Illuminate\Database\Seeder;

class CommodityCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CommodityCategory::create([
            'name' => 'Elektronik',
            'description' => 'Deskripsi jenis elektronik.'
        ]);

        CommodityCategory::create([
            'name' => 'Prasarana',
            'description' => 'Deskripsi jenis prasarana.'
        ]);
    }
}
