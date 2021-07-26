<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class RestaurantShiftForFoodMenu extends Pivot
{
    protected $table = 'tbl_restaurant_shift_for_food_menus';
}
