<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{	
	protected $table 	= 'admin';
    protected $fillable = ['username', 'password'];
    protected $hidden 	= ['password', 'remember_token'];

    static $loginRules = array(
    		'username' => 'required',
    		'password' => 'required'
    );
}
