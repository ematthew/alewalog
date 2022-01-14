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
                                    <div class="col-md-12">
                                        <img src="{{asset('/img/Demandnotice.png')}}" width="920px">
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
                                                                <td><b>Name of Occupier :</b></td>
                                                                <td><b>{{ $office->occupant }}</b></td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Assesment No :</b></td>
                                                                <td><b>{{ $office->asset_no }}</b></td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Property Address :</b></td>
                                                                <td><b>{{ $office->prop_addr }}</b></td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Cadastral Zone :</b></td>
                                                                <td><b>{{ $office->cadastral_zone }}</b></td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Use of Property :</b></td>
                                                                <td><b>{{ $office->prop_type }}</b></td>
                                                            </tr>
                                                            <tr>
                                                                <td><b>Rating District :</b></td>
                                                                <td><b>{{ $office->rating_dist }}</b></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 pr-4">
                                                    <div class="">
                                                        <span>{!! QrCode::size(120)->generate('the occupier')!!}</span> 
                                                        <br> <br>
                                                        <p>{{ $office->occupant }}/{{ $office->pid }}</p>
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
                                                <tr>
                                                    <td>Bill Ref : <b>{{ date("Y /")  .$office->pid }}</b> </td>
                                                </tr>
                                                    <td>Agency Code:  </td>
                                                </tr>
                                                    <td>Revenue Code:1002 </td>
                                                </tr>
                                                    <td>Rate Year: <b>{{ date("Y") }}</b></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <p style="text-align: center;"><b>BILL INFORMATION</b></p>
                                        <div class="row-border" style="color:#000 !important;border: 1px solid #000 !important;">
                                            {{-- <div class="py-2 text-center mx-4">
                                                
                                            </div> --}}
                                            <table class="table" style="color:#000 !important;">
                                                <tr style="border-bottom-style: 1px solid #000 !important;">
                                                    <td>Annual Value: </td>
                                                    <td><span>&#8358;</span>{{ number_format($office->annual_value, 2) }}</td>
                                                </tr>
                                                <tr style="border-bottom-style: 1px solid #000 !important;">
                                                    <td>Rate Payable </td>
                                                    <td><span>&#8358;</span>{{ number_format($office->rate_payable, 2) }}</td>
                                                </tr>
                                                <tr style="border-bottom-style: 1px solid #000 !important;">
                                                    <td>Arrears Year: </td>
                                                    <td><span>&#8358;</span>{{ number_format($office->arrears, 2) }}</td>
                                                </tr style="border-bottom-style: 1px solid #000 !important;">
                                                <tr/>
                                                    <td>Penalty (10%): </td>
                                                    <td><span>&#8358;</span>{{ number_format($office->penalty, 2) }}</td>
                                                </tr>
                                                <tr style="border-bottom-style: 1px solid #000 !important;">
                                                    <td style="background-color:#eba134;"><strong>GRAND TOTAL:</strong> </td>
                                                    <td style="background-color:#eba134;"><span>&#8358;</span>{{ number_format($office->grand_total, 2) }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row-border px-4 py-2" style="color:#000 !important; border: 1px solid #000 !important;">
                                            <b>
                                                In accordance with the provision of section 7 (4th Schedule ) of the 1999 constitution of the Federal Republic Of Nigeria ; Federal Capital Territory Act Cap 503, LFN 2004 (vol.3) as amended: Taxes and Levies ( Approved list of Collection ) Act 2015 (as amended) and AMAC Tenement Rate bye-laws of 2014. We forwarded herewith your bill for the year 2022, totaling  <span class="text-danger"><strong><b><span>&#8358;</span>{{ $office->grand_total }}</b></strong></b></span> in respect of the landed property (ies) you are occupying in Abuja Municipal Area Council as per details above. 

                                                Rating District

                                            </b>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row-border px-4 py-2" style="color:#000 !important;border: 1px solid #000 !important;">
                                            <p>
                                                <b>Payment Options:</b> <br >
                                                <b>1. AMAC Bank Draft</b> <br />
                                                <b>2. Internet Banking Transfer:<span class="text-danger"> <strong><b>AMAC-ALEWA, FCMB Account. No. 8672253011</b></strong></span> </b> <br />
                                                Payment(s) made to location(s) other than as prescribed here shall be treated as invalid.


                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row-border px-4 py-2" style="color:#000 !important;border: 1px solid #000 !important;">
                                            <b class="text-danger">NOTE</b>: Ensure you collect Electronic and Treasury receipt(s) at the Annex Office Suite 306, 3rd Floor Kano House. Ralph Shodeinde Street, Central Business District, Abuja.
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6" style="color:#000 !important;">
                                        <div class="">
                                          <strong> Your early compliance will be highly appreciated</strong>
                                        </div>
                                        <div class="">
                                            <div class="row" style="margin-top:100px;">
                                               <div class="col-md-6" style="color:#000 !important;">
                                                <br>
                                                    <p><img src="/img/htr.jpeg"></p> <br />
                                                    <b>HEAD OF TENEMENT RATE <br />
                                                   For Honourable Chairman <br />
                                                   Abuja Municipal Area Council</b>
                                               </div>
                                               <div class="col-md-6" style="color:#000 !important;">

                                                <br>
                                                    <p><img src="{{asset('/img/doo.jpeg')}}" width="168px"></p> 
                                                    <br />
                                                    <b>DIRECTOR OF OPERATIONS <br />
                                                    For Honourable Chairman <br />
                                                    Abuja Municipal Area Council</b>

                                               </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row-border px-4 py-2" style="border: 1px solid #000 !important;">
                                            <div class="text-center" style="color:#000 !important;"><p><strong>ACKNOWLEDGEMENT</strong></p></div>
                                            <table style="color:#000 !important;">
                                                <tr>
                                                    <td>Date of Dispatch:</td>
                                                    <td>-----------------------------------------------------</td>
                                                </tr>
                                                <tr>
                                                    <td>Name of Officer:</td>
                                                    <td>-----------------------------------------------------</td>    
                                                </tr>
                                                <tr>
                                                    <td>Mode of Dispatch:</td>
                                                    <td>-----------------------------------------------------</td>
                                                </tr>
                                            </table>
                                            <br />
                                            <table style="color:#000 !important;">
                                                <tr>
                                                    <td>Date of Dispatch:</td>
                                                    <td>-----------------------------------------------------</td>    
                                                </tr>
                                                <tr>
                                                    <td>Name of Officer:</td>
                                                    <td>-----------------------------------------------------</td>    
                                                </tr>
                                                <tr>
                                                    <td>Mode of Dispatch:</td>
                                                    <td>-----------------------------------------------------</td>                                                    
                                                </tr>
                                            </table>
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
                    classNameToAdd : 'row-border'
                }
            });
        }
    </script>
@endsection 
