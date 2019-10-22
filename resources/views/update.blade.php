@extends('index')

@section('title')

Edit Profile
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
      <a class="nav-item nav-link" href=""><font color=" #FFFFFF">Order</font></a>
     <a class="nav-item nav-link" href='{{url("/user/{$login->id}")}}'><font color=" #FFFFFF">User</font></a>
      <a class="nav-item nav-link active" href="#"><font color=" #FFFFFF">Complain</font></a>
      

      @else

      <a class="nav-item nav-link active" href="#"><font color=" #FFFFFF">Home</font></a>
      <a class="nav-item nav-link" href=""><font color=" #FFFFFF">Order History</font></a>
      <a class="nav-item nav-link" href=""><font color=" #FFFFFF">Complaine</font></a>

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



<center><h1 style="  margin-bottom: 20px;
        font-size: 55px;
        color: #4B0082;">Update Iteam<span style="  font-size: 20px;"></span></h1></center>

<center>


<form method="POST" action="{{route('iteamupdate')}}"  >
 
  {{csrf_field()}}
  <div class="form-group">
    <label for="exampleInputEmail1" align="left">Iteam Name</label>
    <input type="text"  name="name" value="{{$iteam->name}}"  class="form-control" required  placeholder="Enter iteam name">
  
  </div>

 
  <div class="form-group">
    <label for="exampleInputPassword1">price</label>
    <input type="number"name="price" value="{{$iteam->price}}" class="form-control"  required placeholder="Enter iteam price">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Description</label>
    <input type="text" name="description" value="{{$iteam->description}}" class="form-control"  required placeholder="Enter iteam description">
  
  </div>


  <input type="hidden" name="id" value="{{$iteam->id}}"  >






  
  <button type="submit" style="width:300px" align="left" class="btn btn-primary">Update Iteam </button>
</form>

@endsection