<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerOnlineOrder extends Model
{
    protected $table = 'tbl_customer_online_orders';

    //custormer info which is own this order
    public function customer()
    {
        return $this->belongsTo('App\Customer', 'customer_id', 'id');
    }

    //sales details info
    public function items()
    {
        return $this->hasMany('App\CustomerOnlineOrderDetails', 'online_order_id', 'id');
    }

    /**
     * The shifts that belong to the food menu.
     */
    public function deliveryAddress()
    {
        return $this->hasOne('App\CustomerOnlineOrderDeliveryAddress','online_order_id', 'id');
    }


}
