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
                                                            <th class="thr"><strong>Demand Notice is hereby given to </strong></th>
                                                            <th class="thl"><strong>{{ $office->occupant }}/{{ $office->pid }}</strong></th>
                                                        </tr>
                                                    </table>
                                                </div>
                                            
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="pl-2">
                                                            <p><b>In respect to the property below:</b></p>
                                                            <table>
                                                                <tr>
                                                                    <td style="color: black; font-family:sans-serif"><b>Name of Occupier :</b></td>
                                                                    <td style="color: blue; font-family:sans-serif"><b>{{ $office->occupant }}</b></td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="color:black; font-family:sans-serif"><b>Assesment No :</b></td>
                                                                    <td style="color:blue; font-family:sans-serif"><b>{{ $office->asset_no }}</b></td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="color:black; font-family:sans-serif"><b>Property Address :</b></td>
                                                                    <td style="color:blue; font-family:sans-serif"><b>{{ $office->prop_addr }}</b></td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="color:black; font-family:sans-serif"><b>Cadastral Zone :</b></td>
                                                                    <td style="color:blue; font-family:sans-serif"><b>{{ $office->cadastral_zone }}</b></td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="color:black; font-family:sans-serif"><b>Use of Property :</b></td>
                                                                    <td style="color:blue; font-family:sans-serif"><b>{{ $office->prop_type }}</b></td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="color:black; font-family:sans-serif"><b>Rating District :</b></td>
                                                                    <td style="color:blue; font-family:sans-serif"><b>{{ $office->rating_dist }}</b></td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 pr-4">
                                                        <div class="text-center">
                                                        <span>{!! QrCode::size(120)->generate(''.$office->asset_no  .', PID No is:' .$office->pid .', Grand Total: N'.(number_format($office->grand_total, 2)))!!}</span> 
                                                        <br>
                                                        <p class="text-danger" style="font-family: sans-serif;font-size:20px;"><b>PID-{{ $office->pid }}<br> {{ date("Y-m-d H:i ") }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                
                                    <div class="row">
                                        <div class="col-md-4 offset-2" style="margin-top:60px;">
                                            <div class="row-border" style="color:#000 !important;border: 1px solid #000 !important;">
                                                <table class="table" style="color:#000 !important;">
                                                    <tr style="border-bottom-style: 1px solid #000 !important;">
                                                    <td style="font-family:sans-serif"><b>Bill Ref : </b> </td>
                                                    <td style="color:blue;" style="font-family:sans-serif"><b>{{ date("Y /")  .$office->pid }}</b></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-family:sans-serif"><b>Agency Code:</b>  </td>
                                                    <td style="color:blue;"style="font-family:sans-serif"><b>2000300</b></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-family:sans-serif"><b>Revenue Code :</b></td>
                                                    <td style="color:blue;"style="font-family:sans-serif"><b>1002</b></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-family:sans-serif"><b> Rate Year: {{ date("Y") }}</b></td>
                                                    <td style="color:blue;"style="font-family:sans-serif"><b>{{ date("Y ") }}</b></td>
                                                </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <p style="text-align: center; color: black;" ><b>BILL INFORMATION</b></p>
                                            <div class="row-border" style="color:#000 !important;border: 1px solid #000 !important;">
                                                {{-- <div class="py-2 text-center mx-4">
                                                    
                                                </div> --}}
                                                <table class="table" style="color:#000 !important;">
                                                    <tr style="border-bottom-style: 1px solid #000 !important;">
                                                        <td><b>Annual Value:</b> </td>
                                                        <td style="color:blue;"><span>&#8358;</span><b>{{ number_format($office->annual_value, 2) }}</b></td>
                                                    </tr>
                                                    <tr style="border-bottom-style: 1px solid #000 !important;">
                                                        <td><b>Rate Payable</b> </td>
                                                        <td style="color:blue;"><span>&#8358;</span><b>{{ number_format($office->rate_payable, 2) }}</b></td>
                                                    </tr>
                                                    <tr style="border-bottom-style: 1px solid #000 !important;">
                                                        <td><b>Arrears Year:</b> </td>
                                                        <td style="color:blue;"><span>&#8358;</span><b>{{ number_format($office->arrears, 2) }}</b></td>
                                                    </tr style="border-bottom-style: 1px solid #000 !important;">
                                                    <tr/>
                                                        <td><b>Penalty (10%):</b> </td>
                                                        <td style="color:blue;"><span>&#8358;</span><b>{{ number_format($office->penalty, 2) }}</b></td>
                                                    </tr>
                                                    <tr style="border-bottom-style: 1px solid #000 !important;">
                                                        <td style="background-color:yellow;"><strong>GRAND TOTAL:</strong> </td>
                                                        <td style="background-color:yellow; color: blue;"><span>&#8358;</span><b>{{ number_format($office->grand_total, 2) }}</b></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row-border px-4 py-2" style="color:#000 !important; border: 1px solid #000 !important; font-size:18px;justify-content: 10px;text-align: justify;">
                                               <b>
                                                    In accordance with the provision of section 7 (4th Schedule ) of the 1999 constitution of the Federal Republic Of Nigeria ; Federal Capital Territory Act Cap 503, LFN 2004 (vol.3) as amended: Taxes and Levies ( Approved list of Collection ) Act 2015 (as amended) and AMAC Tenement Rate bye-laws of 2014. We forwarded herewith your bill for the year 2022, totaling  <span class="text-danger" style="font-family: sans-serif;"><strong><b><span>&#8358;</span>{{ number_format($office->grand_total, 2) }}</b></strong></b></span> <b>in respect of the landed property (ies) you are occupying in Abuja Municipal Area Council as per details above. Rating District</b>
    

                                            </b>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row-border px-4 py-2" style="color:#000 !important;border: 1px solid #000 !important;">
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
                                                                   
                                                            <p><img src="{{asset('/img/QR.jpeg')}}" width="160px" ></p>  
                                                            </div>
                                                        </div> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row-border px-4 py-2" style="color:#000 !important;border: 1px solid #000 !important;">
                                                <strong class="text-danger"> NOTE</strong>: <b>Ensure you collect Electronic and Treasury receipt(s) at the Annex Office Suite 306, 3rd Floor Kano House. Ralph Shodeinde Street, Central Business District, Abuja.</b>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6" style="color:#000 !important;">
                                            <div class="">
                                              <strong> Your early compliance will be highly appreciated</strong>
                                            </div>
                                            <div class="">
                                                <div class="row" style="margin-top:50px;">
                                                   <div class="col-md-6" style="color:#000 !important;">
                                                    <br>
                                                        <p><img src="/img/htr.png"></p> <br />
                                                        <b>HEAD OF TENEMENT RATE <br />
                                                       For Honourable Chairman <br />
                                                       Abuja Municipal Area Council</b>
                                                   </div>
                                                   <div class="col-md-6" style="color:#000 !important;">

                                                        <p><img src="{{asset('/img/doo.jpeg')}}" width="210px"></p> 
                                                        <br />
                                                        
                                                        <b>DIRECTOR OF OPERATIONS <br />
                                                        For Honourable Chairman <br />
                                                        Abuja Municipal Area Council</b>

                                                   </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="margin-top:80;">
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
