<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantCustomer extends Model
{
    protected $table = 'tbl_restaurant_customers';

    public function customerGroup()
    {
        return $this->belongsTo('App\RestaurantCustomerGroup', 'customer_group_id', 'id');
    }

}
