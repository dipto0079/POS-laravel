<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantIngredientCategory extends Model
{
    protected $table = 'tbl_restaurant_ingredient_categories';

    public function creatorInfo()
    {
        return $this->belongsTo('App\RestaurantUser', 'user_id', 'id');
    }
}
