<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartman extends Model
{
    protected $table = 'apartmens';
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
}
