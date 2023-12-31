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
                Create Menu
            </div>
            <div class="card-header">
                <a class="btn btn-primary" href="{{ url('menus') }}"> Back</a>
            </div>
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

         <form method="post" action="{{ url('menus/add') }}">
                @csrf

                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="name"/>
                </div>
                <div class="form-group">
                    <label for="cases">Route</label>
                    <select class="form-control" name="menu_route">
                        @foreach($routes as $key => $route)
                            @if(str_contains($route->getName(), '.index'))
                                <option value="{{ $route->uri() }}"> {{ $route->getName() }} </option>
                            @endif
                        @endforeach
                    </select>
                </div>
              <button type="submit" class="btn btn-primary">Add Menu</button>
            </form>
     </div>
 </div>
    <!-- End of Main Content -->
@endsection

{{-- scripts --}}
@section('scripts')
    
@endsection