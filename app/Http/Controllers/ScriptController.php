<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScriptController extends Controller
{
    public function index(){
    	return view('javascript/example1');
    }
    public function script2(){
    	return view('javascript/script2');
    }
    public function script3(){
    	return view('javascript/script3');
    }
    public function script4(){
    	return view('javascript/script4');
    }
    public function script5(){
    	return view('javascript/script5');
    }
    public function script6(){
        return view('javascript/script6');
    }
    public function script7(){
        return view('javascript/script7');
    }
    public function script8(){
        return view('javascript/script8');
    }
    public function script9(){
    	return view('javascript/script9');
    }
}
