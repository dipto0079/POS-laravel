<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantFoodMenuCategory extends Model
{
    protected $table = 'tbl_restaurant_food_menu_categories';

    public function creatorInfo()
    {
        return $this->belongsTo('App\RestaurantUser', 'user_id', 'id');
    }

    //food menus 
    public function foodMenus()
    {
        return $this->hasMany('App\RestaurantFoodMenu', 'cat_id', 'id');
    }
}
