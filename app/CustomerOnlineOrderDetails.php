<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerOnlineOrderDetails extends Model
{
    protected $table = 'tbl_customer_online_order_details';

    //holds details  modifiers info
    public function modifiers()
    {
        return $this->hasMany('App\CustomerOnlineOrderDetailsModifiers', 'online_order_details_id', 'id');
    }
}
