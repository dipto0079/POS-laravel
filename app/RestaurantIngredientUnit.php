<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantIngredientUnit extends Model
{
    protected $table = 'tbl_restaurant_ingredient_units';

    public function creatorInfo()
    {
        return $this->belongsTo('App\RestaurantUser', 'user_id', 'id');
    }
}
