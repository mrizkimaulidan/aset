<?php

namespace Database\Seeders;

use App\Models\CommodityUpdate;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CommodityUpdateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 3; $i++) {
            CommodityUpdate::create([
                'commodity_id' => mt_rand(1, 5),
                'commodity_category_id' => mt_rand(1, 2),
                'commodity_location_id' => mt_rand(1, 5),
                'user_id' => 2,
                'amount' => mt_rand(1, 5),
                'update_date' => Carbon::createFromDate(date('Y'), mt_rand(1, 12), mt_rand(1, 31))
            ]);
        }
    }
}
