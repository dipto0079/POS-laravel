<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantSale extends Model
{
    protected $table = 'tbl_restaurant_sales';

    //sales creator info
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
    public function salesDetails()
    {
        return $this->hasMany('App\RestaurantSalesDetails', 'sales_id', 'id');
    }

    //sales table info
    public function orderTable()
    {
        return $this->hasOne('App\RestaurantOrdersTable', 'sales_id', 'id');
    }

}
