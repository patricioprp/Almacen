<?php

namespace App\Http\Controllers;
use App\State;
use App\Province;
use Illuminate\Http\Request;

class StateController extends Controller
{
    public function index()
    {
        $states = State::pluck('name','id');
        return view('index')->with('states',$states);
    }
    
    public function getProvinces(Request $request,$id){
     if($request->ajax()){
         $provinces = Province::provinces($id);
       return response()->json($provinces);
     }
    }
}
