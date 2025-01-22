<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Office;
use Illuminate\Support\Facades\Auth;
class GuduController extends Controller
{
    public function index(Request $request)
    {
        // return 'here';
        $paid_amount = 0;
        if ($request->has('search_keywords')) {

            $search_keywords = $request->search_keywords;
            $offices = Office::where('cadastral_zone', "GUDU")
                ->orWhere('cadastral_zone', "B01 - GUDU")
                ->orWhere('asset_no', 'LIKE', "%$search_keywords%")
                ->orWhere('prop_addr', 'LIKE', "%$search_keywords%")
                ->orWhere('pid', 'LIKE', "%$search_keywords%")
                ->orderBy('pid', 'DESC')
                ->paginate(20);
        } else {

            $offices = Office::where('paid_amount', '>=', $paid_amount)
            ->where('cadastral_zone', "GUDU")
            ->orWhere('cadastral_zone', "B01 - GUDU")
            ->where('grand_total', '!=', $paid_amount)
            ->sortable('pid', 'DESC')->paginate(20);
        }

        return view('gudu.index', compact('offices'));
    }

    public function previewAll(Request $request)
    {
        if (Auth::user()->user_type == 'super') {
            $office_ids = json_decode($request->office_ids);

            $offices = Office::whereIn('id', $office_ids)->orderBy('pid', 'DESC')->get();
            return view('gudu.preview', compact('offices'));
        } else {
            return redirect()->back();
        }
    }
}
