<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserProfileRequest;
use App\Models\Commodity;
use App\Models\CommodityCategory;
use App\Models\CommodityLocation;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    private $userRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
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

    public function updateProfile(UpdateUserProfileRequest $request)
    {
        $this->userRepository->updateProfile($request);

        return redirect()->route('dashboard')->with('success', 'Profil berhasil diubah!');
    }
}
