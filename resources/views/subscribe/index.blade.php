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
                                                  <input type="checkbox" id="select-all" onchange="toggleAllCheckbox()" checked>
                                                  <label for="select-all" class="text-white">All</label>
                                                </div>
                                            </th>
                                            <th>PID</th>
                                            <th>TOTAL PRINT </th>
                                            <th>RESULT</th>
                                            <th>OCCUPANT</th>
                                            <th>PROP ADDR</th>
                                            <!-- <th>STREET NAME</th> -->
                                            <th>ASSET NO </th>
                                            <!-- <th>CADASTRAL ZONE</th> -->
                                            <th>PROP TYPE  </th>
                                            <th>PROP USE</th>
                                            <th>RATING DIST</th>
                                            <th>ANNUAL VALUE </th>
                                            <th>RATE PAYABLE </th>
                                            <th>ARREARS</th>
                                            <th>PENALTY </th>
                                            <th>GRAND TOTAL</th>
                                            <th>PAID AMOUNT</th>
                                            <!-- <th>CATEGORY</th>
                                            <th>GROUP</th>
                                            <th>ACTIVE   </th> -->
                                            <th>ACTION </th>
                                            <th>DATE </th>



                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $demands_box = [] @endphp
                                        @php $total = 0 @endphp
                                        @foreach($demands as $key => $demand)
                                            <tr>
                                                <td>

                                                    <div class="checkbox check-info">
                                                        <input type="checkbox" onchange="toggleCheckbox({{ $demand->pid }}, {{ $demand->id }})" class="checkbox-child" id="select-all-{{ $demand->pid }}" checked>
                                                        <label for="select-all-{{ $demand->pid }}" class="text-white"></label>
                                                    </div>
                                                </td>
                                                <td>{{ $demand->pid }}</td>
                                                <td>{{ $demand->occupant }}</td>
                                                <td>
                                                    @if($demand->paid_amount <= 0 )

                                                          <a href="" class="text-danger">
                                                               NOT PAID
                                                          </a>


                                                @else

                                                    <a href="" class="text-success">
                                                         PAID

                                                    </a>
                                                @endif

                                                </td>
                                                <td>{{ $demand->occupant }}</td>
                                                <td>{{ $demand->prop_addr }}</td>
                                                <!-- <td>{{ $demand->street_name }}</td> -->
                                                <td>{{ $demand->asset_no }}</td>
                                                <!-- <td>{{ $demand->cadastral_zone }}</td> -->
                                                <td>{{ $demand->prop_type }}</td>
                                                <td>{{ $demand->prop_use }}</td>
                                                <td>{{ $demand->rating_dist }}</td>
                                                <td>{{ $demand->annual_value }}</td>
                                                <td>{{ $demand->rate_payable }}</td>
                                                <td>{{ $demand->arrears }}</td>
                                                <td>{{ $demand->penalty }}</td>
                                                <td>{{ $demand->grand_total }}</td>
                                                <td>{{ $demand->paid_amount }}</td>
                                                <!-- <td>{{ $demand->category }}</td>
                                                <td>{{ $demand->group }}</td>
                                                <td>{{ $demand->active }}</td> -->
                                                <td>
                                                    <!-- <a href="{{ url('payment/show') }}?office_id={{ $demand->pid }}" class=""><i class="fa fa-edit"></i> Pay </a> -->
                                                    <!-- <a href="{{ url('payment/pay/'.$demand->id) }}" class=""><i class="fa fa-edit"></i> Make Payment </a> -->
                                                    <a href="{{ url('receipt/'.$demand->id) }}" class=""><i class="fa fa-edit"></i> Print Receipt </a> <td><I class="fa fa-time" style="color:orangered;">{{ $demand->updated_at  }}</I></td>

                                                </td>

                                            </tr>

                                            @php $total = $total + $demand->grand_total + $demand->paid_amount ; @endphp

                                        @endforeach

                                        

                                    </tbody>
                                </table>

                                <div class="row">
                                <div class="col-md-12 paginate">
                                    {!! $demands->withQueryString()->links() !!}
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
        function toggleCheckbox(sn, customer_ref) {
            if($(`#select-all-${sn}`).is(':checked') == true){
                // console.log('isChecked');
                all_customers_ref.push(customer_ref);
                if(all_customers_ref.length == total_customers_items){
                    $("#select-all").prop("checked", "checked");
                }else{
                   $("#select-all").removeAttr("checked"); // pop check all
                }
            }else if($(`#select-all-${sn}`).is(':checked') !== true){
                $("#select-all").removeAttr("checked"); // pop check all
                for (var i = 0; i < all_customers_ref.length; i++) {
                    if(all_customers_ref[i] == customer_ref){
                        all_customers_ref.splice(i, 1);
                    }
                }
            }
        }

        // $(document).ready(function() {
        //     $("#office_table").DataTable();
        // });

        function toggleAllCheckbox() {
            if($(`#select-all`).is(':checked') == true){
                // console.log('isChecked');
                fetchAllUnclassifiedCustomer()
            }else if($(`#select-all`).is(':checked') !== true){
                $(".checkbox-child").removeAttr("checked");
                $("#select-all").removeAttr("checked");
                all_customers_ref = [];
            }
        }
    </script>
@endsection
