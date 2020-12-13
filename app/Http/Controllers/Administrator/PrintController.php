<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Commodity;

class PrintController extends Controller
{
    public function printByYear($year)
    {
        $commodities = Commodity::with('commodity_categories', 'commodity_locations')->whereYear('register_date', $year)->orderBy('name', 'asc')->get();

        return view('administrator.reports.print', compact('commodities', 'year'));
    }
}
