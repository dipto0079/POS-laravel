<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantSettingsCharge extends Model
{
    protected $table = 'tbl_restaurant_settings_charges';

    //creator info
    public function creatorInfo()
    {
        return $this->belongsTo('App\RestaurantUser', 'user_id', 'id');
    }

    //restaurant info
    public function restaurantInfo()
    {
        return $this->belongsTo('App\Restaurant', 'restaurant_id_id', 'id');
    }

    //fee charge info
    public function chargeInfo()
    {
        return $this->belongsTo('App\Charge', 'charge_id', 'id');
    }
}
