<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Response;
use App\Apartment;
use App\Accessories;
use App\Image;
use DB;

class ApiController extends Controller
{
    private $validatonRulesApartment = array(
            'apartment_name'    => 'required',
            'city'              => 'required',
            'address'           => 'required',
            'price'             => 'required',
            'room'              => 'required',
            'bed'               => 'required',
            'internet'          => 'required',
            'parking'           => 'required',
            'tv'                => 'required',
            'klima'             => 'required',
            'vesmasina'         => 'required',
            'ljubimci'          => 'required',
            'files'             => 'required',
            );

    public function addApartment(Request $request) 
    {	
    	$validator = Validator::make($request->all(), $this->validatonRulesApartment);

    	if($validator->fails()) {
    		$messages = $validator->messages();
            return Response::json($messages, 400);
    	} 
        else {
    		$queryA = new Apartment;
    		$queryA->apartment_name = $request->apartment_name;
    		$queryA->city = $request->city;
    		$queryA->address = $request->address;
    		$queryA->price = $request->price;
    		$queryA->rooms = $request->room;
    		$queryA->beds = $request->bed;

    		$queryA->save();

            $queryB = new Accessories;
            $queryB->apartment_id = $queryA->id;
            $queryB->internet = $request->internet;
            $queryB->parking = $request->parking;
            $queryB->tv = $request->tv;
            $queryB->klima = $request->klima;
            $queryB->vesmasina = $request->vesmasina;
            $queryB->ljubimci = $request->ljubimci;

            $queryB->save();
            $i = -1;
            foreach ($request->files as $file) {
                while (isset($file[++$i])) {
                    if($file !== null && $file[$i]->isValid()) {            
                        $desPath = public_path().'/images/';
                        $fileName = rand(11111, 99999).'.png';
                        $file[$i]->move($desPath, $fileName);
                
                        $query = new Image;
                        $query->image_name = $fileName;
                        $query->apartment_id = $queryA->id;

                        $query->save();
                    }
                }
            }
    		return Response::json($queryA);
    	}
    	
    }

    public function addImages(Request $request)
    {   
        foreach ($request->files as $key => $file) {
            dd($file[2]);
        }
    }

    public function editApartment(Request $request) {
        $validator = Validator::make($request->all(), $this->validatonRulesApartment);

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
        $query = Accessories::where('apartment_id', '=', $id)->get();
        return Response::json($query);
    }

    public function getAppartments()
    {
        $query = Apartment::with('images')->get();
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
