@extends('layouts.app') 

@section('title')
    Home
@endsection

{{-- @section('contents') --}}
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
    </style>
{{-- pid
occupant
prop_addr
street_name
asset_no
cadastral_zone
prop_type
prop_use
rating_dist
annual_value
rate_payable
arrears
penalty
grand_total
category
group
active --}}
    <!-- Main Content -->
    <div id="content">

        @include('components.navigation')

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <div class="row"style="margin-top:229px;">
                <div class="col-12">
                    <div class="card shadow mb-4">
                        {{-- <div class="card-header py-3">
                            <h5 class="m-0 font-weight-bold text-primary">PID: {{ $office->pid }}</h5>
                        </div> --}}
                        <div class="card-body">
                            <div class="print-wrapper">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row-border">
                                            <div style="margin-left:100px;margin-right:100px;margin-top: 10px;">
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <th class="thr">Demand Notice is hereby given to</th>
                                                        <th class="thl">{{ $office->occupant }}/{{ $office->pid }}</th>
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
                                                        <span>{!! QrCode::size(120)->generate('RemoteStack') !!}</span> 
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
                                        <div class="row-border">
                                            <table class="table">
                                                <tr>
                                                    <td>Bill Ref: </td>
                                                </tr>
                                                    <td>Agency Code: </td>
                                                </tr>
                                                    <td>Revenue Code: </td>
                                                </tr>
                                                    <td>Rate Year: </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <p style="text-align: center;"><b>BILL INFORMATION</b></p>
                                        <div class="row-border">
                                            {{-- <div class="py-2 text-center mx-4">
                                                
                                            </div> --}}
                                            <table class="table">
                                                <tr>
                                                    <td>Annual Value: </td>
                                                    <td><span>&#8358;</span>{{ $office->annual_value }}</td>
                                                </tr>
                                                    <td>Rate Payable </td>
                                                    <td><span>&#8358;</span>{{ $office->rate_payable }}</td>
                                                </tr>
                                                    <td>Arrears Year: </td>
                                                    <td><span>&#8358;</span>{{ $office->arrears }}</td>
                                                </tr>
                                                    <td>Penalty (10%): </td>
                                                    <td><span>&#8358;</span>{{ $office->penalty }}</td>
                                                </tr>
                                                </tr>
                                                    <td style="background-color:#eba134;"><strong>GRAND TOTAL:</strong> </td>
                                                    <td style="background-color:#eba134;"><span>&#8358;</span>{{ $office->grand_total }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row-border px-4 py-2">
                                            <b>
                                                In accordance with the provision of section 7 (4th Schedule ) of the 1999 constitution of the Federal Republic Of Nigeria ; Federal Capital Territory Act Cap 503, LFN 2004 (vol.3) as amended: Taxes and Levies ( Approved list of Collection ) Act 2015 (as amended) and AMAC Tenement Rate bye-laws of 2014. We forwarded herewith your bill for the year 2022, totaling  <span class="text-danger">MERGEFIELD grand_total \# ₦#,##0.00₦ XXX,XXX,XXX.XX</span> in respect of the landed property (ies) you are occupying in Abuja Municipal Area Council as per details above. 

                                                Rating District

                                            </b>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row-border px-4 py-2">
                                            <p>
                                                <b>Payment Options:</b> <br >
                                                <b>1. AMAC Bank Draft</b> <br />
                                                <b>2. internet Banking Transfer</b> <br />
                                                Payment(s) made to location(s) other than as prescribed here shall be treated as invalid.


                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row-border px-4 py-2">
                                            <b class="text-danger">NOTE</b>: Ensure you collect Electronic and Treasury receipt(s) at the Annex Office Suite 306, 3rd Floor Kano House. Ralph Shodeinde Street, Central Business District, Abuja.
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="">
                                          <strong> Your early compliance will be highly appreciated</strong>
                                        </div>
                                        <div class="">
                                            <div class="row" style="margin-top:100px;">
                                               <div class="col-sm-6">
                                                <br>
                                                   <b>HEAD OF TENEMENT RATE <br />
                                                   For Honourable Chairman <br />
                                                   Abuja Municipal Area Council</b>
                                               </div>
                                               <div class="col-sm-6">

                                                <br>
                                                    <b>DIRECTOR OF OPERATIONS <br />
                                                    For Honourable Chairman <br />
                                                    Abuja Municipal Area Council</b>

                                               </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row-border px-4 py-2">
                                            <div class="text-center"><p><strong>ACKNOWLEDGEMENT</strong></p></div>
                                            <table>
                                                <tr>
                                                    <td>Date of Dispatch:</td>
                                                    <td>-----------------------------</td>
                                                </tr>
                                                <tr>
                                                    <td>Name of Officer:</td>
                                                    <td>-----------------------------</td>
                                                </tr>
                                                <tr>
                                                    <td>Mode of Dispatch:</td>
                                                    <td>-----------------------------</td>
                                                </tr>
                                            </table>
                                            <br />
                                            <table>
                                                <tr>
                                                    <td>Date of Dispatch:</td>
                                                    <td>-----------------------------</td>
                                                </tr>
                                                <tr>
                                                    <td>Name of Officer:</td>
                                                    <td>-----------------------------</td>
                                                </tr>
                                                <tr>
                                                    <td>Mode of Dispatch:</td>
                                                    <td>-----------------------------</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md-6">
                                    <button class="btn btn-outline-primary btn-sm col-md-12" onclick="print('docs/print.pdf')" >
                                        <i class="fa fa-print"></i> Print
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <button class="btn btn-outline-danger btn-sm col-md-12">
                                        <i class="fa fa-file-pdf"></i> Download PDF
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

{{-- @endsection --}}



@section('scripts')
    
 @endsection 