@extends('layouts.app')


@section('title')
Home
@endsection


@section('contents')
<!-- Main Content -->
<div id="content">

    @include('components.navigation')

    <!-- Begin Page Content -->
    <div class="container">
        <center style="color: green;">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>PAYMENT</h2>
                    </div>
                </div>
            </div>
        </center>
    </div>

    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
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

        <form action="{{route('paid')}}" method="POST">
            <div class="form-group">
                @csrf
                <label for="name">Pid Number:</label>
                <!-- <div type="text" name="pid" class="form-control">{{ $office->pid }}</div> -->
                <input type="text" name="pid" class="form-control" value="{{ $office->pid }}" placeholder="Pid Number" readonly>
            </div>
            <div class="form-group">
                <label for="cases">The Occupant :</label>
                <!-- <div type="text" name="occupant" class="form-control" >{{ $office->occupant }}</div> -->
                <input type="text" name="occupant" class="form-control" value="{{ $office->occupant }}" placeholder="The Occupant" readonly>
            </div>
            <div class="form-group">
                <label for="cases">Property Address:</label>
                <!-- <div type="text" name="prop_addr" class="form-control">{{ $office->prop_addr }}</div> -->
                <input type="text" name="prop_addr" class="form-control" value="{{ $office->prop_addr }}" placeholder="Property Address" readonly>
            </div>
            <div class="form-group">
                <label for="cases">Asset Number:</label>
                <!-- <div type="text" name="asset_no" class="form-control">{{ $office->asset_no }}</div> -->
                <input type="text" name="asset_no" class="form-control" value="{{ $office->asset_no }}" placeholder="Asset Numbe" readonly>
            </div>
            <div class="form-group">
                <label for="cases">Property Type</label>
                <!-- <div type="text" name="prop_type" class="form-control">{{ $office->prop_type}}</div> -->
                <input type="text" name="prop_type" class="form-control" value="{{ $office->prop_type}}" placeholder="Property Type" readonly>
            </div>
            <div class="form-group">
                <label for="cases">Property Use</label>
                <!-- <div type="text" name="prop_use" class="form-control">{{ $office->prop_use}}</div> -->
                <input type="text" name="prop_use" class="form-control" value="{{ $office->prop_use}}" placeholder="Property Use" readonly>
            </div>
            <div class="form-group">
                <label for="cases">Rating District</label>
                <!-- <div type="text" name="rating_dist" class="form-control">{{ $office->rating_dist}}</div> -->
                <input type="text" name="rating_dist" class="form-control" value="{{ $office->rating_dist}}" placeholder="Rating District" readonly>
            </div>
            <div class="form-group">
                <label for="cases">Anual Value</label>
                <!-- <div type="text" name="annual_value" class="form-control">{{ $office->annual_value}}</div> -->
                <input type="text" name="annual_value" class="form-control" value="{{ $office->annual_value}}" placeholder="Anual Value" readonly>
            </div>
            <div class="form-group">
                <label for="cases">Rate Payable</label>
                <!-- <div type="text" name="rate_payable" class="form-control">{{ $office->rate_payable}}</div> -->
                <input type="text" name="rate_payable" class="form-control" value="{{ $office->rate_payable}}" placeholder="Rate Payable" readonly>
            </div>
            <div class="form-group">
                <label for="cases">Arrears</label>
                <!-- <div type="text" name="arrears" class="form-control">{{ $office->arrears}}</div> -->
                <input type="text" name="arrears" class="form-control" value="{{ $office->arrears}}" placeholder="Arrears" readonly>
            </div>
            <div class="form-group">
                <label for="cases">Penalty</label>
                <!-- <div type="text" name="penalty" class="form-control" >{{ $office->penalty}}</div> -->
                <input type="text" name="penalty" class="form-control" value="{{ $office->penalty}}" placeholder="Penalty" readonly>
            </div>
            <!-- <div class="form-group">
                    <label for="cases">Paid Amount</label>
                    <input type="text" name="paid_amount" class="form-control" value="{{ $office->paid_amount}}" placeholder="paid amount">
                </div> -->
            <div class="form-group">
                <label for="cases">Grand Total</label>
                <!-- <div type="text" name="grand_total" class="form-control">{{ $office->grand_total}}</div> -->
                <input type="text" name="grand_total" class="form-control" value="{{ $office->grand_total}}" placeholder="Grand Total" readonly>
            </div>
            <div class="form-group">
                    <label for="cases">Payment Amount</label>
                    <input type="text" name="paid_amount" class="form-control" value="{{ $office->paid_amount}}" placeholder="paid amount">
                </div>
            <input type="submit" class="btn btn-info" value="Pay">
            <!-- <input type="submit" class="btn btn-warning" value="cancel"> -->
        </form>
    </div>
</div>
<!-- End of Main Content -->
@endsection

{{-- scripts --}}
@section('scripts')

@endsection