@extends('index')

@section('title')
Registation
@endsection

@section('body')
@include('mainnav')

@if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
@endif

@if (session('response'))
                        <div class="alert alert-success" role="alert">
                            {{ session('response') }}
                        </div>
                    @endif
<form method="POST" action="{{route('submit')}}">
  <center><h1 style="color:blue">User Registation</h1></center>
  {{csrf_field()}}
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" name="name" class="form-control"  placeholder="Enter full name">
  
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">ID Number</label>
    <input type="text" name="id_number" class="form-control"  placeholder="Enter ID number">
  
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email Address</label>
    <input type="email" name="email" class="form-control"  placeholder="Enter email address">
  
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Address</label>
    <input type="text"name="address" class="form-control"  placeholder="Enter Address">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Phone Number</label>
    <input type="number" name="number" class="form-control"  placeholder="Enter phone number">
  
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Photo</label>
    <input type="file" name="photo" class="form-control"  placeholder="Enter profile picture">
  
  </div>
  <input type="hidden" name="type" value="user"  >
  <input type="hidden" name="status" value="active" >
  <div class="form-group">
    <label for="exampleInputEmail1">Password</label>
    <input type="password" name="password" class="form-control"  placeholder="Enter passsword">
  
  </div>




  
  <button type="submit" class="btn btn-primary">Registation </button>
</form>
@endsection