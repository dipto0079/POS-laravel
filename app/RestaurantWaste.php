<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantWaste extends Model
{
    protected $table = 'tbl_restaurant_wastes';
    
    public function creatorInfo()
    {
        return $this->belongsTo('App\RestaurantUser', 'user_id', 'id');
    }

    public function wasteIngredients()
    {
        return $this->hasMany('App\RestaurantWasteIngredient', 'waste_id', 'id');
    }

    public function employee()
    {
        return $this->belongsTo('App\RestaurantUser', 'employee_id', 'id');
    }
}
