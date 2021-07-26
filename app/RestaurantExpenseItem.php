<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantExpenseItem extends Model
{
    protected $table = 'tbl_restaurant_expense_items';
    
    public function creatorInfo()
    {
        return $this->belongsTo('App\RestaurantUser', 'user_id', 'id');
    }
    

}
