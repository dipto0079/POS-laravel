<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantFoodMenuModifierIngredient extends Model
{
    protected $table = 'tbl_restaurant_food_menu_modifier_ingredients';

    public function ingredientInfo()
    {
        return $this->belongsTo('App\RestaurantIngredient', 'ig_id', 'id');
    }
}
