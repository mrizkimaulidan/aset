<?php

namespace App\Http\Controllers;

use App\Models\Commodity;
use App\Models\CommodityCategory;
use App\Models\CommodityLocation;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::with('roles')->get();
        $commodity_categories = CommodityCategory::get();
        $commodity_locations = CommodityLocation::get();
        $commodities = Commodity::with('commodity_categories', 'commodity_locations', 'users')->get();

        return view('home', compact('users', 'commodity_categories', 'commodity_locations', 'commodities'));
    }
}
