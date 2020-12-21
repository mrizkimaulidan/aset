<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommodityRequest;
use App\Http\Requests\UpdateCommodityRequest;
use App\Models\Commodity;
use App\Models\CommodityCategory;
use App\Models\CommodityLocation;
use App\Models\User;
use App\Repositories\CommodityCategoryRepository;
use App\Repositories\CommodityLocationRepository;
use App\Repositories\CommodityRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class CommodityController extends Controller
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
        return view('administrator.commodities.index', [
            'commodities' => $this->commodityRepository->getCommodityOrderBy('name')->get(),
            'commodity_categories' => $this->commodityCategoryRepository->getCommodityCategoryOrderBy('name')->get(),
            'commodity_locations' => $this->commodityLocationRepository->getCommodityLocationOrderBy('name')->get(),
            'users' => $this->userRepository->getUserOrderBy('name')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommodityRequest $request)
    {
        $this->commodityRepository->store($request);

        return redirect()->route('admin.aset.index')->with('success', 'Data aset berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('administrator.commodities.edit', [
            'commodity' => $this->commodityRepository->commodityFind($id),
            'commodity_categories' => $this->commodityCategoryRepository->getCommodityCategoryOrderBy('name')->get(),
            'commodity_locations' => $this->commodityLocationRepository->getCommodityLocationOrderBy('name')->get(),
            'users' => $this->userRepository->getUserOrderBy('name')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCommodityRequest $request, $id)
    {
        $this->commodityRepository->update($request, $id);

        return redirect()->route('admin.aset.edit', $id)->with('success', 'Data aset berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->commodityRepository->commodityFind($id)->delete();

        return redirect()->route('admin.aset.index')->with('success', 'Data aset berhasil dihapus!');
    }
}
