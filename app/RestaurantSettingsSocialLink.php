<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantSettingsSocialLink extends Model
{
    protected $table = 'tbl_restaurant_settings_social_links';

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

    //social media info
    public function socialMedia()
    {
        return $this->belongsTo('App\SocialMedia', 'social_media_id', 'id');
    }
}
