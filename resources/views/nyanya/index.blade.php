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
                            <h6 class="m-0 font-weight-bold text-primary">All demands</h6>
                            <a class="btn btn-success" href="{{ url('demands/create') }}" title="add of demand"> <i class="fas fa-plus-circle"></i> </a>
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
                                <table class="table table-bordered small" width="100%" id="demand_table" cellspacing="0">
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
                                        @php $demands_box = [] @endphp
                                        @foreach($demands as $key => $demand)
                                            <tr>
                                                <td>
                                                    {{-- <label for="check-{{ $demand->pid }}">
                                                        <input type="checkbox" class="checkbox-options" name="check-{{ $demand->pid }}" style="width: 15px;height: 15px;">
                                                    </label> --}}

                                                    <div class="checkbox check-info">
                                                        <input type="checkbox" onchange="toggleCheckbox('{{ $demand->pid }}', {{ $demand->id }})" class="checkbox-child" id="select-all-{{ $demand->id }}">
                                                        <label for="select-all-{{ $demand->id }}" class="text-white"></label>
                                                    </div>
                                                </td>
                                                <td>{{ $demand->pid }}</td>
                                                <td>{{ $demand->total_print }}</td>
                                                <td>{{ $demand->occupant }}</td>
                                                <td>{{ $demand->prop_addr }}</td>
                                                <td>{{ $demand->street_name }}</td>
                                                <td>{{ $demand->asset_no }}</td>
                                                <td>{{ $demand->cadastral_zone }}</td>
                                                <td>{{ $demand->prop_type }}</td>
                                                <td>{{ $demand->prop_use }}</td>
                                                <td>{{ $demand->rating_dist }}</td>
                                                <td>{{ $demand->annual_value }}</td>
                                                <td>{{ $demand->rate_payable }}</td>
                                                <td>{{ $demand->arrears }}</td>
                                                <td>{{ $demand->penalty }}</td>
                                                <td>{{ $demand->paid_amount }}</td>
                                                <td>{{ $demand->grand_total }}</td>
                                                <td>{{ $demand->category }}</td>
                                                <td>{{ $demand->group }}</td>
                                                <td>{{ $demand->active }}</td>
                                                

                                                <td>
                                                    <a href="{{url('nyanya/demands/view')}}?pid={{ $demand->pid }}" class="">
                                                        <i class="fa fa-print"></i> Print
                                                    </a>
                                                    <!-- <a href="{{ url('demands/edit/'.$demand->id) }}" class=""><i class="fa fa-edit"></i> Edit </a> -->
                                                </td>
                                                
                                            </tr>

                                            @php array_push($demands_box, $demand->id) @endphp



                                            @php $total = $total + (int)$demand->grand_total + (int)$demand->paid_amount; @endphp
                                            
                                        @endforeach

                                        

                                    </tbody>
                                </table>

                                <div class="row">
                                    <div class="col-md-12 paginate">
                                        {!! $demands->withQueryString()->links() !!}
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 paginate" id="print-button-dym">
                                         <a href="{{url('nyanya/demands/preview')}}?office_ids={{ json_encode($demands_box) }}" onclick="previewPrintAll()" class="btn btn-primary col-md-12">
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
                    <a href="{{url('demands/preview')}}?demand_ids=[${all_customer_ids}]" onclick="previewPrintAll()" class="btn btn-primary col-md-12">
                        <i class="fa fa-print"></i> Print All
                    </a>
                `);
            }else{
                $("#print-button-dym").html(`
                    <a href="{{url('demands/preview')}}?demand_ids={{ json_encode($demands_box) }}" onclick="previewPrintAll()" class="btn btn-primary col-md-12">
                        <i class="fa fa-print"></i> Print All
                    </a>
                `);
            }
        }
    </script>
@endsection