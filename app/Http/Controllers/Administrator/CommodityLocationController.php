<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommodityLocationRequest;
use App\Http\Requests\UpdateCommodityLocationRequest;
use App\Models\CommodityLocation;
use Illuminate\Http\Request;

class CommodityLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commodity_locations = CommodityLocation::orderBy('name', 'asc')->get();

        return view('administrator.commodity_locations.index', compact('commodity_locations'));
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
    public function store(StoreCommodityLocationRequest $request)
    {
        $commodity_location = new CommodityLocation();
        $commodity_location->name = $request->name;
        $commodity_location->description = $request->description;
        $commodity_location->save();

        return redirect()->route('admin.ruangan.index')->with('success', 'Data ruangan berhasil ditambahkan!');
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
    public function update(UpdateCommodityLocationRequest $request, $id)
    {
        $commodity_location = CommodityLocation::findOrFail($id);
        $commodity_location->name = $request->name_edit;
        $commodity_location->description = $request->description_edit;
        $commodity_location->save();

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
        CommodityLocation::findOrFail($id)->delete();

        return redirect()->route('admin.ruangan.index')->with('success', 'Data ruangan berhasil dihapus!');
    }
}
