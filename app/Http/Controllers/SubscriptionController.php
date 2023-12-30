<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoresubscriptionRequest;
use App\Http\Requests\UpdatesubscriptionRequest;
use App\Models\subscription;
use App\Models\Office;
use App\Models\Demand;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class SubscriptionController extends Controller
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
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $demands = subscription::get();
        return view('subscribe.index', compact('demands'));


        // if($request->has('search_keywords')){

        //     $search_keywords = $request->search_keywords;
        //     $demands = subscription::where('cadastral_zone', 'LIKE', "%$search_keywords%")
        //     ->orWhere('asset_no', 'LIKE', "%$search_keywords%")
        //     ->orWhere('prop_addr', 'LIKE', "%$search_keywords%")
        //     ->orWhere('pid', 'LIKE', "%$search_keywords%")
        //     ->orderBy('pid', 'DESC')
        //     ->paginate(10);

        // }else{
        //     $demands = Office::where('grand_total', '>=',$grandTotal)
        //     ->sortable('pid', 'DESC')
        //     ->paginate(20);
        // }

        // return view('subscribe.index', compact('demands'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoresubscriptionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoresubscriptionRequest $request)
    {
        // return "hello";
        $user_name = Auth::user()->name;
        // return $user_name;
        $sub = new subscription();
        $sub->name               =$user_name;
        $sub->pid                =$request->input('pid');
        $sub->occupant           =$request->input('occupant');
        $sub->prop_addr          =$request->prop_addr;
        $sub->asset_no           =$request->asset_no;
        $sub->prop_type          =$request->prop_type;
        $sub->prop_use           =$request->prop_use;
        $sub->rating_dist        =$request->rating_dist;
        $sub->annual_value       =$request->annual_value;
        $sub->rate_payable       =$sub->annual_value;
        $sub->arrears            =$request->arrears;
        $sub->penalty            =$request->penalty;
        $sub->grand_total        =$request->grand_total;
        $sub->paid_amount        =$request->paid_amount;
        $sub->ref_code           =rand(100,999).Str::random(5);
        $sub->balance            =$request->grand_total - $request->paid_amount;
        if ($sub->paid_amount > $sub->grand_total) {
            # code...
            return 'payment amount should not be greater than grand total';
        }
        // return $sub;

        $sub->save();

        $demand = Office::where('pid',$sub->pid )->first();
        $demand->paid_amount = $sub->paid_amount;
        $demand->grand_total = $demand->grand_total-$sub->paid_amount;
        $demand->save();
        return redirect()->route('payment');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function getPaymentInfo($id)
    {
        //
        if (Auth::user()->user_type == 'super') {
            $office = Office::findOrFail($id);
            return view('subscribe.paybill', compact('office'));
        } else {
            // return 'you are not allow to view this page';
            return redirect()->back(); 
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatesubscriptionRequest  $request
     * @param  \App\Models\subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatesubscriptionRequest $request, subscription $subscription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function destroy(subscription $subscription)
    {
        //
    }

    public function successful(){
        return view('subscribe.success');
        
    }
    public function receipt ($id){
        if (Auth::user()->user_type == 'super') {
            $receipt = subscription::findOrFail($id);
            return view('receipt.view', compact('receipt'));
        } else {
            // return 'you are not allow to view this page';
            return redirect()->back(); 
        }
        // return view ('receipt.view');
    }
}
