<?php

namespace App\Http\Controllers\Administrator;

use App\Models\User;
use App\Models\Commodity;
use Illuminate\Http\Request;
use App\Models\CommodityCategory;
use App\Models\CommodityLocation;
use App\Http\Controllers\Controller;
use App\Repositories\CommodityCategoryRepository;
use App\Repositories\CommodityLocationRepository;
use App\Repositories\CommodityRepository;
use App\Repositories\UserRepository;

class ReportController extends Controller
{
    private $commodityRepository,
        $commodityCategoryRepository,
        $commodityLocationRepository,
        $userRepository;

    public function __construct(CommodityRepository $commodityRepository, CommodityCategoryRepository $commodityCategoryRepository, CommodityLocationRepository $commodityLocationRepository, UserRepository $userRepository)
    {
        $this->commodityRepository = $commodityRepository;
        $this->commodityCategoryRepository = $commodityCategoryRepository;
        $this->commodityLocationRepository = $commodityLocationRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('administrator.reports.index', [
            'commodities' => $this->commodityRepository->getCommodityOrderBy('name')->get(),
            'commodity_categories' => $this->commodityCategoryRepository->getCommodityCategoryOrderBy('name')->get(),
            'commodity_locations' => $this->commodityLocationRepository->getCommodityLocationOrderBy('name')->get(),
            'users' => $this->userRepository->getUserOrderBy('name')->get(),
        ]);
    }
}
