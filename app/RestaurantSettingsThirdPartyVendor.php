<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantSettingsThirdPartyVendor extends Model
{
    protected $table = 'tbl_restaurant_settings_third_party_vendors';

    //creator info
    public function creatorInfo()
    {
        return $this->belongsTo('App\RestaurantUser', 'user_id', 'id');
    }

    //restaurant info
    public function restaurantInfo()
    {
        return $this->belongsTo('App\Restaurant', 'restaurant_id', 'id');
    }

    //third Party vendors info
    public function thirdPartyVendorInfo()
    {
        return $this->belongsTo('App\ThirdPartyVendor', 'third_party_vendors_id', 'id');
    }

}
