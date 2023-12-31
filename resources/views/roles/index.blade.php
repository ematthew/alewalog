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
                            <h6 class="m-0 font-weight-bold text-primary">All Roles</h6>
                            <span class="float-right">
                               <a class="btn btn-success" href="{{ url('roles/create') }}"> Create New Role</a>
                           </span>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered small" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>NAME</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($roles as $role)
                                            <tr>
                                                <td width="10%">{{ $role->id }}</td>
                                                <td width="10%">{{ $role->name }}</td>  
                                                <td width="10%"><a href="{{ url('roles/edit/'.$role->id) }}" class=""><i class="fa fa-edit"></i> Edit </a> | <span><a href="{{ url('roles/delete/'.$role->id) }}" class=""><i class="fa fa-del"></i> Delete </a></span></td>                                           
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