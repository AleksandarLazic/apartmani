<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accessories extends Model
{
    protected $table 	= 'accessories';
    protected $fillable = ['apartment_id', 'internet', 'parking',
     'tv', 'klima', 'vesmasina', 'ljubimci'];

    static $accessoriesRules = array(
    		'apartment_id' 		=> 'required',
    		'internet' 			=> 'required',
    		'parking' 			=> 'required',
    		'tv' 				=> 'required',
    		'klima' 			=> 'required',
    		'vesmasina' 		=> 'required',
    		'ljubimci' 			=> 'required',
    	);

    public function apartment()
    {
        $this->hasOne('App\Apartment');
    }
}
