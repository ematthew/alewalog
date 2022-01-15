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
                        <div class="mx-auto pull-right">
                            <div class="">
                              <form action="" method="GET" role="search">

                                   <div class="input-group">
                                     <span class="input-group-btn mr-5 mt-1">
                                        <button class="btn btn-info" type="submit" title="Search projects">
                                           <span class="fas fa-search">search</span>
                                        </button>
                                     </span>
                                         <input type="text" class="form-control mr-6" name="term" placeholder="Search projects">
                                          <a href="" class=" mt-1">
                                         <span class="input-group-btn">
                                            <button class="btn btn-danger" type="button" title="Refresh page">
                                               <span class="fas fa-sync-alt"></span>
                                            </button>s
                                         </span>
                                         </a>
                                   </div>
                              </form>
                           </div>
                       </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered small" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>
                                                <label for="check-all">
                                                    <input type="checkbox" name="check-all" class="form-control"> All
                                                </label>
                                            </th>
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
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($offices as $key => $office)
                                            <tr>
                                                <td>
                                                    <label for="check-{{ $office->pid }}">
                                                        <input type="checkbox" name="check-{{ $office->pid }}" style="width: 15px;height: 15px;">
                                                    </label>
                                                </td>
                                                <td>{{ $office->pid }}</td>
                                                <td>{{ $office->occupant }}</td>
                                                <td>{{ $office->prop_addr }}</td>
                                                <td>{{ $office->street_name }}</td>
                                                <td>{{ $office->asset_no }}</td>
                                                <td>{{ $office->cadastral_zone }}</td>
                                                <td>{{ $office->prop_type }}</td>
                                                <td>{{ $office->prop_use }}</td>
                                                <td>{{ $office->rating_dist }}</td>
                                                <td>{{ $office->annual_value }}</td>
                                                <td>{{ $office->rate_payable }}</td>
                                                <td>{{ $office->arrears }}</td>
                                                <td>{{ $office->penalty }}</td>
                                                <td>{{ $office->grand_total }}</td>
                                                <td>{{ $office->category }}</td>
                                                <td>{{ $office->group }}</td>
                                                <td>{{ $office->active }}</td>
                                                <td>
                                                    <a href="{{url('offices/view')}}?pid={{ $office->pid }}" class="">
                                                        <i class="fa fa-print"></i> Print
                                                    </a>
                                                </td>
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