<?php

namespace App\Http\Controllers;
use App\Models\Demand;
use App\Models\TotalDemandPrint;
use PDF;
use App\Models\Office;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DemandController extends Controller
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
        $grandTotal = 1000;

        if($request->has('search_keywords')){

            $search_keywords = $request->search_keywords;
            $demands = Office::where('cadastral_zone', 'LIKE', "%$search_keywords%")
            ->orWhere('asset_no', 'LIKE', "%$search_keywords%")
            ->orWhere('prop_addr', 'LIKE', "%$search_keywords%")
            ->orWhere('pid', 'LIKE', "%$search_keywords%")
            ->orderBy('pid', 'DESC')
            ->paginate(10);

        }else{
            $demands = Office::where('grand_total', '>=',$grandTotal)
            ->sortable('pid', 'DESC')
            ->paginate(20);
        }

        return view('demand.index', compact('demands'));
    }

    /*
    |-----------------------------------------
    | SHOW VIEW INDEX
    |-----------------------------------------
    */
    public function view(Request $request){
        // body
        $demand = Demand::where('pid', $request->pid)->first();
        return view('Demand.show', compact('demand'));
    }

     // Generate PDF
    public function createPDF()
    {
      // retreive all records from db
      $demand = Demand::all();

      // share data to view
      view()->share('demand',$demand);
      $pdf = PDF::loadView('pdf_view', $data);

      // download PDF file with download method
      return $pdf->download('pdf_file.pdf');
    }

    public function create()
    {
        return view('demand.create');
    }

    public function previewAll(Request $request){
        // body
        $demand_ids = json_decode($request->demand_ids);

        $demands = Demand::whereIn('id', $demand_ids)->orderBy('pid', 'DESC')->get();
        return view('demands.preview', compact('demands'));
    }


    public function store(Request $request){

        $demand = new Demand();
        $demand->pid                =$request->input('pid');
        $demand->occupant           =$request->input('occupant');
        $demand->prop_addr          =$request->input('prop_addr');
        $demand->street_name        =$request->input('street_name');
        $demand->asset_no           =$request->input('asset_no');
        $demand->cadastral_zone     =$request->input('cadastral_zone');
        $demand->prop_type          =$request->input('prop_type');
        $demand->prop_use           =$request->input('prop_use');
        $demand->rating_dist        =$request->input('rating_dist');
        $demand->annual_value       =$request->input('annual_value');
        $demand->rate_payable       =0.04 * $demand->annual_value;
        $demand->arrears            =$request->input('arrears');
        $demand->penalty            =$request->input('penalty');
        $demand->paid_amount        =$request->input('paid_amount');
        $demand->grand_total        = $demand->rate_payable + $demand->arrears + $demand->penalty;
        $demand->category           =$request->input('category');
        $demand->group              =$request->input('group');
        $demand->active             =$request->input('active');

        $demand->save();
        return redirect()->route('demands')->with('success','demand information has been created Successfully');
    }


    // |-----------------------------------------
    // | FETCH DATA
    // |-----------------------------------------

    public function edit($id)
    {
        if (Auth::user()->user_type == 'super') {
            $demand = Demand::findOrFail($id);
            return view('demand.edit',compact('demand'));
        } else {
            return redirect()->back(); 
        }
    }

    // |-----------------------------------------
    // | MODIFY or UPDATE DATA
    // |-----------------------------------------

    public function update($id, Request $request){

        if (Auth::user()->user_type == 'super') {
            $demand = Demand::find($id);




        $demand->pid                =$request->pid;
        $demand->occupant           =$request->occupant;
        $demand->prop_addr          =$request->prop_addr;
        $demand->street_name        =$request->street_name;
        $demand->asset_no           =$request->asset_no;
        $demand->cadastral_zone     =$request->cadastral_zone;
        $demand->prop_type          =$request->prop_type;
        $demand->prop_use           =$request->prop_use;
        $demand->rating_dist        =$request->rating_dist;
        $demand->annual_value       =$request->annual_value;
        $demand->rate_payable       = 0.04 * $demand->annual_value;
        $demand->arrears            =$request->arrears;
        $demand->penalty            =$request->penalty;
        $demand->paid_amount        =$request->paid_amount;
        $demand->grand_total        =$demand->rate_payable + $demand->arrears + $demand->penalty - $demand->paid_amount ;
        $demand->category           =$request->category;
        $demand->group              =$request->group;
        $demand->active             =$request->active;

        $demand->update();

        return redirect()->route('demands')->with('success','office information has been created Successfully');
        } else {
            return redirect()->back(); 
        }
    }

    // /*
    // |-----------------------------------------
    // | DESTROY DATA
    // |-----------------------------------------

    public function destroy($id)
    {
        if (Auth::user()->user_type == 'super') {
            $demand = Demand::find($id);
            $demand->delete();
            return view('demand.index',compact('demand'));
        } else {
            return redirect()->back(); 
        }
    }

    public function saveTotalPrint(Request $request )
    {

        $total_demand_print = new TotalDemandPrint();
        $total_demand_print->addOne($request);
    }

    public function sortSearch(Request $request)
    {


        // $sortSearch =  Office::where('pid', 'like', '%' . $request->pid . '%')
        // ->where('asset_no', 'like', '%' . $request->asset_no . '%')
        // ->where('street_name', 'like', '%' . $request->street_name . '%')
        // ->get();


    //     if($request->has('sortSearch')){

    //         $sortSearch = $request->sortSearch;
    //         $offices = Office::where('pid', 'like', '%' . $request->pid . '%')
    //                ->where('asset_no', 'like', '%' . $request->asset_no . '%')
    //                ->where('street_name', 'like', '%' . $request->street_name . '%')
    //                ->orderBy('pid', 'DESC')
    //                ->paginate(10);

    // }else{
    //     $offices = Office::orderBy('pid', 'DESC')->paginate(20);

    //     }return view('office.index', compact('offices'));
    }





}
