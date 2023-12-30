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
                            <h6 class="m-0 font-weight-bold text-primary">All Users</h6>
                            <div class="pull-right">
                               <a class="btn btn-success" href="{{ url('users/create') }}"> Create New Users</a>
                           </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered small" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>NAME</th>
                                            <th>EMAIL</th>
                                            
                                            <th>ROLES</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $key => $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                
                                                <td width="10%">
                                                    @if($user->user_type == "super")
                                                        {{ ucfirst($user->user_type) . ' Administrator' }}
                                                        <hr />
                                                    @endif
                                                    @foreach($user->userRoles as $key => $userRole)

                                                        {{ $userRole->role->name }}
                                                        <hr />
                                                    @endforeach
                                                </td>  
                                                <td>
                                                    <a class="px-2" href="{{ url('users/edit/'.$user->id)}}">
                                                        <i class="fa fa-edit"></i>Edit
                                                    </a>
                                                    <a class="px-2" href="#"><i class="fa fa-trash"></i>Delete</a>
                                                    <a class="px-2" href="{{ url('users/roles/'.$user->id) }}"><i class="fa fa-key"></i>Assign Role</a>
                                                </td>                                            
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