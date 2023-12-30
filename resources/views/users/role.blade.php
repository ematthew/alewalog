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

        <style>
                .uper 
            {
                    margin-top: 40px;
             }
        </style>
    <div class="card uper">
        <div class="card-header">
            Edit User Role
        </div>
         <div class="card-header">
            <a class="btn btn-primary" href="{{ url('users') }}"> Back</a>
        </div>
      <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                     @endforeach
                </ul>
             </div><br />
        @endif

        <form method="post" action="{{ url('users/assign/'.$user->id ) }}">
            @csrf
            <div class="form-group">
                <label for="name">User Name:</label>
                <input type="text" class="form-control" name="name" value="{{ $user->name }}"/>
                <input type="hidden" name="user_id" value="{{ $user->id }}">
            </div>

            <div class="form-group">
                <label for="name">Roles:</label>
                <select class="form-control" name="roles[]" id="roles" multiple="true">
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Assign Role</button>
        </form>
     </div>
 </div>
    <!-- End of Main Content -->
@endsection

{{-- scripts --}}
@section('scripts')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $("#roles").select2();
        });
    </script>
    
@endsection