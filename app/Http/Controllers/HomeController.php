<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Office;

class HomeController extends Controller
{
    /*
    |-----------------------------------------
    | AUTHENTICATION
    |-----------------------------------------
    */
    public function __construct(){
    	// body
    	$this->middleware('auth');
    }
    
    /*
    |-----------------------------------------
    | SHOW VIEW INDEX
    |-----------------------------------------
    */
    public function index(Request $request){
    	// body
        $offices = Office::orderBy('pid', 'DESC')->paginate(10);
    	return view('index', compact('offices'));
    }
}
