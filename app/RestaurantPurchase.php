<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantPurchase extends Model
{
    protected $table = 'tbl_restaurant_purchases';

    public function supplierInfo()
    {
        return $this->belongsTo('App\RestaurantSupplier', 'supplier_id', 'id');
    }

    public function creatorInfo()
    {
        return $this->belongsTo('App\RestaurantUser', 'user_id', 'id');
    }

    public function purchaseIngredients()
    {
        return $this->hasMany('App\RestaurantPurchaseIngredient', 'purchase_id', 'id');
    }
}
