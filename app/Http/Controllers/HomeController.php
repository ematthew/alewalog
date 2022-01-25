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
        $totalRate = Office::sum('rate_payable');
        $totalgrand = Office::sum('grand_total');
        $totalvalue = Office::sum('annual_value');
    	return view('index', compact('offices', 'totalRate', 'totalvalue'));
    }


}
