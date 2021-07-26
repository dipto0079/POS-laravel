<?php

namespace App\Imports;

use App\RestaurantIngredient;
use App\RestaurantIngredientCategory;
use App\RestaurantIngredientUnit;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RestaurantIngredientImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $categoryId = null;
        if (RestaurantIngredientCategory::where('name', $row['category'])->exists()) {
            $categoryId = RestaurantIngredientCategory::where('name', $row['category'])->first()->id;
        } else {
            $category = new RestaurantIngredientCategory();
            $category->name = $row['category'];
            $category->description = null;
            $category->restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;
            $category->user_id = Auth::guard('restaurantUser')->id();
            $category->save();

            $categoryId = $category->id;
        }

        $unitId = null;
        if (RestaurantIngredientUnit::where('name', $row['unit'])->exists()) {
            $unitId = RestaurantIngredientUnit::where('name', $row['unit'])->first()->id;
        } else {
            $unit = new RestaurantIngredientUnit();
            $unit->name = $row['unit'];
            $unit->description = null;
            $unit->restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;
            $unit->user_id = Auth::guard('restaurantUser')->id();
            $unit->save();

            $unitId = $unit->id;
        }

        return new RestaurantIngredient([
            'name' => $row['ingredient_name'],
            'code' => $row['code'],
            'category_id' => $categoryId,
            'unit_id' => $unitId,
            'alert_quantity' => floatval($row['alert_quantity_or_amount']),
            'purchase_price' => floatval($row['purchase_price']),
            'restaurant_id' => Auth::guard('restaurantUser')->user()->restaurant_id,
            'user_id' => Auth::guard('restaurantUser')->user()->id
        ]);
    }

    public function headingRow(): int
    {
        return 3;
    }
}
