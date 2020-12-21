<?php

namespace App\Repositories;

use App\Models\CommodityCategory;

class CommodityCategoryRepository
{
    public function getCommodityCategoryOrderBy($column, $direction = 'asc')
    {
        return CommodityCategory::orderBy($column, $direction);
    }

    public function store($request)
    {
        $commodity_category = new CommodityCategory();
        $commodity_category->name = $request->name;
        $commodity_category->description = $request->description;
        $commodity_category->save();
    }

    public function update($request, $id)
    {
        $commodity_category = CommodityCategory::findOrFail($id);
        $commodity_category->name = $request->name_edit;
        $commodity_category->description = $request->description_edit;
        $commodity_category->save();
    }

    public function delete($id)
    {
        CommodityCategory::findOrFail($id)->delete();
    }
}
