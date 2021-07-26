<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantFoodMenuShift extends Model
{
    protected $table = 'tbl_restaurant_food_menu_shifts';

    public function creatorInfo()
    {
        return $this->belongsTo('App\RestaurantUser', 'user_id', 'id');
    }

/*    protected $casts = [
        'starting_time' => 'hh:mm A',
        'ending_time' => 'hh:mm A'
    ];*/

    /**
     * The foodMenus that belong to the shift.
     */
    public function foodMenus()
    {
        return $this->belongsToMany('App\RestaurantFoodMenu', 'App\RestaurantShiftForFoodMenu','shift_id', 'fd_menu_id');
    }
}
