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
            );
    
    private function makeDir() {
        $dir = public_path().'/images/';
        mkdir($dir, 0777, true); 
    }

    private function addImage($request, $id = null) {
        $desPath = public_path().'/images/';
        if(!file_exists($desPath))
            $this->makeDir();
        
        $i = -1;
        foreach ($request->files as $file) {
            while (isset($file[++$i])) {
                if($file !== null && $file[$i]->isValid()) {            
                    $fileName = rand(11111, 99999).'.png';
                    $file[$i]->move($desPath, $fileName);            
                    $query = new Image;
                    $query->image_name = $fileName;
                    
                    if($request->apartment_id == false) 
                        $query->apartment_id = $id;
                    else
                        $query->apartment_id = $request->apartment_id;

                    $query->save();
                }
            }
        }
    }

    public function addApartment(Request $request) {	
    	$validator = Validator::make($request->all(), $this->validatonRulesApartment);

    	if($validator->fails()) {
    		$messages = $validator->messages();
            return Response::json($messages, 400);
    	} 
        else {
    		$addApartment = new Apartment;
    		$addApartment->apartment_name = $request->apartment_name;
    		$addApartment->city = $request->city;
    		$addApartment->address = $request->address;
    		$addApartment->price = $request->price;
    		$addApartment->rooms = $request->room;
    		$addApartment->beds = $request->bed;

    		$addApartment->save();

            $addAccessories = new Accessories;
            $addAccessories->apartment_id = $addApartment->id;
            $addAccessories->internet = $request->internet;
            $addAccessories->parking = $request->parking;
            $addAccessories->tv = $request->tv;
            $addAccessories->klima = $request->klima;
            $addAccessories->vesmasina = $request->vesmasina;
            $addAccessories->ljubimci = $request->ljubimci;

            $addAccessories->save();
            $this->addImage($request, $addApartment->id);
    		return Response::json($addApartment);
    	}
    	
    }

    public function editApartment(Request $request) {
        $validator = Validator::make($request->all(), $this->validatonRulesApartment);

        if($validator->fails()) {
            $messages = $validator->messages();
            return Response::json($messages, 400);
        } else {
            $editApartment = DB::table('apartments')
                        ->where('id', $request->apartment_id)
                        ->update(array(
                            'apartment_name' => $request->apartment_name,
                            'city' => $request->city,
                            'address' => $request->address,
                            'price' => $request->price,
                            'beds' => $request->bed,
                            'rooms' => $request->room));

            $editAccessories = DB::table('accessories')
                        ->where('apartment_id', $request->apartment_id)
                        ->update(array(
                            'internet' => $request->internet,
                            'parking' => $request->parking,
                            'tv' => $request->tv,
                            'klima' => $request->klima,
                            'vesmasina' => $request->vesmasina,
                            'ljubimci' => $request->ljubimci));

            $this->addImage($request);

            $query = DB::table('apartments')->where('id', '=', $request->apartment_id)->get();
            return Response::json($query);
        }
    }

    public function selectAccessories($id) {
        $query = Accessories::where('apartment_id', '=', $id)->get();
        return Response::json($query);
    }

    public function getAppartments() {
        $query = Apartment::with('images')->get();
    	return Response::json($query);
    }

    public function deleteApartment($id) {
        $queryOne = DB::table('apartments')
                ->where('id', '=', $id)
                ->delete();

        $queryTwo = DB::table('accessories')
                ->where('apartment_id', '=', $id)
                ->delete();
    }

    public function showImages($id) {
        $query = DB::table('images')
                ->where('apartment_id', '=', $id)
                ->get();
        return Response::json($query);
    }

    public function deleteImages($id) {
        $query = DB::table('images')
                ->where('id', '=', $id)
                ->delete();
    }
}
