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
    private $validatonRulesEditApartment = array(
            'apartment_name'    => 'required',
            'city'              => 'required',
            'address'           => 'required',
            'price'             => 'required',
            'room'              => 'required',
            'bed'               => 'required',
            'apartment_id'      => 'required',
            'internet'          => 'required',
            'parking'           => 'required',
            'tv'                => 'required',
            'klima'             => 'required',
            'vesmasina'         => 'required',
            'ljubimci'          => 'required',
            );

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

    public function editApartment(Request $request) {
        $validator = Validator::make($request->all(), $this->validatonRulesEditApartment);

        if($validator->fails()) {
            $messages = $validator->messages();
            return Response::json($messages, 400);
        } else {
            $queryOne = DB::table('apartmens')
                        ->where('id', $request->apartment_id)
                        ->update(array(
                            'apartment_name' => $request->apartment_name,
                            'city' => $request->city,
                            'address' => $request->address,
                            'price' => $request->price,
                            'beds' => $request->bed,
                            'rooms' => $request->room));

            $queryTwo = DB::table('accessories')
                        ->where('apartment_id', $request->apartment_id)
                        ->update(array(
                            'internet' => $request->internet,
                            'parking' => $request->parking,
                            'tv' => $request->tv,
                            'klima' => $request->klima,
                            'vesmasina' => $request->vesmasina,
                            'ljubimci' => $request->ljubimci));

            $query = DB::table('apartmens')->where('id', '=', $request->apartment_id)->get();
            return Response::json($query);
        }
    }

    public function selectAccessories($id) {
        $query = DB::table('accessories')->where('apartment_id', '=', $id)->get();
        return Response::json($query);
    }

    public function getAppartments()
    {
    	$query = DB::table('apartmens')->get();
    	return Response::json($query);
    }

    public function deleteApartment($id) {
        $queryOne = DB::table('apartmens')
                ->where('id', '=', $id)
                ->delete();

        $queryTwo = DB::table('accessories')
                ->where('apartment_id', '=', $id)
                ->delete();
    }
}
