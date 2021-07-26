<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

// class RestaurantModifierForFoodMenu extends Model
class RestaurantModifierForFoodMenu extends Pivot
{
    protected $table = 'tbl_restaurant_modifier_for_food_menus';
}
