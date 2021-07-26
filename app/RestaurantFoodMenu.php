<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantFoodMenu extends Model
{
    protected $table = 'tbl_restaurant_food_menus';

    public function categoryInfo()
    {
        // return $this->belongsTo('App\RestaurantIngredientCategory', 'cat_id', 'id');
        return $this->belongsTo('App\RestaurantFoodMenuCategory', 'cat_id', 'id');
        
    }

    public function creatorInfo()
    {
        return $this->belongsTo('App\RestaurantUser', 'user_id', 'id');
    }

    /**
     * The modifiers that belong to the food menu.
     */
    public function modifiers()
    {
        // return $this->belongsToMany('App\RestaurantFoodMenuModifier')->using('App\RestaurantModifierForFoodMenu');
        return $this->belongsToMany('App\RestaurantFoodMenuModifier', 'App\RestaurantModifierForFoodMenu','fd_menu_id', 'mdf_id');
    }

    /**
     * The shifts that belong to the food menu.
     */
    public function shifts()
    {
        // return $this->belongsToMany('App\RestaurantFoodMenuModifier')->using('App\RestaurantModifierForFoodMenu');
        return $this->belongsToMany('App\RestaurantFoodMenuShift', 'App\RestaurantShiftForFoodMenu','fd_menu_id', 'shift_id');
    }



}
