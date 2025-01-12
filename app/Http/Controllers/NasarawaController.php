<?php

namespace App\Http\Controllers;

use App\Models\Nasarawa;
use App\Models\Office;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NasarawaController extends Controller
{
    /*
    |-----------------------------------------
    | AUTHENTICATION
    |-----------------------------------------
    */
    public function __construct()
    {
        // body
        $this->middleware('auth');
        $this->middleware('auth.menu')->only('index');
    }
     /*
    |-----------------------------------------
    | SHOW VIEW INDEX
    |-----------------------------------------
    */
    public function index(Request $request)
    {
        // body
        $grandTotal = 1000;
        if ($request->has('search_keywords')) {

            $search_keywords = $request->search_keywords;
            $offices = Office::where('cadastral_zone', 'LIKE', "%$search_keywords%")
                ->orWhere('asset_no', 'LIKE', "%$search_keywords%")
                ->orWhere('prop_addr', 'LIKE', "%$search_keywords%")
                ->orWhere('pid', 'LIKE', "%$search_keywords%")
                ->orderBy('pid', 'DESC')
                ->paginate(20);
        } else {
            $offices = Office::where('grand_total', '<', $grandTotal)->sortable('pid', 'DESC')->paginate(20);
        }

        return view('nasarawa.index', compact('offices'));
    }

    
    // |-----------------------------------------
    // | EDIT DATA
    // |-----------------------------------------

    public function edit($id)
    {
        if (Auth::user()->user_type == 'super') {
            $office = Office::findOrFail($id);
            return view('nasarawa.edit', compact('office'));
        } else {
            return redirect()->back();
        }
    }

    public function create()
    {
        return view('nasarawa.create');
    }

    public function store(Request $request)
    {

        $office = new Nasarawa();
        $office->pid                = $request->input('pid');
        $office->occupant           = $request->input('occupant');
        $office->prop_addr          = $request->input('prop_addr');
        $office->street_name        = $request->input('street_name');
        $office->asset_no           = $request->input('asset_no');
        $office->cadastral_zone     = $request->input('cadastral_zone');
        $office->prop_type          = $request->input('prop_type');
        $office->prop_use           = $request->input('prop_use');
        $office->rating_dist        = $request->input('rating_dist');
        $office->annual_value       = $request->input('annual_value');
        $office->rate_payable       = 0.04 * $office->annual_value;
        $office->arrears            = $request->input('arrears');
        $office->penalty            = 0.10 * $office->arrears;
        $office->paid_amount        = $request->input('paid_amount');
        $office->grand_total        = $office->rate_payable + $office->arrears + $office->penalty;
        $office->category           = $request->input('category');
        $office->group              = $request->input('group');
        $office->active             = $request->input('active');

        $office->save();
        return redirect('nasarawa')->with('success', 'office information has been created Successfully');
    }


        // |-----------------------------------------
    // | MODIFY or UPDATE DATA
    // |-----------------------------------------

    public function update($id, Request $request)
    {


        if (Auth::user()->user_type == 'super') {
            $office = Office::find($id);
            $office->pid                = $request->pid;
            $office->occupant           = $request->occupant;
            $office->prop_addr          = $request->prop_addr;
            $office->street_name        = $request->street_name;
            $office->asset_no           = $request->asset_no;
            $office->cadastral_zone     = $request->cadastral_zone;
            $office->prop_type          = $request->prop_type;
            $office->prop_use           = $request->prop_use;
            $office->rating_dist        = $request->rating_dist;
            $office->annual_value       = $request->annual_value;
            $office->rate_payable       = 0.04 * $office->annual_value;
            $office->arrears            = $request->arrears;
            $office->penalty            = 0.10 * $office->arrears;
            $office->paid_amount        = $request->paid_amount;
            $office->grand_total        = $office->rate_payable + $office->arrears + $office->penalty - $office->paid_amount;
            $office->category           = $request->category;
            $office->group              = $request->group;
            $office->active             = $request->active;

            $office->update();

            return redirect('nasarawa')->with('success', 'office information has been created Successfully');
        } else {
            // return 'you are not allow to view this page';
            return redirect()->back();
        }
    }

        /*
    |-----------------------------------------
    | SHOW VIEW INDEX
    |-----------------------------------------
    */
    public function view(Request $request)
    {
        // body
        if (Auth::user()->user_type == 'super') {
            $office = Office::where('pid', $request->pid)->first();
            return view('office.show', compact('office'));
        } else {
            $msg = 'you are not allow to view this page';
            return Redirect::back()->with($msg);
        }
    }

    public function previewAll(Request $request)
    {
        // body
        if (Auth::user()->user_type == 'super') {
            $office_ids = json_decode($request->office_ids);

            $offices = Office::whereIn('id', $office_ids)->orderBy('pid', 'DESC')->get();
            return view('office.preview', compact('offices'));
        } else {
            // return 'you are not allow to view this page';
            return redirect()->back();
        }
    }

}
