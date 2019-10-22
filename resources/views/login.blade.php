@extends('index')

@section('title')
Login
@endsection

@section('body')
@include('mainnav')
@if (session('response'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('response') }}
                        </div>
                    @endif
     

<form method="post" action="{{route('loginform')}}">
  <center><h1 style="color:red">Login Here</h1></center>
  {{csrf_field()}}
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" name="email" class="form-control"  placeholder="Enter email">
  
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password"name="password" class="form-control"  placeholder="Password">
  </div>
  
  <button type="submit" class="btn btn-primary">Login</button>
</form>
@endsection