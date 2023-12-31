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
                                <div class="row">
                                   <div class="col-md-2">
                                       <img src="{{asset('/img/logo.jpeg')}}" width="160px" >
                                   </div>
                                    <div class="col-md-8">
                                       <h1 style="font-family: tahoma; color: green;font-size:40px; font-weight: bold; text-align: center;">ABUJA MUNICIPAL AREA COUNCIL</h1>
                                       <h2 style="font-family: tahoma; color:red;font-size:30px; text-align: center; font-weight:bold;">TENEMENT RATE & VALUATION OFFICE</h2>
                                       <h3 style="font-family: tahoma; color:black;font-size:18px; text-align: center; font-weight:bold;">Secretariat: No 1 Olusegun Obasanjo Way, Area 10 Garki - Abuja</h3>
                                        <h4 style="font-family: tahoma; color:black;font-size:18px; text-align:center; 60px; font-weight:bold;">Annex Office: Suite 301, 3rd Floor Kano House, Ralph Shodeinde Street, </h4>
                                        <h5 style="font-family: tahoma; color:black;font-size:18px; text-align: center; font-weight:bold;">Central Business District,Abuja.FCT </h5>
                                        <h6 style="font-family: tahoma; color:black;font-size:18px; text-align: center; font-weight:bold;">Tel:+2349085191698,+2348064677456,+2348096773456  </h6>
                                   </div>
                                    <div class="col-md-2">
                                       <img src="{{asset('/img/Coat.svg.png')}}" width="160px" >
                                   </div>
                                    <div class="col-md-12">
                                        <br>
                                        <div style="text-align: center; color:green; font-family: tahoma;">
                                             <h1>Payment Reciept</h1>
                                        </div>
                                        <table>
                            <tr>
                                    <td style="color:black;font-family: sans-serif;"><b>PID :</b></td>
                                    <td style="color:blue"><b>{{ $receipt->pid }}</b></td>
                                </tr>
                                <tr>
                                    <td style="color: black; font-family: sans-serif;"><b>Ref Code :</b></td>
                                    <td style="color: blue"><b>{{ $receipt->ref_code }}</b></td>
                                </tr>
                                <tr>
                                    <td style="color:black; font-family: sans-serif;"><b>Assesment No :</b></td>
                                    <td style="color:blue;"><b>{{ $receipt->asset_no }}</b></td>
                                </tr>
                                <tr>
                                    <td style="color:black; font-family: sans-serif;"><b>Property Address :</b></td>
                                    <td style="color:blue;"><b>{{ $receipt->prop_addr }}</b></td>
                                </tr>
                                <tr>
                                    <td style="color:black; font-family: sans-serif;"><b>Occupant :</b></td>
                                    <td style="color:blue;"><b>{{ $receipt->occupant }}</b></td>
                                </tr>
                                <tr>
                                    <td style="color:black;font-family: sans-serif;"><b>Use of Property :</b></td>
                                    <td style="color:blue;"><b>{{ $receipt->prop_type }}</b></td>
                                </tr>
                                <tr>
                                    <td style="color:black;font-family: sans-serif;"><b>Rating District :</b></td>
                                    <td style="color:blue"><b>{{ $receipt->rating_dist }}</b></td>
                                </tr>
                                <tr>
                                    <td style="color:green;font-family: sans-serif;"><b>Paid Amount :</b></td>
                                    <td style="color:blue"><b>{{ $receipt->paid_amount }}</b></td>
                                </tr>
                                <tr>
                                    <td style="color:red;font-family: sans-serif;"><b>ARREARS :</b></td>
                                    <td style="color:blue"><b>{{ $receipt->arrears }}</b></td>
                                </tr>
                                <tr>
                                    <td style="color:red;font-family: sans-serif;"><b>Balance :</b></td>
                                    <td style="color:blue"><b>{{ $receipt->balance }}</b></td>
                                </tr>
                                <tr>
                                    <td style="color:black;font-family: sans-serif;"><b>Paid Date/Time :</b></td>
                                    <td style="color:blue"><b>{{ $receipt->created_at }}</b></td>
                                </tr>
                            </table>


                            <div class="row" style="margin-top:60PX;">
                                <div class="col-md-6" style="color:black;font-family: sans-serif; font-weight: bold;">
                                  <p>
                                      -------------------------------------- <br>
                                      AUTHORISED SIGNATORY
                                  </p>   
                                </div>
                                <div class="col-md-6" style="color:black;font-family: sans-serif; font-weight: bold;">
                                    <p>
                                       ------------------------------- <br>
                                       OCCUPIER SIGNED</p>
                                </div>
                                
                            </div>
                                        <div class="row-border" style="color:#000 !important; border: 1px solid #000 !important;">
                                            
                                        <p style="color:green; font-family: tahoma; font-size: 20px; font-weight: bold; text-align: center;">DATE OF PAYMENT {{ $receipt->created_at }}</p>
                                            
                                        </div>
                                    </div>
                                </div>
                                
                                
                                
                                    
                                </div>
                                

                                
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
                    classNameToAdd : 'row-border'
                }
            });

        }
        
    </script>
@endsection