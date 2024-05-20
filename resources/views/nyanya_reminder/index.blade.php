@extends('layouts.app')

@section('title')
    Home
@endsection

@section('contents')
    <!-- Main Content -->
    <div id="content">

        @include('components.navigation')

         @php $total = 0; @endphp

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 col-md-12 mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">All Offices</h6>
                            <a class="btn btn-success" href="{{ url('offices/create') }}" title="add of office"> <i class="fas fa-plus-circle"></i> </a>
                        </div>
                        <div class="card-body">

                           <!-- <div class="card">
                                 <h2 class="text-4 mb-3" style="text-align: center;">SORT BY PID, ASSEST NUMBER AND STREET NAME </h2>
                                <form method="get" id="sortSearch" action="{{url("/sortSearch")}}">
                                        @csrf
                                    <div class="form-row">
                                    <div class="col-md-8 col-lg-3 offset-1 form-group">
                                        <input name="pid" type="text" class="form-control" id="pid" required placeholder="pid">
                                     </div>
                                    <div class="col-md-8 col-lg-3 form-group">
                                        <input name="asset_no" type="text" class="form-control" id="asset_no" required placeholder="asset_no">
                                     </div>
                                    <div class="col-md-8 col-lg-3 form-group">
                                        <input name="street_name" id="street_name" type="text" class="form-control" required placeholder="street_name">
                                    </div>

                                    <div class="col-md-4 offset-3 form-group">
                                        <button class="btn btn-primary btn-block" type="submit">Search</button>
                                    </div>
                                    </div>
                                  </form>
                                </div>
                           </div>
 -->




                            <form action="" method="GET" role="search"> 
                                <div class="row">
                                     <div class="col-md-5 offset-3">
                                        <div class="form-group">
                                            {{-- <label for="search_keywords">Search</label> --}}
                                            <input type="search" id="search_keywords" class="form-control" name="search_keywords" placeholder="search_keywords">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5 offset-5">
                                        <div class="form-group">
                                            {{-- <label for="search_keywords">Search</label> --}}
                                            <button class="btn btn-outline-primary"> Search</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <br /><hr />
                            <div class="table-responsive">
                                <table class="table table-bordered small" width="100%" id="office_table" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>
                                                {{-- <label for="check-all">
                                                    <input type="checkbox" class="parent-checkbox" onclick="checkedAllBoxes()" name="check-all" class="form-control"> All
                                                </label> --}}
                                                <div class="checkbox check-info">
                                                  <input type="checkbox" id="select-all" onchange="toggleAllCheckbox()">
                                                  <label for="select-all" class="text-white">All</label>
                                                </div>
                                            </th>
                                            <th>PID</th>
                                            <th>TOTAL PRINT </th>
                                            <th>RESULT</th>
                                            <th>OCCUPANT</th>
                                            <th>PROP ADDR</th>
                                            <th>STREET NAME</th>
                                            <th>ASSET NO </th>
                                            <th>CADASTRAL ZONE</th>
                                            <th>PROP TYPE  </th>
                                            <th>PROP USE</th>
                                            <th>RATING DIST</th>
                                            <th>ANNUAL VALUE </th>
                                            <th>RATE PAYABLE </th>
                                            <th>ARREARS</th>
                                            <th>PENALTY </th>
                                            <th>PAID AMOUNT</th>
                                            <th>GRAND TOTAL</th>
                                            <th>CATEGORY</th>
                                            <th>GROUP</th>
                                            <th>ACTIVE   </th>
                                            <th>ACTION </th>
                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $offices_box = [] @endphp
                                        @foreach($offices as $key => $office)
                                            <tr>
                                                <td>
                                                    {{-- <label for="check-{{ $office->pid }}">
                                                        <input type="checkbox" class="checkbox-options" name="check-{{ $office->pid }}" style="width: 15px;height: 15px;">
                                                    </label> --}}

                                                    <div class="checkbox check-info">
                                                        <input type="checkbox" onchange="toggleCheckbox('{{ $office->pid }}', {{ $office->id }})" class="checkbox-child" id="select-all-{{ $office->id }}">
                                                        <label for="select-all-{{ $office->id }}" class="text-white"></label>
                                                    </div>
                                                </td>
                                                <td>{{ $office->pid }}</td>
                                                <td>
                                                    @if($office->paid_amount <= 0 ) <a href="" class="text-danger">
                                                        NOT PAID
                                                        </a>
        
        
                                                        @else
        
                                                        <a href="" class="text-success">
                                                            PAID
        
                                                        </a>
                                                        @endif
                                                </td>
                                                <td>{{ $office->total_print }}</td>
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
                                                <td>{{ $office->paid_amount }}</td>
                                                <td>{{ $office->grand_total }}</td>
                                                <td>{{ $office->category }}</td>
                                                <td>{{ $office->group }}</td>
                                                <td>{{ $office->active }}</td>
                                                
                                                

                                                <td>
                                                    <a href="{{url('nyanya/reminder/view')}}?pid={{ $office->pid }}" class="">
                                                        <i class="fa fa-print"></i> Print
                                                    </a>
                                                    <!-- <a href="{{ url('offices/edit/'.$office->id) }}" class=""><i class="fa fa-edit"></i> Edit </a> -->
                                                </td>
                                                
                                            </tr>

                                            @php array_push($offices_box, $office->id) @endphp
                                            @php $total = $total + $office->grand_total + $office->paid_amount; @endphp

                                        @endforeach

                                    </tbody>
                                </table>

                                <div class="row">
                                    <div class="col-md-12 paginate">
                                        {!! $offices->withQueryString()->links() !!}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 paginate" id="print-button-dym">
                                        <a href="{{url('nyanya/reminder/preview')}}?office_ids={{ json_encode($offices_box) }}" onclick="previewPrintAll()" class="btn btn-primary col-md-12">
                                            <i class="fa fa-print"></i> Print All
                                        </a>
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
    <script type="text/javascript">

        var all_customer_ids = [];

        function toggleCheckbox(pid, customer_id) {
            if($(`#select-all-${customer_id}`).is(':checked')){
                all_customer_ids.push(customer_id);
                replacePrintButton();
            }

            if($(`#select-all-${customer_id}`).is(':checked') == false){
                for (var i = 0; i < all_customer_ids.length; i++) {
                    if(all_customer_ids[i] == customer_id){
                        all_customer_ids.splice(i, 1);
                    }
                }
            }
        }

        function toggleAllCheckbox() {
            if($(`#select-all`).is(':checked') == true){
                $('.checkbox-child').prop('checked',true);
                all_customer_ids = [];
            }else if($(`#select-all`).is(':checked') == false){
                $(".checkbox-child").removeAttr("checked");
                $("#select-all").removeAttr("checked");
            }
        }


        function replacePrintButton(){
            if(all_customer_ids.length > 0 && $(`#select-all`).is(':checked') == false){
                $("#print-button-dym").html(`
                    <a href="{{url('offices/preview')}}?office_ids=[${all_customer_ids}]" onclick="previewPrintAll()" class="btn btn-primary col-md-12">
                        <i class="fa fa-print"></i> Print All
                    </a>
                `);
            }else{
                $("#print-button-dym").html(`
                    <a href="{{url('offices/preview')}}?office_ids={{ json_encode($offices_box) }}" onclick="previewPrintAll()" class="btn btn-primary col-md-12">
                        <i class="fa fa-print"></i> Print All
                    </a>
                `);
            }
        }
    </script>
@endsection