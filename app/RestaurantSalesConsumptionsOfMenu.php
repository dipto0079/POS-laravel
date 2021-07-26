<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantSalesConsumptionsOfMenu extends Model
{
    protected $table = 'tbl_restaurant_sales_consumptions_of_menus';

    public function creatorInfo()
    {
        return $this->belongsTo('App\RestaurantUser', 'user_id', 'id');
    }
}
