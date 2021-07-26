<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Customer extends Authenticatable
{
    protected $table = 'tbl_customers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'phone', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    //addresses
    public function addresses()
    {
        return $this->hasMany('App\CustomerAddress', 'customer_id', 'id');
    }

    //restaurant subscriptions 
    public function subscriptions()
    {
        return $this->hasMany('App\CustomerAddress', 'customer_id', 'id');
    }

}
