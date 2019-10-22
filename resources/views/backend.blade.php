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
        color: #4B0082;">    @if($login->type=='admin')
        Iteam  And Details
        @else
        Iteam
        @endif<span style="  font-size: 20px;"></span></h1></center>

<center>
@if($login->type=="admin")
<div class="md-form active-pink active-pink-2 mb-3 mt-0" align="left">
  <input class="form-control" style=" height: 30px;
                width: 300px; align:left" id="myInput" onkeyup="myFunction()" type="text" title="Type in a name" placeholder="Search for Category" aria-label="Search">
</div>

<div class="md-form active-pink active-pink-2 mb-3 mt-0" align="right">

<a href='{{url("/iteam/{$login->id}")}}'><button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Add Iteam</button></a>
</div>





<table id="myTable" style="    width: 100%;
    border-collapse: collapse">
<tr class="table-success" >
<th style="  background-color: #191970;
        text-align: left   padding-top: 12px;
  padding-bottom: 12px; color: white;">Iteam  </th>
<th style="  background-color: #191970;
        text-align: left   padding-top: 12px;
  padding-bottom: 12px  ;color: white;">Iteam Name</th>

<th style="  background-color: #191970;
        text-align: left   padding-top: 12px;
  padding-bottom: 12px  ;color: white;">Category</th>
<th style="  background-color: #191970;
        text-align: left   padding-top: 12px;
  padding-bottom: 12px; color: white;">Price</th>


<th style="  background-color: #191970;
        text-align: left   padding-top: 12px;
  padding-bottom: 12px; color: white;">Description</th>



<th style="  background-color: #191970;
        text-align: left   padding-top: 12px;
  padding-bottom: 12px; color: white;">Status</th>



<th style="  background-color: #191970;
        text-align: left   padding-top: 12px;
  padding-bottom: 12px; color: white;">Update</th>

</tr>


@foreach($iteam as $iteam)
<tr>

<td style=" padding: 10px;
        border-bottom: 1px solid #aaa;"><img src="{{$iteam->photos}}" alt=""width="80" height="80"></td>
<td style=" padding: 10px;
        border-bottom: 1px solid #aaa;">{{$iteam->name}}</td>

<td style=" padding: 10px;
        border-bottom: 1px solid #aaa;">{{$iteam->category}}</td>

<td style=" padding: 10px;
        border-bottom: 1px solid #aaa;">{{$iteam->price}}</td>
     
     <td style=" padding: 10px;
        border-bottom: 1px solid #aaa;">{{$iteam->description}}</td>



        @if($iteam->status=='inactive')
        <td style=" padding: 10px;
        border-bottom: 1px solid #aaa;"><a href='{{url("/iteaminactive/{$iteam->id}")}}'><button class="btn btn-danger">Inactive</button></a></td>
        @else

        <td style=" padding: 10px;
        border-bottom: 1px solid #aaa;"><a href='{{url("/iteamactive/{$iteam->id}")}}'><button class="btn btn-primary">Active</button></a></td>
        @endif
   
        <td style=" padding: 10px;
        border-bottom: 1px solid #aaa;"><a href="{{ route('update', [$login->id, $iteam->id]) }}"><button class="btn btn-secondary">Update</button></a></td>

</tr>
@endforeach
</table>

@else

<div class="row">
@foreach($iteam as $iteam)
@if($iteam->status=='active')

<div class="card" width="300" height="300">
  <img src="{{$iteam->photos}}" width="100" height="100"alt="John" style="width:100%">
  <h2>{{$iteam->name}}</h2>
  <p class="title">Rs{{$iteam->price}}</p>
  <p>{{$iteam->description}}</p>
  <div style="margin: 24px 0;">
    <a href="#"><i class="fa fa-dribbble"></i></a> 
    <a href="#"><i class="fa fa-twitter"></i></a>  
    <a href="#"><i class="fa fa-linkedin"></i></a>  
    <a href="#"><i class="fa fa-facebook"></i></a> 
  </div>
  <p><a href="{{route('order',[$login->id,$iteam->id])}}"><button class="btn btn-success">Add cart</button></a></p>
</div>
        
      
    
@endif
@endforeach
</div>




@endif

<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>


@endsection