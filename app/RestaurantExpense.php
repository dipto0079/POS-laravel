<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantExpense extends Model
{
    protected $table = 'tbl_restaurant_expenses';
    
    public function creatorInfo()
    {
        return $this->belongsTo('App\RestaurantUser', 'user_id', 'id');
    }

    public function employee()
    {
        return $this->belongsTo('App\RestaurantUser', 'employee_id', 'id');
    }

    public function expenseItem()
    {
        return $this->belongsTo('App\RestaurantExpenseItem', 'cat_id', 'id');
    }
}
