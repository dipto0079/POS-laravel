<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantSupplier extends Model
{
    protected $table = 'tbl_restaurant_suppliers';

    // public function categoryInfo()
    // {
    //     return $this->belongsTo('App\RestaurantIngredientCategory', 'category_id', 'id');
    // }

    /**
     * The categories that belong to the suppliers.
     */
    public function categories()
    {
        return $this->belongsToMany('App\RestaurantIngredientCategory', 'App\RestaurantCategoryForSupplier','supplier_id', 'category_id');
    }
}
