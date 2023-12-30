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
                               <a class="btn btn-success" href="{{ route('users.create') }}"> Create New Users</a>
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
                                            <th>PASSWORD</th>
                                            <th>ACTION</th>
                                            <th>ROLES</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $users)
                                            <tr>
                                                <td width="10%">{{ $users->id }}</td>
                                                <td width="10%">{{ $users->name }}</td>
                                                <td width="10%">{{ $users->email }}</td>
                                                <td width="10%">{{ $users->password }}</td> 
                                                <td>
                                                    <form action="" method="">
                                                    <a href="{{ route('users.edit', $users->id)}}"><i class="fa fa-edit"></i>Edit</a>
                                                    <a href="#"><i class="fa fa-stop"></i>Locked</a>
                                                    <a href="#"><i class="fa fa-trash"></i>Delete</a>
                                                </form> 
                                                </td> 
                                                <td width="10%">{{ $users->user_type }}</td>                                             
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