<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantSalesConsumptionsOfModifiersOfMenu extends Model
{
    protected $table = 'tbl_restaurant_sales_cons_of_mod_of_menus';

    public function creatorInfo()
    {
        return $this->belongsTo('App\RestaurantUser', 'user_id', 'id');
    }
}
