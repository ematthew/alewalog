<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Alewa Admin') }} @yield('title')</title>
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i" rel="stylesheet">
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>


    <style type="text/css">
        .table thead th {
            vertical-align: top; 
            border-bottom: 2px solid #e3e6f0;
        }
        .table-bordered thead td, .table-bordered thead th {
            border-bottom-width: 5px;
        }

        .bg-gradient-primary {
            background-color: #0f1b0c;
            background-image: linear-gradient(180deg,#132d05 10%,#063507 100%);
            background-size: cover;
        }
    </style>
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        @if(Auth::check())
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/')}}">
                <div class="sidebar-brand-text mx-3">Tenement Rate $ Valuation <sup>v.1</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{url('/')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>All Data</span>
                </a>
                @if(checkIfHasMenuAccess("offices", auth()->user()->id))
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Custom Data:</h6>
                            <a class="collapse-item" href="{{url('offices')}}">Office(s)</a>
                        </div>
                    </div>
                @endif
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Data:</h6>
                        <a class="collapse-item" href="{{url('appo/demands')}}">Apo(s)-Demand</a>
                    </div>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Data:</h6>
                        <a class="collapse-item" href="{{url('nyanya/demands')}}">Nyanya(s)-Demand</a>
                    </div>
                </div>
                
                @if(checkIfHasMenuAccess("demands", auth()->user()->id))
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Demand Data:</h6>
                        <a class="collapse-item" href="{{ Route('demands.index') }}">Demands</a>
                    </div>
                </div>
                @endif

                @if(checkIfHasMenuAccess("reminder", auth()->user()->id))
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Reminder Data:</h6>
                        <a class="collapse-item" href="{{ Route('reminder.index') }}">Reminder</a>
                    </div>
                </div>
                @endif

                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Appo Reminder Data:</h6>
                        <a class="collapse-item" href="{{ Route('appo_reminder.index') }}">Appo Reminder</a>
                    </div>
                </div>

                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Nyanya Reminder Data:</h6>
                        <a class="collapse-item" href="{{ Route('nyanya_reminder.index') }}">Nyanya Reminder</a>
                    </div>
                </div>

                @if(checkIfHasMenuAccess("complete", auth()->user()->id))
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Complete Data:</h6>
                        <a class="collapse-item" href="{{ Route('complete.index') }}">Full Payment</a>
                    </div>
                </div>
                @endif

                @if(checkIfHasMenuAccess("consolidated", auth()->user()->id))
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Consolidated Data:</h6>
                        <a class="collapse-item" href="{{ Route('consolidated.index') }}">Consolidated</a>
                    </div>
                </div>
                @endif

                @if(checkIfHasMenuAccess("payment", auth()->user()->id))
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Payment Data:</h6>
                        <a class="collapse-item" href="{{ Route('payment.index') }}">Payment</a>
                    </div>
                </div>
                @endif
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            
            @if(checkIfHasMenuAccess("uploads", auth()->user()->id))
                <!-- Nav Item - Charts -->
                <li class="nav-item">
                    <a class="nav-link" href="{{url('uploads')}}">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Upload Data</span></a>
                </li>
            @endif


            @if(auth()->user()->user_type == 'super')

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="{{url('users')}}">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Users</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="{{url('roles')}}">
                    <i class="fas fa-fw fa-key"></i>
                    <span>Roles & Permission</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="{{url('menus')}}">
                    <i class="fas fa-fw fa-lock"></i>
                    <span>Menu Access</span></a>
            </li>

            @endif
        </ul>
        <!-- End of Sidebar -->
        @endif

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            @yield('contents')
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    
                        

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <script src="{{asset('js/sb-admin-2.min.js')}}"></script>
    {{-- <script src="{{asset('vendor/chart.js/Chart.min.js')}}"></script> --}}
    {{-- <script src="{{asset('js/demo/chart-area-demo.js')}}"></script> --}}
    {{-- <script src="{{asset('js/demo/chart-pie-demo.js')}}"></script> --}}
    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    {{-- <script src="{{asset('js/demo/datatables-demo.js')}}"></script> --}}
    
    @yield('scripts')
</body>
</html>
