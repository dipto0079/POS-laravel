<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantIngredient extends Model
{
    protected $table = 'tbl_restaurant_ingredients';

    protected $fillable = [
        'name', 'category_id', 'unit_id', 'purchase_price', 'alert_quantity', 'code', 'restaurant_id', 'user_id'
    ];

    public function creatorInfo()
    {
        return $this->belongsTo('App\RestaurantUser', 'user_id', 'id');
    }

    public function categoryInfo()
    {
        return $this->belongsTo('App\RestaurantIngredientCategory', 'category_id', 'id');
    }

    public function unitInfo()
    {
        return $this->belongsTo('App\RestaurantIngredientUnit', 'unit_id', 'id');
    }
}
