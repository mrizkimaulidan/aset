<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommodityCategory extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function commodities()
    {
        return $this->hasOne(Commodity::class);
    }

    public function commodity_updates()
    {
        return $this->hasOne(CommodityUpdate::class);
    }
}
