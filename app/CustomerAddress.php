<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerAddress extends Model
{
    protected $table = 'tbl_customer_addresses';

    public function country()
    {
        return $this->belongsTo('App\Country', 'country_id', 'id');
    }

    public function city()
    {
        return $this->belongsTo('App\City', 'city_id', 'id');
    }

    public function state()
    {
        return $this->belongsTo('App\State', 'state_id', 'id');
    }
}
