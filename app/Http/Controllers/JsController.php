<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JsController extends Controller
{
	//For Js filter ,find
    public function index(){
    	return view('JsExample');
    }

    //Seacrh Find
    public function example2(){
    	return view('example2');
    }

    //Every and Some function
    public function example3(){
    	return view('example3');
    }

    //Reduce function
    public function example4(){
    	return view('example4');
    }

    //For  function
    public function example5(){
    	return view('example5');
    }

    //Fat Arrow function
    public function example6(){
    	return view('example6');
    }

    //Fat Arrow function
    public function example7(){
    	return view('example7');
    }

    //Template string or Template Literals
    public function example8(){
    	return view('example8');
    }

    //Template string or Template Literals3 and Literals4
    public function example9(){
    	return view('example9');
    }

    //Template string or Template  Literals4
    public function example10(){
    	return view('example10');
    }

    //Helper Foreach
    public function example11(){
    	return view('example11');
    }

    //Helper Foreach other
    public function example12(){
    	return view('example12');
    }

    //Helper Map other
    public function example13(){
    	return view('example13');
    }
    //Object literals
    public function example14(){
    	return view('example14');
    }
    //Default Arguments
    public function example15(){
    	return view('example15');
    }
    //Rest Operator and Spread 
    public function example16(){
    	return view('example16');
    }
    //Class
    public function example17(){
        return view('example17');
    }
    //Destructing
    public function example18(){
        return view('example18');
    }
    //Promises and Fetch
    public function example19(){
    	return view('example19');
    }

    public function getUser($id){
        echo "User Found".$id;
    }

    public function postuser(Request $request){
        print_r($request);
    }

    //String and Numbers
    public function example20(){
        return view('example20');
    }

    //Modules
    public function example21(){
        return view('example21');
    }
    //Generators
    public function example22(){
        return view('example22');
    }
    public function example23(){
        return view('example23');
    }

    //Set methods
    public function example24(){
        return view('example24');
    }
    //Map methods
    public function example25(){
        return view('example25');
    }
}
