<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantFoodMenuIngredient extends Model
{
    protected $table = 'tbl_restaurant_food_menu_ingredients';

    public function ingredientInfo()
    {
        return $this->belongsTo('App\RestaurantIngredient', 'ig_id', 'id');
    }
}
