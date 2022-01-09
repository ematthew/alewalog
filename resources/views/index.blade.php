@extends('layouts.app')

{{-- title section --}}
@section('title')
    Home
@endsection


{{-- contents --}}
@section('contents')
    <!-- Main Content -->
    <div id="content">

        @include('components.navigation')

        <!-- Begin Page Content -->
        <div class="container-fluid">

            @include('components.topcard')

            <div class="row">
                <div class="col-xl-12 col-md-12 mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">All Offices</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered small" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>PID</th>
                                            <th>OCCUPANT</th>
                                            <th>PROP ADDR</th>
                                            <th>STREET NAME</th>
                                            <th>ASSET NO</th>
                                            <th>CADASTRAL ZONE</th>
                                            <th>PROP TYPE</th>
                                            <th>PROP USE</th>
                                            <th>RATING DIST</th>
                                            <th>ANNUAL VALUE</th>
                                            <th>RATE PAYABLE</th>
                                            <th>ARREARS</th>
                                            <th>PENALTY</th>
                                            <th>GRAND TOTAL</th>
                                            <th>CATEGORY</th>
                                            <th>GROUP</th>
                                            <th>ACTIVE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($offices as $key => $office)
                                            <tr>
                                                <td width="10%">{{ $office->pid }}</td>
                                                <td width="10%">{{ $office->occupant }}</td>
                                                <td width="10%">{{ $office->prop_addr }}</td>
                                                <td width="10%">{{ $office->street_name }}</td>
                                                <td width="10%">{{ $office->asset_no }}</td>
                                                <td width="10%">{{ $office->cadastral_zone }}</td>
                                                <td width="10%">{{ $office->prop_type }}</td>
                                                <td width="10%">{{ $office->prop_use }}</td>
                                                <td width="10%">{{ $office->rating_dist }}</td>
                                                <td width="10%">{{ $office->annual_value }}</td>
                                                <td width="10%">{{ $office->rate_payable }}</td>
                                                <td width="10%">{{ $office->arrears }}</td>
                                                <td width="10%">{{ $office->penalty }}</td>
                                                <td width="10%">{{ $office->grand_total }}</td>
                                                <td width="10%">{{ $office->category }}</td>
                                                <td width="10%">{{ $office->group }}</td>
                                                <td width="10%">{{ $office->active }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <div class="row">
                                    <div class="col-md-12 paginate">
                                        {!! $offices->links() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
@endsection

{{-- scripts --}}
@section('scripts')
    
@endsection