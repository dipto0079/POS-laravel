<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantAttendance extends Model
{
    protected $table = 'tbl_restaurant_attendances';
    
    public function creatorInfo()
    {
        return $this->belongsTo('App\RestaurantUser', 'user_id', 'id');
    }

    public function employee()
    {
        return $this->belongsTo('App\RestaurantUser', 'employee_id', 'id');
    }
}
