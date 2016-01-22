<?php

namespace App\Http\Controllers;

use Redirect;

use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
	
	/*
	# Return View
	# Admin login
	*/
    public function index()
    {   
    	if (Auth::check())
            return redirect()->intended('/admin/');
        else
            return view('admin.login');
    }

    /*
    # Use Request $request
    # loginRules from model Admin
    # Processing information
    */
    public function loginPost(Request $request) 
    {   
    	$validator = Validator::make($request->all(), Admin::$loginRules);

    	if($validator->fails()) 
    	{
    		$messages = $validator->messages();
    		return redirect()->back()
    			->withErrors($messages)
    			->withInput();
    	} else 
    	{  
            $auth = Auth::guard('admin');

            $credentials = [
                'username' => $request->username,
                'password' => $request->password
            ];

    		if(Auth::attempt($credentials))
    			return redirect()->intended('admin#/');
    		else 
    			return redirect()->back();
    	}
    }
    /*
    # Destroy session 
    # Logout admin
    */
    function logout()
    {
        Auth::logout();
        return redirect()->route('login.get');
    }
}
