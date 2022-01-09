<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\OfficeImport;
use Excel;

class UploadController extends Controller
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
    	return view('uploads.index');
    }
    
    /*
    |-----------------------------------------
    | CREATE or STORE DATA 
    |-----------------------------------------
    */
    public function upload(Request $request){
    	// body
        Excel::import(new OfficeImport, $request->file('excel_file'));
        return redirect('/');
    }
}
