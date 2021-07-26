<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantGiftCardSell extends Model
{
    protected $table = 'tbl_restaurant_gift_card_sells';

    //giftcard creator info
    public function creatorInfo()
    {
        return $this->belongsTo('App\RestaurantUser', 'user_id', 'id');
    }

    //custormer info 
    public function customer()
    {
        return $this->belongsTo('App\RestaurantCustomer', 'customer_id', 'id');
    }

    //giftCard Info info 
    public function giftCardInfo()
    {
        return $this->belongsTo('App\RestaurantGiftCard', 'gift_card_id', 'id');
    }
}
