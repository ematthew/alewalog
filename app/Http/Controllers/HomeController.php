<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        // dd(\Auth::user()->user_type == 'super');
        // if (\Auth::user()->user_type == 'super') {
        //     # code...
        //     $offices = Office::orderBy('pid', 'DESC')->paginate(10);
        //     $totalRate = Office::sum('rate_payable');
        //     $totalgrand = Office::sum('grand_total');
        //     $totalvalue = Office::sum('annual_value');
        //     return view('index', compact('offices', 'totalRate', 'totalvalue'));
        // }else {
        //     // dd('you are not permited to view this page');
        //     return 'you are not permited to view this page';
        // }
        $offices = Office::orderBy('pid', 'DESC')->paginate(10);
        $totalRate = Office::sum('rate_payable');
        $totalgrand = Office::sum('grand_total');
        $totalvalue = Office::sum('annual_value');
    	return view('index', compact('offices', 'totalRate', 'totalvalue'));


    }

    public function total()
    { 
        $totalgrand = DB::table('offices')->where('grand_total');
        $payment = DB::table('offices')->Where('paid_amount');
        $amount = $payment - $totalgrand;
        
    }

}
