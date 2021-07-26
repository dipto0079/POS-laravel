<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantSalesHoldsDetailsModifier extends Model
{
    protected $table = 'tbl_restaurant_sales_holds_details_modifiers';

    //modifier info
    public function modifierName()
    {
        return $this->belongsTo('App\RestaurantFoodMenuModifier', 'modifier_id', 'id');
    }
}
