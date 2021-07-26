<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantPurchaseIngredient extends Model
{
    protected $table = 'tbl_restaurant_purchase_ingredients';

    public function ingredientInfo()
    {
        return $this->belongsTo('App\RestaurantIngredient', 'ingredient_id', 'id');
    }
}
