<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Statics;
class MapController extends Controller
{
    public function index(){
    	return view('maps/map_integration');
    }

    //(Bhavana )testing function
    public function test(){        
        return view('maps/test_area');        
    }

    public function GetDirection(Request $request){
        $destination = $request->input('destination');
        return view('maps/direction',compact('destination'));
    }

    public function polygon(){
    	return view('maps/polygon');
    }
    public function places_search(){
    	return view('maps/places_search');
    }
	public function cluster(){
		
    	return view('maps/cluster');
    }
    public function reverse_geocoding(){
    	return view('maps/reverse_geocoding');
    }
    public function navigator(){
    	return view('maps/navigator');
    }
    public function distance(){
    	return view('maps/distance');
    }

     public function indexMap(){
        return view('maps/index');
    }
}
