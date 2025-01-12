<?php

namespace App\Http\Controllers;

use App\Imports\NasarawaImport;
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
        $this->middleware('auth.menu')->only('index');
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


        /*
    |-----------------------------------------
    | CREATE or STORE DATA 
    |-----------------------------------------
    */
    public function nasarawaUpload(Request $request){
    	// body
        Excel::import(new NasarawaImport, $request->file('excel_file'));
        return redirect('/');
    }

        /*
    |-----------------------------------------
    | SHOW VIEW INDEX
    |-----------------------------------------
    */
    public function nasarawaIndex(Request $request){
    	// body
    	return view('nasarawa_uploads.index');
    }
}
