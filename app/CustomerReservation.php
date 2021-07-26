<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerReservation extends Model
{
    protected $table = 'tbl_customer_reservations';

    public function customer()
    {
        return $this->belongsTo('App\Customer', 'customer_id', 'id');
    }

}
