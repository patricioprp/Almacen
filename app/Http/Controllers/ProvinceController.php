<?php

namespace App\Http\Controllers;
use App\Location;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{

    public function getLocations(Request $request,$id){
        if($request->ajax()){
            $locations = Location::locations($id);
          return response()->json($locations);
        }
    }
}
