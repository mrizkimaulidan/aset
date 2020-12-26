<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommodityCategoryRequest;
use App\Http\Requests\UpdateCommodityCategoryRequest;
use App\Models\CommodityCategory;
use App\Repositories\CommodityCategoryRepository;
use Illuminate\Http\Request;

class CommodityCategoryController extends Controller
{
    private $commodityCategoryRepository;

    public function __construct(CommodityCategoryRepository $commodityCategoryRepository)
    {
        $this->commodityCategoryRepository = $commodityCategoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('administrator.commodity_categories.index', [
            'commodity_categories' => $this->commodityCategoryRepository->getCommodityCategoryOrderBy('name')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommodityCategoryRequest $request)
    {
        $this->commodityCategoryRepository->store($request);

        return redirect()->route('admin.jenis-aset.index')->with('success', 'Data jenis aset berhasil ditambahkan!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCommodityCategoryRequest $request, $id)
    {
        $this->commodityCategoryRepository->update($request, $id);

        return redirect()->route('admin.jenis-aset.index')->with('success', 'Data jenis aset berhasil ditambahkan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->commodityCategoryRepository->findCommodityCategory($id)->commodities()->exists() || $this->commodityCategoryRepository->findCommodityCategory($id)->commodity_updates()->exists()) {
            return redirect()->route('admin.jenis-aset.index')->with('error', 'Data yang memiliki relasi tidak dapat dihapus!');
        }

        $this->commodityCategoryRepository->delete($id);

        return redirect()->route('admin.jenis-aset.index')->with('success', 'Data jenis aset berhasil dihapus!');
    }
}
