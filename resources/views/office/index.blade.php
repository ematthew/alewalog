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
            <div class="row">
                <div class="col-xl-12 col-md-12 mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">All Offices</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                                    <tfoot>
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
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>pid</td>
                                            <td>occupant</td>
                                            <td>prop_addr</td>
                                            <td>street_name</td>
                                            <td>asset_no</td>
                                            <td>cadastral_zone</td>
                                            <td>prop_type</td>
                                            <td>prop_use</td>
                                            <td>rating_dist</td>
                                            <td>annual_value</td>
                                            <td>rate_payable</td>
                                            <td>arrears</td>
                                            <td>penalty</td>
                                            <td>grand_total</td>
                                            <td>category</td>
                                            <td>group</td>
                                            <td>active</td>
                                        </tr>
                                    </tbody>
                                </table>
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