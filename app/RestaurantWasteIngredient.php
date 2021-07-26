<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantWasteIngredient extends Model
{
    protected $table = 'tbl_restaurant_waste_ingredients';

    public function ingredientInfo()
    {
        return $this->belongsTo('App\RestaurantIngredient', 'ingredient_id', 'id');
    }
}
