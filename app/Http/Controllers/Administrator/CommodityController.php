<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommodityRequest;
use App\Http\Requests\UpdateCommodityRequest;
use App\Models\Commodity;
use App\Models\CommodityCategory;
use App\Models\CommodityLocation;
use App\Models\User;
use Illuminate\Http\Request;

class CommodityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commodities = Commodity::with('commodity_categories', 'commodity_locations')->orderBy('name', 'asc')->get();
        $commodity_categories = CommodityCategory::orderBy('name', 'asc')->get();
        $commodity_locations = CommodityLocation::orderBy('name', 'asc')->get();
        $users = User::orderBy('name', 'asc')->get();

        return view('administrator.commodities.index', compact('commodities', 'commodity_categories', 'commodity_locations', 'users'));
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
    public function store(StoreCommodityRequest $request)
    {
        $commodity = new Commodity();
        $commodity->user_id = $request->user_id;
        $commodity->commodity_category_id = $request->commodity_category_id;
        $commodity->commodity_location_id = $request->commodity_location_id;
        $commodity->unique_commodity_number = $request->unique_commodity_number;
        $commodity->name = $request->name;
        $commodity->amount = $request->amount;
        $commodity->register_date = $request->register_date;
        $commodity->update_date = $request->update_date;
        $commodity->condition = $request->condition;
        $commodity->save();

        return redirect()->route('admin.aset.index')->with('success', 'Data aset berhasil ditambahkan!');
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
        $commodity = Commodity::findOrFail($id);
        $commodity_categories = CommodityCategory::orderBy('name', 'asc')->get();
        $commodity_locations = CommodityLocation::orderBy('name', 'asc')->get();
        $users = User::orderBy('name', 'asc')->get();

        return view('administrator.commodities.edit', compact('commodity', 'commodity_categories', 'commodity_locations', 'users'));
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
        $commodity = Commodity::findOrFail($id);
        $commodity->user_id = $request->user_id;
        $commodity->commodity_category_id = $request->commodity_category_id;
        $commodity->commodity_location_id = $request->commodity_location_id;
        $commodity->unique_commodity_number = $request->unique_commodity_number;
        $commodity->name = $request->name;
        $commodity->amount = $request->amount;
        $commodity->register_date = $request->register_date;
        $commodity->update_date = $request->update_date;
        $commodity->condition = $request->condition;
        $commodity->save();

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
        Commodity::findOrFail($id)->delete();

        return redirect()->route('admin.aset.index')->with('success', 'Data aset berhasil dihapus!');
    }
}
