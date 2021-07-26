<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantSalesHoldsDetails extends Model
{
    protected $table = 'tbl_restaurant_sales_holds_details';

    //holds details  modifiers info
    public function modifiers()
    {
        return $this->hasMany('App\RestaurantSalesHoldsDetailsModifier', 'holds_details_id', 'id');
    }
}
