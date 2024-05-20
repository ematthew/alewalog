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
                                       <img src="{{asset('/img/logo.jpeg')}}" width="140px" >
                                   </div>
                                    <div class="col-md-8">
                                       <h1 style="font-family: tahoma; color: green;font-size:35px; font-weight: bold; text-align: center;">ABUJA MUNICIPAL AREA COUNCIL</h1>
                                       <h2 style="font-family: tahoma; color:red;font-size:28px; text-align: center; font-weight:bold;">TENEMENT RATE & VALUATION OFFICE</h2>
                                       <h3 style="font-family: tahoma; color:black;font-size:18px; text-align: center; font-weight:bold;">Secretariat: No 1 Olusegun Obasanjo Way, Area 10 Garki - Abuja</h3>
                                       <h4 style="font-family: tahoma; color:black;font-size:16px; text-align:center; 60px; font-weight:bold;">Annex Office: Suite 411, 4th Floor MKK, Plaza Gudu, </h4>
                                        <h5 style="font-family: tahoma; color:black;font-size:16px; text-align: center; font-weight:bold;">Gudu District,Abuja.FCT </h5>
                                        <h6 style="font-family: tahoma; color:red;font-size:20px; text-align: center; font-weight:bold;">Tel:+2348037809941,+2348057912241,  </h6>
                                   </div>
                                    <div class="col-md-2">
                                       <img src="{{asset('/img/Coat.svg.png')}}" width="140px" >
                                   </div>
                                    <div class="col-md-12">
                                        <br />
                                        <div class="row-border" style="color:#000 !important; border: 1px solid #000 !important;">
                                            <div style="margin-left:100px;margin-right:100px;margin-top: 10px; color:#000 !important;">
                                                <table class="table table-bordered" style="color:#000 !important;">
                                                    <tr>
                                                        <th class="thr"style="font-family: tahoma; font-size:15;"><strong style="font-family: tahoma; font-size: 17px; color:red;">Tenement Rate Reminder Notice is hereby given to </strong></th>
                                                        <th class="thl" style="font-family: tahoma; font-size:17px"><strong>{{ $office->occupant }}/{{ $office->pid }}</strong></th>
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
                                                        <p class="text-danger" style="font-family: tahoma; font-size:18px;"><b>PID-{{ $office->pid }}<br> {{ date("Y-m-d H:i ") }} <!-- 2022-07-05 10:09 --></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row-border px-4 py-2" style="color:#000 !important; border: 1px solid #000 !important;font-family:tahoma;font-size:15px; text-align:justify;">

                                          <b>
                                                   <b>{{ $office->occupant }}, </b> <b>{{ $office->prop_addr }},<br></b> 
                                                   <br> <b>The Management of Abuja Municipal Area Council; Tenement Rate &  Valuation Department wishes to remind you on the pending demand on Tenement Rate & Valuation levy/fees due to Abuja municipal Area Council.</b> <br>
                                                   <b>This is inspite of having allowed you ample of time to pay the fees/levy of the sum</b> <span ><strong class="text-danger"><b><span>&#8358;</span>{{ number_format($office->grand_total, 2) }}, <br></b></strong></b></span> <br> <b style="color:#000; font-family:tahoma;font-size:15px; text-align:justify;">

                                                    You are therefore required to settle the bill/levy within One Week from the date of this notice, otherwise Abuja Municipal Area council, Tenement Rate & Valuation Authority may have no choice order than to enforce full payment of the bill/levy in accordance with the provision of section 7 (4th schedule) of the 1999 constitutions of the Federal Republic of Nigeria, Federal Capital Territory Act cap  503, LFN 2004 (Vol.3) as amended:  Taxes and levies (approved list of collection) Act 2015 (as amended) and AMAC Tenement Rent bye-laws of 2012.

                                                    </b> <br>

                                                    <b> 
                                                        <span class="text-danger">NOTE:</span> we forwarded your bill for the year {{ date("Y") }}, totaling <span ><strong class="text-danger"><b><span>&#8358;</span>{{ number_format($office->grand_total, 2) }}</b></strong> in respect of the landed property(ies) you are occupying in Abuja Municipal Area Council as per detail above.  </b></span>


                                                    {{-- </b>
                                                    In accordance with the provision of section 7 (4th Schedule ) of the 1999 constitution of the Federal Republic Of Nigeria ; Federal Capital Territory Act Cap 503, LFN 2004 (vol.3) as amended: Taxes and Levies ( Approved list of Collection ) Act 2015 (as amended) and AMAC Tenement Rate bye-laws of 2014. We forwarded herewith your bill for the year 2022, totaling  <span ><strong class="text-danger"><b><span>&#8358;</span>{{ number_format($office->grand_total, 2) }}</b></strong></b></span> <b>in respect of the landed property (ies) you are occupying in Abuja Municipal Area Council as per details above.</b> --}}


                                            </b>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row-border px-4 py-2" style="color:#000 !important; border: 1px solid #000 !important;font-family:tahoma;font-size:18px;">
                                            <div class="row">
                                                <div class="col-md-10">
                                                        <p class="" style="font-family:tahoma;font-size: 18px;">
                                                        <b>Payment Options:</b> <br >
                                                        <b>1. AMAC Bank Draft</b> <br />
                                                       <b>2. Internet Banking Transfer:<span class="text-danger" style="font-family: tahoma;"> <strong><b>Abuja Municipal Area Council, FCMB Account. No. 8672253011</b></strong></span> </b> <br />
                                                       <b>3. Pay by Scanning QRCode on the right hand</b>
                                                          <b> (Locate QR Payment on your mobile Banking App, (Choose NIBSS) and Scan QRCode to Pay) </b> <br>
                                                       <b>4.</b> <strong class="text-danger"style="font-family: tahoma;">To avoid doubts, write your PID as Payment Reference for bank branch and Transfers.</strong> <br>
                                                        <b>Payment(s) made to location(s) other than as prescribed here shall be treated as invalid.</b>
                                                </div>

                                                        <div class="col-md-2">
                                                            <div class="text-center">

                                                            <p><img src="{{asset('/img/QR.jpeg')}}" width="120px" ></p>
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
                                            <strong class="text-danger" style="font-family: sans-serif;" ><b>NOTE</b></strong> <b style="font-family: tahoma; font-size:20px;">:Ensure you collect Electronic and Treasury receipt(s) at the Annex Office Suite 306, 3rd Floor Kano House. Ralph Shodeinde Street, Central Business District, Abuja.</b>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6" style="color:#000 !important;">
                                        <div class="">
                                          <strong style="font-family: tahoma; font-size:22px;"> Your early compliance will be highly appreciated</strong>
                                        </div>
                                        <div class="">
                                            <div class="row" style="">

                                               <div class="col-md-6" style="color:#000 !important;">
                                                    <p><img src="{{asset('/img/do.png')}}" width="120px"></p>

                                                    <b style="font-family: tahoma; font-size:15px;">
                                                        DIRECTOR OF OPERATIONS
                                                    </b>

                                               </div>
                                               <div class="col-md-6" style="color:#000 !important;margin-bottom:5px;">
                                                    <p><img src="{{asset('/img/htr-min.png')}}" width="120px" height="180px"></p>

                                                    <b style="font-family: tahoma; font-size; font-size:15px">
                                                    HEAD OF ENFORCEMENT<br />
                                                    AND REVENUE RECOVERY
                                                   </b>
                                               </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6" style="margin-top:10;">
                                        <div class="row-border px-4 py-2" style="border: 1px solid #000 !important;">
                                            <div class="text-center" style="color:#000 !important;"><p><strong style="font-family: tahoma;">ACKNOWLEDGEMENT</strong></p></div>
                                            <table style="color:#000 !important;">
                                                  <tr>
                                                    <td><b style="font-family: tahoma; font-size:15px;">Name:</b></td>
                                                    <td><b>---------------------------------------------</b></td>
                                                </tr>
                                                <tr>
                                                    <td><b style="font-family: tahoma; font-size:15px;">Date:</b></td>
                                                    <td><b>---------------------------------------------</b></td>

                                                </tr>
                                                <tr>
                                                    <td><b style="font-family:tahoma; font-size:15px;">Signature:</b></td>
                                                    <td><b>---------------------------------------------</b></td>

                                                </tr>
                                                  <tr>
                                                    <td><b style="font-family:tahoma; font-size:15px;">Phone Number:</b></td>
                                                    <td><b>--------------------------------------------------</b></td>

                                                </tr>
                                            </table>
                                            <br />
                                        </div>
                                        <div class="row-border px-4 py-2" style="border: 1px solid #000 !important;">
                                            <div class="text-center" style="color:#000 !important;"><p><strong style="font-family: tahoma; font-size:15px;">FOR OFFICIAL USE ONLY</strong></p></div>
                                            <table style="color:#000 !important;">
                                                  <tr>
                                                    <td><b style="font-family: tahoma; font-size: 15px;">Date of Dispatch:</b></td>
                                                    <td><b>---------------------------------------------</b></td>
                                                </tr>
                                                <tr>
                                                    <td><b style="font-family: tahoma; font-size: 15px;">Name Of Officer:</b></td>

                                                    <td><b>---------------------------------------------</b></td>

                                                </tr>
                                                <tr>
                                                    <td><b style="font-family: tahoma; font-size: 15px;">Mode of Dispatch</b></td>
                                                    <td><b>---------------------------------------------</b></td>

                                                </tr>
                                            </table>
                                            <br />
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
        <!-- /.container-fluid
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
