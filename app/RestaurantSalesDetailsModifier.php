<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantSalesDetailsModifier extends Model
{
    protected $table = 'tbl_restaurant_sales_details_modifiers';

    public function creatorInfo()
    {
        return $this->belongsTo('App\RestaurantUser', 'user_id', 'id');
    }

    //modifier info
    public function modifierName()
    {
        return $this->belongsTo('App\RestaurantFoodMenuModifier', 'modifier_id', 'id');
    }
}
