<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Office;

class OfficeController extends Controller
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
        return view('office.index', compact('offices'));
    }

    /*
    |-----------------------------------------
    | SHOW VIEW INDEX
    |-----------------------------------------
    */
    public function view(Request $request){
        // body
        $office = Office::where('pid', $request->pid)->first();
        return view('office.show', compact('office'));
    }
    
    /*
    |-----------------------------------------
    | CREATE or STORE DATA 
    |-----------------------------------------
    */
    public function addOne(Request $request){
    	// body
    }
    
    /*
    |-----------------------------------------
    | FETCH DATA 
    |-----------------------------------------
    */
    public function fetchOne(Request $request){
    	// body
    }
    
    /*
    |-----------------------------------------
    | FETCH ALL DATA 
    |-----------------------------------------
    */
    public function fetchAll(Request $request){
    	// body
    }
    
    /*
    |-----------------------------------------
    | MODIFY or UPDATE DATA 
    |-----------------------------------------
    */
    public function updateOne(Request $request){
    	// body
    }
    
    /*
    |-----------------------------------------
    | DELETE DATA
    |-----------------------------------------
    */
    public function deleteOne(Request $request){
    	// body
    }
    
    /*
    |-----------------------------------------
    | DESTROY DATA
    |-----------------------------------------
    */
    public function destroyOne(Request $request){
    	// body
    }
    
    
}
