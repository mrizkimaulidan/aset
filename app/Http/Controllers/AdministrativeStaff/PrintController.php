<?php

namespace App\Http\Controllers\AdministrativeStaff;

use App\Http\Controllers\Controller;
use App\Models\CommodityUpdate;
use Illuminate\Http\Request;

class PrintController extends Controller
{
    public function print()
    {
        $commodity_updates = CommodityUpdate::with('commodities', 'commodity_categories', 'commodity_locations', 'users')->orderBy('commodity_id', 'asc')->get();

        return view('administrative-staff.reports.print', compact('commodity_updates'));
    }
}
