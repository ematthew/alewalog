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
            Edit User Table
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

         <form method="POST" action="{{ url('users/update/'.$user->id ) }}">
            <div class="form-group">
                  @csrf
                    <label for="name">User Name:</label>
                    <input type="text" class="form-control" name="name" value="{{ $user->name }}"/>
            </div>
                <div class="form-group">
                    <label for="cases">Email :</label>
                    <input type="text" class="form-control" name="email" value="{{ $user->email }}"/>
                </div>
                <div class="form-group">
                    <label for="cases">password:</label>
                    <input type="text" class="form-control" name="password"/>
                </div>
                <div class="form-group">
                    <label for="cases">confirm password:</label>
                    <input type="text" class="form-control" name="password"/>
                </div>
              <button type="submit" class="btn btn-primary">Update Data</button>
            </form>
     </div>
 </div>
    <!-- End of Main Content -->
@endsection

{{-- scripts --}}
@section('scripts')
    
@endsection