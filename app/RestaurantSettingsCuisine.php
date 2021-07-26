<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantSettingsCuisine extends Model
{
    protected $table = 'tbl_restaurant_settings_cuisines';

    //creator info
    public function creatorInfo()
    {
        return $this->belongsTo('App\RestaurantUser', 'user_id', 'id');
    }

    // //restaurant info
    // public function restaurantInfo()
    // {
    //     return $this->belongsTo('App\Restaurant', 'restaurant_id', 'id');
    // }

    // //Cuisine info
    // public function cuisineInfo()
    // {
    //     return $this->belongsTo('App\Cuisine', 'cuisine_id', 'id');
    //     //return $this->belongsToMany('App\RestaurantFoodMenuShift', 'App\RestaurantShiftForFoodMenu','fd_menu_id', 'shift_id');
    // }
}
