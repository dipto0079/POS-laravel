<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantStockAdjustment extends Model
{
    protected $table = 'tbl_restaurant_stock_adjustments';
    
    public function creatorInfo()
    {
        return $this->belongsTo('App\RestaurantUser', 'user_id', 'id');
    }

    public function employee()
    {
        return $this->belongsTo('App\RestaurantUser', 'employee_id', 'id');
    }

    public function stockAdjustmentIngredients()
    {
        return $this->hasMany('App\RestaurantStockAdjustmentIngredient', 'stock_adjustment_id', 'id');
    }
}
