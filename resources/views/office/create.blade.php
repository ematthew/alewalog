@extends('layouts.app') 

@section('title')
    Home
@endsection

@section('contents')


<form action="{{ url('/store') }}" method="post">
  <fieldset >
    <legend>Create new Office Record</legend>

    <div class="mb-3">
      <label class="form-label">Pid Number</label>
      <input type="text" name="pid" class="form-control" placeholder="Pid Number">
    </div>

    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">The Occupant</label>
      <input type="text" name="occupant" class="form-control" placeholder="The Occupant">
    </div>

    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Property Address</label>
      <input type="text" name="prop_addr" class="form-control" placeholder="Property Address">
    </div>

     <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Street Name</label>
      <input type="text" name="street_name" class="form-control" placeholder="Street Name">
    </div>

    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Asset Number</label>
      <input type="text" name="asset_no" class="form-control" placeholder="Asset Numbe">
    </div>

    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Cadastral zone</label>
      <input type="text" name="cadastral_zone" class="form-control" placeholder="cadastral_zone">
    </div>

    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Property Type</label>
      <input type="text" name="prop_type" class="form-control" placeholder="Property Type">
    </div>

    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Property Use</label>
      <input type="text" name="prop_use" class="form-control" placeholder="Property Use">
    </div>

    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Rating District</label>
      <input type="text" name="rating_dist" class="form-control" placeholder="Rating District">
    </div>

    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Anual Value</label>
      <input type="text" name="annual_value" class="form-control" placeholder="Anual Value">
    </div>

    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Rate Payable</label>
      <input type="text" name="rate_payable" class="form-control" placeholder="Rate Payable">
    </div>

    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Arrears</label>
      <input type="text" name="arrears" class="form-control" placeholder="Arrears">
    </div>

    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Penalty</label>
      <input type="text" name="penalty" class="form-control" placeholder="Penalty">
    </div>

    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Grand Total</label>
      <input type="text" name="grand_total" class="form-control" placeholder="Grand Total">
    </div>

    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Category</label>
      <input type="text" name="category" class="form-control" placeholder="Category">
    </div>

    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Group</label>
      <input type="text" name="group" class="form-control" placeholder="Group">
    </div>
    
    <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Acive</label>
      <input type="text" name="active" class="form-control" placeholder="active">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </fieldset>
</form>


@endsection