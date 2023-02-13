@extends('master')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                @if(session('err'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <strong>{{session('err')}}</strong> 
                </div>
                @endif
                <script>
                  $(".alert").alert();
                </script>
                <form action="" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" name="email">
                        @error('email')
                        <small id="emailHelp" class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                        @error('password')
                        <small id="emailHelp" class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
@stop 