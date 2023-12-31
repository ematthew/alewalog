@extends('layouts.app')


@section('title')
    Home
@endsection


@section('contents')
    <!-- Main Content -->
    <div id="content">

        @include('components.navigation')

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-12 col-md-12 mb-4">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">All Menus</h6>
                            <span class="float-right">
                               <a class="btn btn-success" href="{{ url('menus/create') }}"> Create New Menu</a>
                           </span>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered small" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Route</th>
                                            <th>Roles</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($menus as $menu)
                                            <tr>
                                                <td>{{ $menu->id }}</td>
                                                <td>{{ $menu->name }}</td>                                       
                                                <td>{{ $menu->route }}</td>    
                                                <td>
                                                    @foreach($menu->menuRoles as $key => $menuRole)

                                                        <i class="fa fa-key"></i> {{ $menuRole->role->name }}
                                                        <hr />
                                                    @endforeach
                                                </td>    
                                                <td><a class="px-2" href="{{ url('menus/roles/'.$menu->id) }}"><i class="fa fa-key"></i>Assign Role</a></td>                                   
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
    
@endsection