<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Office;
use Illuminate\Support\Facades\Auth;
class LifeCampController extends Controller
{
    public function index(Request $request)
    {
        $paid_amount = 0;
        if ($request->has('search_keywords')) {

            $search_keywords = $request->search_keywords;
            $offices = Office::where('cadastral_zone', "LIFE CAMP")
                ->orWhere('cadastral_zone', "mbora")
                ->orWhere('cadastral_zone', "idu")
                ->orWhere('cadastral_zone', "idu industrial")
                ->orWhere('asset_no', 'LIKE', "%$search_keywords%")
                ->orWhere('prop_addr', 'LIKE', "%$search_keywords%")
                ->orWhere('pid', 'LIKE', "%$search_keywords%")
                ->orderBy('pid', 'DESC')
                ->paginate(20);
        } else {

            $offices = Office::where('paid_amount', '>=', $paid_amount)
            ->where('cadastral_zone', "LIFE CAMP")
            ->orWhere('cadastral_zone', "mbora")
            ->orWhere('cadastral_zone', "idu")
            ->orWhere('cadastral_zone', "idu industrial")
            ->where('grand_total', '!=', $paid_amount)
            ->sortable('pid', 'DESC')->paginate(20);
        }

        return view('life_camp.index', compact('offices'));
    }

    public function previewAll(Request $request)
    {
        // body
        if (Auth::user()->user_type == 'super') {
            $office_ids = json_decode($request->office_ids);

            $offices = Office::whereIn('id', $office_ids)->orderBy('pid', 'DESC')->get();
            return view('life_camp.preview', compact('offices'));
        } else {
            // return 'you are not allow to view this page';
            return redirect()->back();
        }
    }
}
