<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Office;
use PDF;

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
        if($request->has('search_keywords')){

            $search_keywords = $request->search_keywords;
            $offices = Office::where('cadastral_zone', 'LIKE', "%$search_keywords%")
            ->orWhere('asset_no', 'LIKE', "%$search_keywords%")
            ->orWhere('prop_addr', 'LIKE', "%$search_keywords%")
            ->orWhere('pid', 'LIKE', "%$search_keywords%")
            ->orderBy('pid', 'DESC')
            ->paginate(10);

        }else{
            $offices = Office::orderBy('pid', 'DESC')->paginate(10);
        }
        
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

    public function search(Request $request){

        $powerMeter = Office::query();

        $pid                      = $request->pid;
        $cadastral_zone           = $request->cadastral_zone;
        $asset_no                 = $request->asset_no;
        $prop_addr                = $request->prop_addr;

        if($request->has('keywords')){
            $powerMeter->where(function($query) use ($request) {
            $query->where('pid', 'LIKE', "%{$pid}%")
            ->orWhere('cadastral_zone', 'LIKE', "%{$cadastral_zone}%")
            ->orWhere('asset_no', 'LIKE', "%{$asset_no}%")
            ->orWhere('prop_addr', 'LIKE', "%{$prop_addr}%");
            });
        }
        
        return view('office.index', compact('office'));
    }

     // Generate PDF
    public function createPDF() 
    {
      // retreive all records from db
      $office = Office::all();

      // share data to view
      view()->share('office',$office);
      $pdf = PDF::loadView('pdf_view', $data);

      // download PDF file with download method
      return $pdf->download('pdf_file.pdf');
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
