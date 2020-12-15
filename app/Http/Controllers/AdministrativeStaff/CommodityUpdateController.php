<?php

namespace App\Http\Controllers\AdministrativeStaff;

use Illuminate\Http\Request;
use App\Models\CommodityUpdate;
use App\Models\CommodityCategory;
use App\Models\CommodityLocation;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommodityUpdateRequest;
use App\Models\Commodity;

class CommodityUpdateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commodity_updates = CommodityUpdate::orderBy('commodity_id', 'asc')->get();
        $commodities = Commodity::with('commodity_categories', 'commodity_locations')->orderBy('name', 'asc')->get();
        $commodity_categories = CommodityCategory::orderBy('name', 'asc')->get();
        $commodity_locations = CommodityLocation::orderBy('name', 'asc')->get();

        return view('administrative-staff.update-commodities.index', compact('commodity_updates', 'commodities', 'commodity_categories', 'commodity_locations'));
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
    public function store(StoreCommodityUpdateRequest $request)
    {
        $commodity_update = new CommodityUpdate();
        $commodity_update->commodity_id = $request->commodity_id;
        $commodity_update->commodity_category_id = $request->commodity_category_id;
        $commodity_update->commodity_location_id = $request->commodity_location_id;
        $commodity_update->user_id = auth()->user()->id;
        $commodity_update->amount = $request->amount;
        $commodity_update->update_date = $request->update_date;
        $commodity_update->save();

        return redirect()->route('admin.ubah-aset.index')->with('success', 'Data ubah aset berhasil ditambahkan!');
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
