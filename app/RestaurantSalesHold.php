<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantSalesHold extends Model
{
    protected $table = 'tbl_restaurant_sales_holds';

    //holds creator info
    public function creatorInfo()
    {
        return $this->belongsTo('App\RestaurantUser', 'user_id', 'id');
    }

    //custormer info which is own this order
    public function customer()
    {
        return $this->belongsTo('App\RestaurantCustomer', 'customer_id', 'id');
    }

    //waiter info
    public function waiter()
    {
        return $this->belongsTo('App\RestaurantUser', 'waiter_id', 'id');
    }

    //table info
    public function table()
    {
        return $this->belongsTo('App\RestaurantFloorTable', 'table_id', 'id');
    }

    //sales details info
    public function items()
    {
        return $this->hasMany('App\RestaurantSalesHoldsDetails', 'holds_id', 'id');
    }

}

