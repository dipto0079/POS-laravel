<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantCustomerGroup extends Model
{
    
    protected $table = 'tbl_restaurant_customer_groups';

    public function creatorInfo()
    {
        return $this->belongsTo('App\RestaurantUser', 'user_id', 'id');
    }

    //food menus 
    public function customers()
    {
        return $this->hasMany('App\RestaurantCustomer', 'customer_group_id', 'id');
    }
}
