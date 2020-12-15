<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommodityCategoryRequest;
use App\Http\Requests\UpdateCommodityCategoryRequest;
use App\Models\CommodityCategory;
use Illuminate\Http\Request;

class CommodityCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commodity_categories = CommodityCategory::orderBy('name', 'asc')->get();

        return view('administrator.commodity_categories.index', compact('commodity_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommodityCategoryRequest $request)
    {
        $commodity_category = new CommodityCategory();
        $commodity_category->name = $request->name;
        $commodity_category->description = $request->description;
        $commodity_category->save();

        return redirect()->route('admin.jenis-aset.index')->with('success', 'Data jenis aset berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 
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
        $commodity_category = CommodityCategory::findOrFail($id);
        $commodity_category->name = $request->name_edit;
        $commodity_category->description = $request->description_edit;
        $commodity_category->save();

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
        CommodityCategory::findOrFail($id)->delete();

        return redirect()->route('admin.jenis-aset.index')->with('success', 'Data jenis aset berhasil dihapus!');
    }
}
