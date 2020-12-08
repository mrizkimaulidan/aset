<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Commodity;
use Carbon\Carbon;

class CommoditySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $commodities = [
            'Televisi',
            'Radio',
            'Kipas Angin',
            'Microwave/Oven',
            'Rice Cooker',
            'Mesin Cuci',
            'Water Dispenser',
            'Lemari Pendingin',
            'Blender',
            'Komputer',
            'Laptop',
            'MP3 Player',
            'Senter',
            'Coffe Maker',
        ];

        $conditions = [
            'Sudah Layak',
            'Layak Sebagian',
            'Tidak Layak'
        ];

        for ($i = 0; $i < count($commodities); $i++) {
            Commodity::create([
                'user_id' => 1,
                'commodity_category_id' => 1,
                'commodity_location_id' => mt_rand(1, 10),
                'unique_commodity_number' => '00' . mt_rand(100, 500) . mt_rand(1, 9) . date('Y'),
                'name' => $commodities[$i],
                'amount' => mt_rand(5, 10),
                'register_date' => Carbon::createFromDate(date('Y'), mt_rand(1, 12), mt_rand(1, 31)),
                'condition' => $conditions[mt_rand(0, count($conditions) - 1)]
            ]);
        }
    }
}
