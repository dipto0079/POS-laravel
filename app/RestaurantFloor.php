<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantFloor extends Model
{
    protected $table = 'tbl_restaurant_floors';

    //creator info who create the floor
    public function creatorInfo()
    {
        return $this->belongsTo('App\RestaurantUser', 'user_id', 'id');
    }

    public function floorTables()
    {
        return $this->hasMany('App\RestaurantFloorTable', 'floor_id', 'id');
    }


}
