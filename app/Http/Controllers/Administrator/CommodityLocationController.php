<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommodityLocationRequest;
use App\Http\Requests\UpdateCommodityLocationRequest;
use App\Models\CommodityLocation;
use App\Repositories\CommodityLocationRepository;
use Illuminate\Http\Request;

class CommodityLocationController extends Controller
{
    private $commodityLocationRepository;

    public function __construct(CommodityLocationRepository $commodityLocationRepository)
    {
        $this->commodityLocationRepository = $commodityLocationRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('administrator.commodity_locations.index', [
            'commodity_locations' => $this->commodityLocationRepository->getCommodityLocationOrderBy('name')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommodityLocationRequest $request)
    {
        $this->commodityLocationRepository->store($request);

        return redirect()->route('admin.ruangan.index')->with('success', 'Data ruangan berhasil ditambahkan!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCommodityLocationRequest $request, $id)
    {
        $this->commodityLocationRepository->update($request, $id);

        return redirect()->route('admin.ruangan.index')->with('success', 'Data ruangan berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->commodityLocationRepository->findCommodityLocation($id)->commodities()->exists()) {
            return redirect()->route('admin.ruangan.index')->with('error', 'Data yang memiliki relasi tidak dapat dihapus!');
        }

        $this->commodityLocationRepository->delete($id);

        return redirect()->route('admin.ruangan.index')->with('success', 'Data ruangan berhasil dihapus!');
    }
}
