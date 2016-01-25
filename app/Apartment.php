<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $table = 'apartments';
    protected $fillable = ['admin_id', 'apartment_name',
     'city', 'address', 'price', 'rooms', 'beds'];

    static $validatonRulesCreateApartment = array(
    		'apartment_name' 	=> 'required',
            'city'              => 'required',
    		'address'           => 'required',
    		'price' 			=> 'required',
    		'room' 			    => 'required',
    		'bed' 				=> 'required',
    	);

    public function apartments()
    {
        return $this->hasManyThrough('App\Accessories', 'App\Image', 'apartment_id', 'apartment_id');
    }

    public function images()
    {
        return $this->hasMany('App\Image');
    }
}
