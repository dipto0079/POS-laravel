<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerOnlineOrderDetailsModifiers extends Model
{
    protected $table = 'tbl_customer_online_order_details_modifiers';

    //modifier info
    public function modifierName()
    {
        return $this->belongsTo('App\RestaurantFoodMenuModifier', 'modifier_id', 'id');
    }
}
