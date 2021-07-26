<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThirdPartyVendor extends Model
{
    protected $table = 'tbl_third_party_vendors';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'phone', 'email', 'country', 'state', 'city', 'address'
    ];

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
