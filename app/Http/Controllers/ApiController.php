<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Response;
use App\Apartman;
use DB;

class ApiController extends Controller
{
    public function addApartment(Request $request) 
    {	
    	$validator = Validator::make($request->all(), Apartman::$validatonRulesCreateApartment);

    	if($validator->fails()) {
    		$messages = $validator->messages();
    		return Response::json($messages);
    	} else {
    		$query = new Apartman;
    		$query->apartment_name = $request->apartment_name;
    		$query->city = $request->city;
    		$query->address = $request->address;
    		$query->price = $request->price;
    		$query->rooms = $request->room;
    		$query->beds = $request->bed;

    		$query->save();

    		return Response::json($query);

    	}
    	
    }

    public function getAppartments()
    {
    	$query = DB::table('apartmens')->get();
    	return Response::json($query);
    }
}
