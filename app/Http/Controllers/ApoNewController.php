<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Office;
use Illuminate\Support\Facades\Auth;
class ApoNewController extends Controller
{
    public function index(Request $request)
    {
        // return 'here';
        $paid_amount = 0;
        if ($request->has('search_keywords')) {

            $search_keywords = $request->search_keywords;
            $offices = Office::where('cadastral_zone', "Apo")
                ->orWhere('asset_no', 'LIKE', "%$search_keywords%")
                ->orWhere('prop_addr', 'LIKE', "%$search_keywords%")
                ->orWhere('pid', 'LIKE', "%$search_keywords%")
                ->orderBy('pid', 'DESC')
                ->paginate(20);
        } else {

            $offices = Office::where('paid_amount', '>=', $paid_amount)
            ->where('cadastral_zone', "Apo")
            ->where('grand_total', '!=', $paid_amount)
            ->sortable('pid', 'DESC')->paginate(20);
        }

        return view('apo-new.index', compact('offices'));
    }

    public function previewAll(Request $request)
    {
        if (Auth::user()->user_type == 'super') {
            $office_ids = json_decode($request->office_ids);

            $offices = Office::whereIn('id', $office_ids)->orderBy('pid', 'DESC')->get();
            return view('apo-new.preview', compact('offices'));
        } else {
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
            return view('apo-new.show', compact('office'));
        } else {
            $msg = 'you are not allow to view this page';
            return Redirect::back()->with($msg);
        }
    }

        // |-----------------------------------------
    // | FETCH DATA
    // |-----------------------------------------

    public function edit($id)
    {
        if (Auth::user()->user_type == 'super') {
            $office = Office::findOrFail($id);
            return view('apo-new.edit', compact('office'));
        } else {
            return redirect()->back();
        }
    }

    
}
