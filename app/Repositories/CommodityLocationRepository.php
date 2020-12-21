<?php

namespace App\Repositories;

use App\Models\CommodityLocation;

class CommodityLocationRepository
{
    public function getCommodityLocationOrderBy($column, $direction = 'asc')
    {
        return CommodityLocation::orderBy($column, $direction);
    }

    public function store($request)
    {
        $commodity_location = new CommodityLocation();
        $commodity_location->name = $request->name;
        $commodity_location->description = $request->description;
        $commodity_location->save();
    }

    public function update($request, $id)
    {
        $commodity_location = CommodityLocation::findOrFail($id);
        $commodity_location->name = $request->name_edit;
        $commodity_location->description = $request->description_edit;
        $commodity_location->save();
    }

    public function delete($id)
    {
        return CommodityLocation::findOrFail($id)->delete();
    }
}
