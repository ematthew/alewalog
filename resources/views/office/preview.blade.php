   @extends('layouts.app')

@section('title')
    Home
@endsection

@section('contents')
    <style type="text/css">
        .row-border {
            width: 100%;
            min-height: 20px;
            border: solid 1px #000000;
            margin-bottom: 10px;
        }
        .row-border-mini {
            width: 100%;
            min-height: 100px;
            border: solid 1px #000000;
            margin-bottom: 10px;
        }
        .row-bill-title {
            border: solid 1px #000000;
            text-align: center;
            width: 50px;
        }
        .thr {
            text-align: right;
            direction: rtl;
        }
        .thl {
            text-align: left;
            direction: ltr;
        }
        .p{
            text.background-color: black;
        }

        .table td, .table th {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #1b1c1d !important;
        }
        .watermarked {
        position: relative;
       }

      .watermarked:after {
       content: "";
       display: block;
       width: 100%;
       height: 100%;
       position: absolute;
       top: 0px;
       left: 0px;
       background-image: url({{ asset('img/logo.jpeg') }});
       background-size: 100px 100px;
       background-position: 30px 30px;
       background-repeat: no-repeat;
       opacity: 0.7;
     }

        @media print {
            .print-wrapper {
                background-color: white;
                height: 100%;
                width: 100%;
                position: fixed;
                top: 0;
                left: 0;
                margin: 0;
                padding: 15px;
                font-size: 14px;
                line-height: 18px;
            }

            .watermarkedd {
              display: block;
              width: 100%;
              height: 100%;
              position: absolute;
              top: 500px;
              left: 25%;
              background-image: url({{ url('img/watermark.jpeg') }});
              background-size: 500px 500px;
              background-position: 30px 30px;
              background-repeat: no-repeat;
              opacity: 0.2;
            }

            table {
                border: 1px solid #000;
            }

            .row-border {
                width: 100%;
                min-height: 20px;
                border: solid 1px #000000;
                margin-bottom: 10px;
            }

            .row-border-mini {
                width: 100%;
                min-height: 100px;
                border: solid 1px #000000;
                margin-bottom: 10px;
            }

            .row-bill-title {
                border: solid 1px #000000;
                text-align: center;
                width: 50px;
            }

            .table td, .table th {
                padding: 0.75rem;
                vertical-align: top;
                border-top: 1px solid #1b1c1d !important;
            }
        }

        /*.watermarked {
          position: absolute;
        }*/

        .watermarkedd {
          display: block;
          width: 100%;
          height: 100%;
          position: absolute;
          top: 500px;
          left: 25%;
          background-image: url({{ url('img/watermark.jpeg') }});
          background-size: 500px 500px;
          background-position: 30px 30px;
          background-repeat: no-repeat;
          opacity: 0.2;
        }

        * {
            -webkit-print-color-adjust: exact !important;   /* Chrome, Safari, Edge */
            color-adjust: exact !important;                 /*Firefox*/
        }
    </style>

    <!-- Main Content -->
    <div id="content">

        @include('components.navigation')

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">

                        </div>
                        <div class="card-body">
                            <div class="print-wrapper">
                            @foreach($offices as $key => $office)


                                    <div class="row">
                                        <div class="col-md-10 offset-1">
                                            <img src="{{asset('/img/demandnotice.jpeg')}}" width="920px" >
                                        </div>
                                        <div class="col-md-12">
                                            <br />
                                            <div class="row-border" style="color:#000 !important; border: 1px solid #000 !important;">
                                            <div style="margin-left:100px;margin-right:100px;margin-top: 10px; color:#000 !important;">
                                                <table class="table table-bordered" style="color:#000 !important;">
                                                    <tr>
                                                        <th class="thr"style="font-family: sans-serif; font-size:24;"><strong style="font-family: sans-serif; font-size: 20px; color:red;">Tenement Rate Reminder Notice is hereby given to </strong></th>
                                                        <th class="thl" style="font-family: sans-serif;"><strong>{{ $office->occupant }}/{{ $office->pid }}</strong></th>
                                                    </tr>
                                                </table>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="pl-2">
                                                        <p style="font-family:sans-serif;"><b>In respect to the property below:</b></p>
                                                        <table>
                                                            <tr>
                                                                <td style="color: black; font-family: sans-serif;"><b>Name of Occupier :</b></td>
                                                                <td style="color: blue"><b>{{ $office->occupant }}</b></td>
                                                            </tr>
                                                            <tr>
                                                                <td style="color:black; font-family: sans-serif;"><b>Assesment No :</b></td>
                                                                <td style="color:blue;"><b>{{ $office->asset_no }}</b></td>
                                                            </tr>
                                                            <tr>
                                                                <td style="color:black; font-family: sans-serif;"><b>Property Address :</b></td>
                                                                <td style="color:blue;"><b>{{ $office->prop_addr }}</b></td>
                                                            </tr>
                                                            <tr>
                                                                <td style="color:black; font-family: sans-serif;"><b>Cadastral Zone :</b></td>
                                                                <td style="color:blue;"><b>{{ $office->cadastral_zone }}</b></td>
                                                            </tr>
                                                            <tr>
                                                                <td style="color:black;font-family: sans-serif;"><b>Use of Property :</b></td>
                                                                <td style="color:blue;"><b>{{ $office->prop_type }}</b></td>
                                                            </tr>
                                                            <tr>
                                                                <td style="color:black;font-family: sans-serif;"><b>Rating District :</b></td>
                                                                <td style="color:blue"><b>{{ $office->rating_dist }}</b></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 pr-4">
                                                    <div class="text-center">
                                                        <span>{!! QrCode::size(120)->generate(''.$office->asset_no  .', PID No is:' .$office->pid .', Grand Total: N'.(number_format($office->grand_total, 2)))!!}</span>
                                                        <br>
                                                        <p class="text-danger" style="font-family: sans-serif;font-size:20px;"><b>PID-{{ $office->pid }}<br>{{ date("Y-m-d H:i ") }}</b></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row-border px-4 py-2" style="color:#000 !important; border: 1px solid #000 !important;font-family:sans-serif;font-size:18px; text-align:justify;">

                                          <b>
                                                   <b>{{ $office->occupant }} </b> <br> <b>{{ $office->prop_addr }},</b> <br>
                                                   <br> <b>The Management of Abuja Municipal Area Council; Tenement Rate &  Valuation Department wishes to remind you on the pending demand on Tenement Rate & Valuation levy/fees due to Abuja municipal Area Council.</b> <br>
                                                   <b>This is inspite of having allowed you ample of time to pay the fees/levy of the sum</b> <span ><strong class="text-danger"><b><span>&#8358;</span>{{ number_format($office->grand_total, 2) }}, <br></b></strong></b></span> <br> <b style="color:#000; font-family:sans-serif;font-size:18px; text-align:justify;">

                                                    You are therefore required to settle the bill/levy within One Week from the date of this notice, otherwise Abuja Municipal Area council, Tenement Rate & Valuation Authority may have no choice other than to enforce full payment of the bill/levy in accordance with the provision of section 7 (4th schedule) of the 1999 constitutions of the Federal Republic of Nigeria, Federal Capital Territory Act cap  503, LFN 2004 (Vol.3) as amended:  Taxes and levies (approved list of collection) Act 2015 (as amended) and AMAC Tenement Rent bye-laws of 2012.

                                                    </b> <br>

                                                    <b> <br>
                                                        <span class="text-danger">NOTE:</span> we forwarded your bill for the year 2022, totaling <span ><strong class="text-danger"><b><span>&#8358;</span>{{ number_format($office->grand_total, 2) }}</b></strong> in respect of the landed property(ies) you are occupying in Abuja Municipal Area Council as per detail above.  </b></span>


                                                    {{-- </b>
                                                    In accordance with the provision of section 7 (4th Schedule ) of the 1999 constitution of the Federal Republic Of Nigeria ; Federal Capital Territory Act Cap 503, LFN 2004 (vol.3) as amended: Taxes and Levies ( Approved list of Collection ) Act 2015 (as amended) and AMAC Tenement Rate bye-laws of 2014. We forwarded herewith your bill for the year 2022, totaling  <span ><strong class="text-danger"><b><span>&#8358;</span>{{ number_format($office->grand_total, 2) }}</b></strong></b></span> <b>in respect of the landed property (ies) you are occupying in Abuja Municipal Area Council as per details above.</b> --}}


                                            </b>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row-border px-4 py-2" style="color:#000 !important; border: 1px solid #000 !important;font-family:sans-serif;font-size:18px;">
                                            <div class="row">
                                                <div class="col-md-10">
                                                        <p class="" style="font-family:sans-serif;font-size: 18px;">
                                                        <b>Payment Options:</b> <br >
                                                        <b>1. AMAC Bank Draft</b> <br />
                                                       <b>2. Internet Banking Transfer:<span class="text-danger" style="font-family: sans-serif;"> <strong><b>Abuja Municipal Area Council, FCMB Account. No. 8672253011</b></strong></span> </b> <br />
                                                       <b>3. Pay by Scanning QRCode on the right hand</b>
                                                          <b> (Locate QR Payment on your mobile Banking App, (Choose NIBSS) and Scan QRCode to Pay) </b> <br>
                                                       <b>4.</b> <strong class="text-danger"style="font-family: sans-serif;">To avoid doubts, write your PID as Payment Reference for bank branch and Transfers.</strong> <br>
                                                        <b>Payment(s) made to location(s) other than as prescribed here shall be treated as invalid.</b>
                                                </div>

                                                        <div class="col-md-2">
                                                            <div class="text-center">

                                                            <p><img src="{{asset('/img/QR.jpeg')}}" width="150px" ></p>
                                                        </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </p>
                        </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row-border px-4 py-2" style="color:#000 !important;border: 1px solid #000 !important;">
                                            <strong class="text-danger" style="font-family: sans-serif;" ><b>NOTE</b></strong> <b style="font-family: sans-serif;style="font>:Ensure you collect Electronic and Treasury receipt(s) at the Annex Office Suite 306, 3rd Floor Kano House. Ralph Shodeinde Street, Central Business District, Abuja.</b>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                   <div class="col-6" style="color:#000 !important;">
                                        <div class="">
                                          <strong style="font-family: sans-serif;"> Your early compliance will be highly appreciated</strong>
                                        </div>
                                        <div class="">
                                            <div class="row" style="">

                                               <div class="col-md-6" style="color:#000 !important;">
                                                    <p><img src="{{asset('/img/do.png')}}" width="168px" {{-- height="200px;" --}}></p>

                                                    <b style="font-family: sans-serif;">
                                                        DIRECTOR OF OPERATIONS
                                                    </b>

                                               </div>
                                               <div class="col-md-6" style="color:#000 !important;margin-bottom:5px;">
                                                    <p><img src="{{asset('/img/htr-min.png')}}" width="168px" height="260px"></p>

                                                    <b style="font-family: sans-serif;">
                                                    HEAD OF ENFORCEMENT<br />
                                                    AND REVENUE RECOVERY
                                                   </b>
                                               </div>
                                            </div>
                                        </div>
                                    </div>

                                        <div class="col-md-6" style="margin-top:50;">
                                            <div class="row-border px-4 py-2" style="border: 1px solid #000 !important;">
                                                <div class="text-center" style="color:#000 !important;"><p><strong>ACKNOWLEDGEMENT</strong></p></div>
                                                <table style="color:#000 !important;">
                                                    <tr>
                                                        <td><b>Name:</b></td>
                                                        <td><b>-------------------------------------------------</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b style="font-family: sans-serif;">Date:</b></td>
                                                        <td><b>-------------------------------------------------</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b style="font-family: sans-serif;">Signature:</b></td>
                                                        <td><b>-------------------------------------------------</b></td>
                                                    </tr>
                                                </table>
                                                <br />
                                            </div>
                                            <div class="row-border px-4 py-2" style="border: 1px solid #000 !important;">
                                            <div class="text-center" style="color:#000 !important;"><p><strong>FOR OFFICIAL USE ONLY</strong></p></div>
                                            <table style="color:#000 !important;">
                                                  <tr>
                                                    <td><b>Date of Dispatch:</b></td>
                                                    <td><b>-------------------------------------------------</b></td>
                                                </tr>
                                                <tr>
                                                    <td><b>Name Of Officer:</b></td>

                                                    <td><b>-------------------------------------------------</b></td>

                                                </tr>
                                                <tr>
                                                    <td><b>Mode of Dispatch</b></td>
                                                    <td><b>-------------------------------------------------</b></td>
                                            </table>
                                            <br />
                                        </div>
                                        </div>
                                    </div>

                            @endforeach
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-outline-primary btn-sm col-md-12" onclick="printDiv()">
                                        <i class="fa fa-print"></i> Print or <i class="fa fa-file-pdf"></i> Download PDF
                                    </button>
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

@section('scripts')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/jquery-ui.min.js"></script>
    <script src="{{asset('js/print.min.js')}}"></script>
    <script type="text/javascript">
        function printDiv() {
            $(".print-wrapper").printElement({
                leaveOpen:true,
                printMode:'popup',
                printBodyOptions:{
                    styleToAdd:'1px solid #000 !important;',
                    classNameToAdd : 'row-border',
                    classNameToAdd : 'row-border'

                }
            });

            savePrintIds();
        }

        function savePrintIds() {
                var _token = '{{ csrf_token() }}';
                var office_ids = {{ $offices->pluck('id') }};
                var query = {_token, office_ids}

                fetch(`{{url('save/print/ids')}}`, {
                    method: "POST",
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(query)
                }).then(r => {
                    return r.json();
                }).then(results => {
                    console.log(results);
                }).catch(err => {
                    console.log(err);
                });
            }
    </script>
@endsection
