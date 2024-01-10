<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Office;
use App\Models\TotalDemandPrint;
use Illuminate\Support\Facades\Redirect;
use PDF;
use Illuminate\Support\Facades\Auth;
use DB;


class OfficeController extends Controller
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

        return view('office.index', compact('offices'));
    }

    /*
    |-----------------------------------------
    | SHOW VIEW PAID INDEX
    |-----------------------------------------
    */

    public function paidIndex(Request $request)
    {
        $paid_amount = 0;
        if ($request->has('search_keywords')) {

            $search_keywords = $request->search_keywords;
            $offices = Office::where('cadastral_zone', 'LIKE', "%$search_keywords%")
                ->orWhere('asset_no', 'LIKE', "%$search_keywords%")
                ->orWhere('prop_addr', 'LIKE', "%$search_keywords%")
                ->orWhere('pid', 'LIKE', "%$search_keywords%")
                ->orderBy('pid', 'DESC')
                ->paginate(20);
        } else {

            $offices = Office::where('paid_amount', '>=', $paid_amount)->where('grand_total', '!=', $paid_amount)->sortable('pid', 'DESC')->paginate(20);
        }

        return view('paid_users.index', compact('offices'));
    }


    /*
    |-----------------------------------------
    | SHOW VIEW Complete INDEX
    |-----------------------------------------
    */

    public function completeIndex(Request $request)
    {
        $paid_amount = 0;
        if ($request->has('search_keywords')) {

            $search_keywords = $request->search_keywords;
            $offices = Office::where('cadastral_zone', 'LIKE', "%$search_keywords%")
                ->orWhere('asset_no', 'LIKE', "%$search_keywords%")
                ->orWhere('prop_addr', 'LIKE', "%$search_keywords%")
                ->orWhere('pid', 'LIKE', "%$search_keywords%")
                ->orderBy('pid', 'DESC')
                ->paginate(20);
        } else {
            // $offices = DB::table('offices')->where(`paid_amount`, `=`, `grand_total`)->paginate(20);


            $offices = Office::whereRaw('paid_amount = rate_payable + arrears + penalty')->sortable('pid', 'DESC')->paginate(20);
            // $offices = Office::where('paid_amount', '>=', $paid_amount)->where('grand_total', '=', $paid_amount)->sortable('pid', 'DESC')->paginate(20);

        }

        return view('complete.index', compact('offices'));
    }


    public function completeReceipt($id)
    {
        if (Auth::user()->user_type == 'super') {
            $receipt = Office::findOrFail($id);
            return view('receipt.view', compact('receipt'));
        } else {
            // return 'you are not allow to view this page';
            return redirect()->back();
        }
        // return view ('receipt.view');
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

    public function search(Request $request)
    {

        $powerMeter = Office::query();

        $pid                      = $request->pid;
        $cadastral_zone           = $request->cadastral_zone;
        $asset_no                 = $request->asset_no;
        $prop_addr                = $request->prop_addr;

        if ($request->has('keywords')) {
            $powerMeter->where(function ($query) use ($request) {
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
        view()->share('office', $office);
        $pdf = PDF::loadView('pdf_view', $data);

        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');
    }

    public function create()
    {
        return view('office.create');
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


    public function store(Request $request)
    {

        $office = new Office();
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
        $office->penalty            = $request->input('penalty');
        $office->paid_amount        = $request->input('paid_amount');
        $office->grand_total        = $office->rate_payable + $office->arrears + $office->penalty;
        $office->category           = $request->input('category');
        $office->group              = $request->input('group');
        $office->active             = $request->input('active');

        $office->save();
        return redirect('offices')->with('success', 'office information has been created Successfully');
    }


    // |-----------------------------------------
    // | FETCH DATA
    // |-----------------------------------------

    public function edit($id)
    {
        if (Auth::user()->user_type == 'super') {
            $office = Office::findOrFail($id);
            return view('office.edit', compact('office'));
        } else {
            // return 'you are not allow to view this page';
            return redirect()->back();
        }
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
            $office->penalty            = $request->penalty;
            $office->paid_amount        = $request->paid_amount;
            $office->grand_total        = $office->rate_payable + $office->arrears + $office->penalty - $office->paid_amount;
            $office->category           = $request->category;
            $office->group              = $request->group;
            $office->active             = $request->active;

            $office->update();

            return redirect('offices')->with('success', 'office information has been created Successfully');
        } else {
            // return 'you are not allow to view this page';
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
            $office = Office::find($id);
            $office->delete();
            return view('office.index', compact('office'));
        } else {
            // return 'you are not allow to perform this action';
            return redirect()->back();
        }
    }

    public function saveTotalPrint(Request $request)
    {
        if (Auth::user()->user_type == 'super') {

            $total_demand_print = new TotalDemandPrint();
            $total_demand_print->addOne($request);
        } else {
            // return 'you are not allow to perform this action';
            return redirect()->back();
        }
    }

    public function sortSearch(Request $request)
    {


        $sortSearch =  Office::where('pid', 'like', '%' . $request->pid . '%')
            ->where('asset_no', 'like', '%' . $request->asset_no . '%')
            ->where('street_name', 'like', '%' . $request->street_name . '%')
            ->get();


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
