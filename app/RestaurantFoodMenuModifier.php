<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantFoodMenuModifier extends Model
{
    protected $table = 'tbl_restaurant_food_menu_modifiers';

    public function creatorInfo()
    {
        return $this->belongsTo('App\RestaurantUser', 'user_id', 'id');
    }

    /**
     * The foodMenus that belong to the modifiers.
     */
    public function foodMenus()
    {
        return $this->belongsToMany('App\RestaurantFoodMenu')->using('App\RestaurantModifierForFoodMenu');
    }
}
