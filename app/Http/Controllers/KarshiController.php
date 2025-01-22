<?php

namespace App\Http\Controllers;
use App\Models\Office;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
class KarshiController extends Controller
{
    public function index(Request $request)
    {
        $paid_amount = 0;
        if ($request->has('search_keywords')) {

            $search_keywords = $request->search_keywords;
            $offices = Office::where('cadastral_zone', "karshi")
                ->orWhere('asset_no', 'LIKE', "%$search_keywords%")
                ->orWhere('prop_addr', 'LIKE', "%$search_keywords%")
                ->orWhere('pid', 'LIKE', "%$search_keywords%")
                ->orderBy('pid', 'DESC')
                ->paginate(20);
        } else {

            $offices = Office::where('paid_amount', '>=', $paid_amount)
            ->where('cadastral_zone', "karshi")
            ->where('grand_total', '!=', $paid_amount)
            ->sortable('pid', 'DESC')->paginate(20);
        }

        return view('karshi.index', compact('offices'));
    }

    public function previewAll(Request $request)
    {
        if (Auth::user()->user_type == 'super') {
            $office_ids = json_decode($request->office_ids);

            $offices = Office::whereIn('id', $office_ids)->orderBy('pid', 'DESC')->get();
            return view('karshi.preview', compact('offices'));
        } else {
            return redirect()->back();
        }
    }
}
