<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantStockAdjustmentIngredient extends Model
{
    protected $table = 'tbl_restaurant_stock_adjustment_ingredients';

    public function ingredientInfo()
    {
        return $this->belongsTo('App\RestaurantIngredient', 'ingredient_id', 'id');
    }
}
