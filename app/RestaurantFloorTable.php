<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantFloorTable extends Model
{
    protected $table = 'tbl_restaurant_floor_tables';

    //creator info who create the floor
    public function creatorInfo()
    {
        return $this->belongsTo('App\RestaurantUser', 'user_id', 'id');
    }

    //floor 
    public function floor()
    {
        return $this->belongsTo('App\RestaurantFloor', 'floor_id', 'id');
    }
}
