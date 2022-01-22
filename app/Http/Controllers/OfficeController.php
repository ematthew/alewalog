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
            ->paginate(50);

        }else{
            $offices = Office::orderBy('pid', 'DESC')->paginate(20);
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

    public function create()
    {
        return view('office.create');
    }

    public function previewAll(Request $request){
        // body
        $office_ids = json_decode($request->office_ids);

        $offices = Office::whereIn('id', $office_ids)->orderBy('pid', 'DESC')->get();
        return view('office.preview', compact('offices'));
    }
    
    public function store(Request $request){

        $office = new Office();
        $office->pid                =$request->input('pid');
        $office->occupant           =$request->input('occupant');
        $office->prop_addr          =$request->input('prop_addr');
        $office->street_name        =$request->input('street_name');
        $office->asset_no           =$request->input('asset_no');
        $office->cadastral_zone     =$request->input('cadastral_zone');
        $office->prop_type          =$request->input('prop_type');
        $office->prop_use           =$request->input('prop_use');
        $office->rating_dist        =$request->input('rating_dist');
        $office->annual_value       =$request->input('annual_value');
        $office->rate_payable       =$request->input('rate_payable');
        $office->arrears            =$request->input('arrears');
        $office->penalty            =$request->input('penalty');
        $office->grand_total        =$request->input('grand_total');
        $office->category           =$request->input('category');
        $office->group              =$request->input('group');
        $office->active             =$request->input('active');

        $office->save();
        return redirect()->route('office')->with('success','office information has been created Successfully');
    }
    
    
    // |-----------------------------------------
    // | FETCH DATA 
    // |-----------------------------------------
    
    public function edit($id)
    {

        $office = Office::findOrFail($id);        
        return view('office.edit',compact('office'));
    }
    
    // |-----------------------------------------
    // | MODIFY or UPDATE DATA 
    // |-----------------------------------------
    
    public function update($id, Request $request){

        $office = Office::find($id);
        $office->pid                =$request->pid;
        $office->occupant           =$request->occupant;
        $office->prop_addr          =$request->prop_addr;
        $office->street_name        =$request->street_name;
        $office->asset_no           =$request->asset_no;
        $office->cadastral_zone     =$request->cadastral_zone;
        $office->prop_type          =$request->prop_type;
        $office->prop_use           =$request->prop_use;
        $office->rating_dist        =$request->rating_dist;
        $office->annual_value       =$request->annual_value;
        $office->rate_payable       =$request->rate_payable;
        $office->arrears            =$request->arrears;
        $office->penalty            =$request->penalty;
        $office->grand_total        =$request->grand_total;
        $office->category           =$request->category;
        $office->group              =$request->group;
        $office->active             =$request->active;

        $office->update();
        return redirect()->route('office.index')->with('success','office information has been created Successfully');
    }
    
    // /*
    // |-----------------------------------------
    // | DESTROY DATA
    // |-----------------------------------------
    
    public function destroy($id)
    {

        $office = Office::find($id);
        $office->delete();
        return view('office.index',compact('office'));
    }
    
    
}
