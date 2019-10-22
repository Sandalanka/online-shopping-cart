@extends('index')

@section('title')
Online Shoping Center
@endsection

@section('body')

<nav class="navbar navbar-expand-lg navbar-light " style="background-color:   #000050;">

  <a class="navbar-brand" href="./"><font color=" #FFFFFF">Online Shoping Center</font></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">

     

    @if($login->type=='admin')


    <a class="nav-item nav-link active" href='{{url("/home/{$login->id}")}}'><font color=" #FFFFFF">Home</font></a>
      <a class="nav-item nav-link" href='{{url("/ordershow/{$login->id}")}}'><font color=" #FFFFFF">Order</font></a>
     <a class="nav-item nav-link" href='{{url("/user/{$login->id}")}}'><font color=" #FFFFFF">User</font></a>
      <a class="nav-item nav-link active" href='{{url("/complaineshow/{$login->id}")}}'><font color=" #FFFFFF">Complain</font></a>
      

      @else

      <a class="nav-item nav-link active" href='{{url("/home/{$login->id}")}}'><font color=" #FFFFFF">Home</font></a>
      <a class="nav-item nav-link" href='{{url("/orderhistory/{$login->id}")}}'><font color=" #FFFFFF">Order History</font></a>
      <a class="nav-item nav-link" href='{{url("/complaine/{$login->id}")}}'><font color=" #FFFFFF">Complaine</font></a>

    @endif


     
    </div>



    </div>
 <div class="dropdown show">
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    {{$login->name}}
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
  <a class="dropdown-item" href='{{url("/editpage/{$login->id}")}}'>Edit Profile</a>
    <a class="dropdown-item" href="{{route('logout')}}">Logout</a>
   
  </div>

</div>

</nav>

@if (session('response'))
                        <div class="alert alert-success" role="alert">
                            {{ session('response') }}
                        </div>
                    @endif

<center><h1 style="  margin-bottom: 20px;
        font-size: 55px;
        color: #4B0082;">Order Iteam<span style="  font-size: 20px;"></span></h1></center>

<center>

<div class="card">
  <img src="{{$iteam->photos}}" name="photos"width="50" height="50"alt="John">
</div>

<form method="POST" action="{{route('orderadd')}}" enctype="multipart/form-data" >
  <center><h2 style="color:blue">{{$iteam->name}}</h2></center>
  {{csrf_field()}}
  <div class="form-group">
    <label for="exampleInputEmail1">Iteam Name</label>
    <input type="text" name="iteam_name" value="{{$iteam->name}}" class="form-control"  >
  
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">One iteam Price</label>
    <input type="text" name="price"  value="{{$iteam->price}}" class="form-control">
  
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1"> quantity</label>
    <input type="number" name="quantity" class="form-control" required  placeholder="Enter quantity">
  
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Name</label>
    <input type="text"name="name" value="{{$login->name}}" class="form-control"  placeholder="Enter name">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Address</label>
    <input type="text" name="address" value="{{$login->address}}" class="form-control"  placeholder="Enter address">
  
  </div>


  <div class="form-group">
  
  
  </div>

  <input type="hidden" name="iteam_id" value="{{$iteam->id}}"  >
  <input type="hidden" name="user_id" value="{{$login->id}}"  >
  
  <input type="hidden" name="photos" value="{{$iteam->photos}}" >
  <input type="hidden" name="status" value="mail" >





  
  <button type="submit"  class="btn btn-primary">Registation </button>
</form>

@endsection