<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantSalesPaymentByGiftCard extends Model
{
    protected $table = 'tbl_restaurant_sales_payment_by_gift_cards';

    //giftcard creator info
    public function creatorInfo()
    {
        return $this->belongsTo('App\RestaurantUser', 'user_id', 'id');
    }

    public function salesInfo()
    {
        return $this->belongsTo('App\RestaurantSale', 'sales_id', 'id');
    }

}
