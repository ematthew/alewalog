@extends('layouts.app')


@section('title')
    Home
@endsection


@section('contents')
    <!-- Main Content -->
    <div id="content">

        @include('components.navigation')

        <!-- Begin Page Content -->
        <div class="container-fluid">

            @include('components.topcard')

        <style>
                .uper 
            {
                    margin-top: 40px;
             }
        </style>
    <div class="card uper">
        <div class="card-header">
            Create new Office Record
        </div>
          <div class="card-header">
            <a class="btn btn-primary" href="{{ url('offices') }}"> Back</a>
        </div>
    </div>
      <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                     @endforeach
                </ul>
             </div><br />
        @endif

         <form method="POST" action="{{ url('offices/store') }}">
            <div class="form-group">
                  @csrf
                    <label for="name">Pid Number:</label>
                    <input type="text" name="pid" class="form-control" placeholder="Pid Number">
            </div>
                <div class="form-group">
                    <label for="cases">The Occupant :</label>
                    <input type="text" name="occupant" class="form-control" placeholder="The Occupant">
                </div>
                <div class="form-group">
                    <label for="cases">Property Address:</label>
                    <input type="text" name="prop_addr" class="form-control" placeholder="Property Address">
                </div>
                <div class="form-group">
                    <label for="cases">Street Name:</label>
                    <input type="text" name="street_name" class="form-control" placeholder="Street Name">
                </div>
                <div class="form-group">
                    <label for="cases">Asset Number:</label>
                    <input type="text" name="asset_no" class="form-control" placeholder="Asset Numbe">
                </div>
                <div class="form-group">
                    <label for="cases">Cadastral zone</label>
                    <input type="text" name="cadastral_zone" class="form-control" placeholder="cadastral_zone">
                </div>
                <div class="form-group">
                    <label for="cases">Property Type</label>
                    <input type="text" name="prop_type" class="form-control" placeholder="Property Type">
                </div>
                <div class="form-group">
                    <label for="cases">Property Use</label>
                    <input type="text" name="prop_use" class="form-control" placeholder="Property Use">
                </div>
                <div class="form-group">
                    <label for="cases">Rating District</label>
                    <input type="text" name="rating_dist" class="form-control" placeholder="Rating District">
                </div>
                <div class="form-group">
                    <label for="cases">Anual Value</label>
                    <input type="text" name="annual_value" class="form-control" placeholder="Anual Value">
                </div>
                <!-- <div class="form-group">
                    <label for="cases">Rate Payable</label>
                    <input type="text" name="rate_payable" class="form-control" placeholder="Rate Payable">
                </div> -->
                <div class="form-group">
                    <label for="cases">Arrears</label>
                    <input type="text" name="arrears" class="form-control" placeholder="Arrears">
                </div>
                <div class="form-group">
                    <label for="cases">Penalty</label>
                    <input type="text" name="penalty" class="form-control" placeholder="Penalty">
                </div>
                 <!-- <div class="form-group">
                    <label for="cases">Grand Total</label>
                    <input type="text" name="grand_total" class="form-control" placeholder="Grand Total">
                </div> -->
                 <div class="form-group">
                    <label for="cases">Category</label>
                    <input type="text" name="category" class="form-control" placeholder="Category">
                </div>
                 <div class="form-group">
                    <label for="cases">Group</label>
                    <input type="text" name="group" class="form-control" placeholder="Group">
                </div>
                 <div class="form-group">
                    <label for="cases">Acive</label>
                    <input type="text" name="active" class="form-control" placeholder="active">
                </div>
              <button type="" class="btn btn-primary">Add Data</button>
            </form>
     </div>
 </div>
    <!-- End of Main Content -->
@endsection

{{-- scripts --}}
@section('scripts')
    
@endsection