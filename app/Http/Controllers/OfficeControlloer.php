<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Office;
use Illuminate\Http\Request;

class OfficeControlloer extends Controller
{

    public function index()
    {
        $office = Staff::latest()->paginate(5);

        return view('office.index',compact('office'))->with('i', (request()->input('page', 1)-1) *5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $office = Office::all() ;
        return view('office.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)office       
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
        $office->rate_payable       = $request->input('rate_payable');
        $office->arrears            = $request->input('arrears');
        $office->penalty            = $request->input('penalty');
        $office->grand_total        = $request->input('grand_total');
        $office->category           = $request->input('category');
        $office->group              = $request->input('group');
        $office->active             = $request->input('active');

        $office->save();
        return redirect('/');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Office $office)
    {
        return view('office.show', compact('office'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Office $office)
    {
        
       return view('office.edit', compact('office'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Office $office)
    {
        $request->validate([

        "pid"                =>  "required",              
        "occupant"           =>  "required",
        "prop_addr"          =>  "required",
        "street_name"        =>  "required",
        "asset_no"           =>  "required",
        "cadastral_zone"     =>  "required",
        "prop_type"          =>  "required",
        "prop_use"           =>  "required",
        "rating_dist"        =>  "required",
        "annual_value"       =>  "required",
        "rate_payable"       =>  "required",
        "arrears"            =>  "required",
        "penalty"            =>  "required",
        "grand_total"        =>  "required",
        "category"           =>  "required",
        "group"              =>  "required",
        "active"             =>  "required"

        ]);


        $office->update($request->all());
    
        return redirect()->route('office.index')
                        ->with('success','office data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Office $office)
    {

        $office->delete();
    
        return redirect()->route('office.index')
                        ->with('success','office data deleted successfully');
        
    }



}
