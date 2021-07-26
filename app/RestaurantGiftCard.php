<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantGiftCard extends Model
{
    protected $table = 'tbl_restaurant_gift_cards';

    //giftcard creator info
    public function creatorInfo()
    {
        return $this->belongsTo('App\RestaurantUser', 'user_id', 'id');
    }

    //giftCard sell Info
    public function sellInfo()
    {
        return $this->hasOne('App\RestaurantGiftCardSell', 'gift_card_id', 'id');
    }

    //giftCard payment Info
    public function paymentInfo()
    {
        return $this->hasMany('App\RestaurantSalesPaymentByGiftCard', 'gift_card_id', 'id');
    }
}
