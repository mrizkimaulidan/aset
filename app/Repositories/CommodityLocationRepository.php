<?php

namespace App\Repositories;

use App\Models\CommodityLocation;
use Illuminate\Support\Facades\DB;
use League\Flysystem\Exception;

class CommodityLocationRepository
{
    public function getCommodityLocationOrderBy($column, $direction = 'asc')
    {
        return CommodityLocation::orderBy($column, $direction);
    }

    public function findCommodityLocation($id)
    {
        return CommodityLocation::findOrFail($id);
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
        $commodity_location = $this->findCommodityLocation($id);
        $commodity_location->name = $request->name_edit;
        $commodity_location->description = $request->description_edit;
        $commodity_location->save();
    }

    public function delete($id)
    {
        return $this->findCommodityLocation($id)->delete();
    }
}
