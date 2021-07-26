<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantSalesDetails extends Model
{
    protected $table = 'tbl_restaurant_sales_details';

    public function creatorInfo()
    {
        return $this->belongsTo('App\RestaurantUser', 'user_id', 'id');
    }

    public function salesInfo()
    {
        return $this->belongsTo('App\RestaurantSale', 'sales_id', 'id')->with('table:id,name');
    }

    //sales details info
    public function modifiers()
    {
        return $this->hasMany('App\RestaurantSalesDetailsModifier', 'sales_details_id', 'id');
    }

    //foodmenu info
    public function foodmenu()
    {
        return $this->hasOne('App\RestaurantFoodMenu', 'id', 'food_menu_id')->select('panel_id', 'cat_id');
    }

}
