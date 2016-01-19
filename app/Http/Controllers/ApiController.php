<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Response;
use App\Apartman;
use App\Accessories;
use DB;

class ApiController extends Controller
{

    public function addApartment(Request $request) 
    {	
    	$validator = Validator::make($request->all(), Apartman::$validatonRulesCreateApartment);

    	if($validator->fails()) {
    		$messages = $validator->messages();
            return Response::json($messages, 400);
    	} 
        else {
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

    public function addAccessories(Request $request)
    {   
        $validator = Validator::make($request->all(), Accessories::$accessoriesRules);

        if($validator->fails()) {
            $messages = $validator->messages();
            return Response::json($messages, 400);
        } 
        else {
            $query = new Accessories;
            $query->apartment_id = $request->apartment_id;
            $query->internet = $request->internet;
            $query->parking = $request->parking;
            $query->tv = $request->tv;
            $query->klima = $request->klima;
            $query->vesmasina = $request->vesmasina;
            $query->ljubimci = $request->ljubimci;

            $query->save();
        }
    }

    public function getAppartments()
    {
    	$query = DB::table('apartmens')->get();
    	return Response::json($query);
    }
}
