@extends('index')

@section('title')
Complaine
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
      <a class="nav-item nav-link" href='{{url("/user/{$login->id}")}}'><font color=" #FFFFFF">Order</font></a>
     <a class="nav-item nav-link" href='{{url("/user/{$login->id}")}}'><font color=" #FFFFFF">User</font></a>
      <a class="nav-item nav-link active" href=""><font color=" #FFFFFF">Complain</font></a>
      

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
        color: #4B0082;">Complaine<span style="  font-size: 20px;"></span></h1></center>

<center>
<div style="width:100 height:100" align="right" >
<button type="button" class="btn btn-danger" width="100" height="100"data-toggle="modal" data-target="#myModal">Complaine</button>
</div>

<table id="myTable" style="    width: 100%;
    border-collapse: collapse">
<tr class="table-success" >



<th style="  background-color: #191970;
        text-align: left   padding-top: 12px;
  padding-bottom: 12px  ;color: white;">Complaine</th>

<th style="  background-color: #191970;
        text-align: left   padding-top: 12px;
  padding-bottom: 12px  ;color: white;">Complaine Date</th>

</tr>


@foreach($complaine as $complaine)
@if($login->id==$complaine->user_id)

<tr>





    
<td style=" padding: 10px;
        border-bottom: 1px solid #aaa;">{{$complaine->complaine}}</td>

<td style=" padding: 10px;
        border-bottom: 1px solid #aaa;">{{$complaine->date}}</td>
        </tr>
     
        @endif
        @endforeach
</table>


<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"  style="color:blue">Complaine</h4>
        </div>
        <div class="modal-body">
         
    
        <form method="POST" action="{{route('complaineadd')}}">
 
  {{csrf_field()}}
  <div class="form-group">
    <label for="exampleInputEmail1">Complaine</label><br>
   <textarea name="complaine" id="" cols="30" rows="10">enter complaine here</textarea>
  
  </div>
 
 

 
  <input type="hidden" name="user_name" value="{{$login->name}}" >

  <input type="hidden" name="user_id" value="{{$login->id}}" >



  
  <button type="submit" class="btn btn-danger">Complaine </button>
</form>
    
    
  </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>

      </div>
      
    </div>
  </div>
  


@endsection