<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantSalesConsumption extends Model
{
    protected $table = 'tbl_restaurant_sales_consumptions';

    public function creatorInfo()
    {
        return $this->belongsTo('App\RestaurantUser', 'user_id', 'id');
    }
}
