<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantKitchenPanel extends Model
{
    protected $table = 'tbl_restaurant_kitchen_panels';

    public function creatorInfo()
    {
        return $this->belongsTo('App\RestaurantUser', 'user_id', 'id');
    }
}
