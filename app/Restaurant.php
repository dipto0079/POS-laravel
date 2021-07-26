<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Restaurant extends Authenticatable
{
    use Notifiable;

    protected $table = 'tbl_restaurants';

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

    public function restaurantUsers()
    {
        return $this->hasMany('App\RestaurantUser');
    }

    public function logo()
    {
        return $this->hasOne('App\RestaurantSettingsLogo', 'restaurant_id', 'id');
    }

    public function taxSettings()
    {
        return $this->hasOne('App\RestaurantSettingsTax', 'restaurant_id', 'id');
    }

    //shift info
    public function shifts()
    {
        return $this->hasMany('App\RestaurantFoodMenuShift', 'restaurant_id', 'id');
    }

    //categories 
    public function categories()
    {
        return $this->hasMany('App\RestaurantFoodMenuCategory', 'restaurant_id', 'id');
    }


    //social link info
    public function socialLinks()
    {
        return $this->hasMany('App\RestaurantSettingsSocialLink', 'restaurant_id', 'id');
    }

    //thirdPartyVendors
    public function thirdPartyVendors()
    {
        return $this->hasMany('App\RestaurantSettingsThirdPartyVendor', 'restaurant_id', 'id');
    }

    //Fee charges info
    public function charges()
    {
        return $this->hasMany('App\RestaurantSettingsCharge', 'restaurant_id', 'id');
    }

    //cuisines
    public function cuisines()
    {
        //return $this->hasMany('App\RestaurantSettingsCuisine', 'restaurant_id', 'id');
        return $this->belongsToMany('App\Cuisine', 'App\RestaurantSettingsCuisine','restaurant_id', 'cuisine_id');
    }

    public function floors()
    {
        return $this->hasMany('App\RestaurantFloor', 'restaurant_id', 'id')->where('del_status', 'Live');
    }


}
