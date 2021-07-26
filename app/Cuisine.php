<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuisine extends Model
{
    protected $table = 'tbl_cuisines';

    //restaurant info
    public function restaurants()
    {
        //return $this->hasMany('App\RestaurantSettingsCuisine', 'cuisine_id', 'id');
        return $this->belongsToMany('App\Restaurant', 'App\RestaurantSettingsCuisine','cuisine_id', 'restaurant_id');
    }
}
