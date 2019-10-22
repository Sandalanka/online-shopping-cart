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
        color: #4B0082;">Order History<span style="  font-size: 20px;"></span></h1></center>

<center>


<table id="myTable" style="    width: 100%;
    border-collapse: collapse">
<tr class="table-success" >



<th style="  background-color: #191970;
        text-align: left   padding-top: 12px;
  padding-bottom: 12px  ;color: white;">Iteam Name</th>

<th style="  background-color: #191970;
        text-align: left   padding-top: 12px;
  padding-bottom: 12px  ;color: white;">Quantity</th>
<th style="  background-color: #191970;
        text-align: left   padding-top: 12px;
  padding-bottom: 12px; color: white;">Price</th>


<th style="  background-color: #191970;
        text-align: left   padding-top: 12px;
  padding-bottom: 12px; color: white;">Bill</th>








  
<th style="  background-color: #191970;
        text-align: left   padding-top: 12px;
  padding-bottom: 12px; color: white;">Address</th>


  
<th style="  background-color: #191970;
        text-align: left   padding-top: 12px;
  padding-bottom: 12px; color: white;">Order Date</th>

<th style="  background-color: #191970;
        text-align: left   padding-top: 12px;
  padding-bottom: 12px; color: white;">Reciver Date</th>


  <th style="  background-color: #191970;
        text-align: left   padding-top: 12px;
  padding-bottom: 12px; color: white;">If reciver product click Conform</th>

</tr>

@foreach($order as $order)
@if($login->id==$order->user_id)

<tr>





    
<td style=" padding: 10px;
        border-bottom: 1px solid #aaa;">{{$order->item_name}}</td>

<td style=" padding: 10px;
        border-bottom: 1px solid #aaa;">{{$order->quantity}}</td>

<td style=" padding: 10px;
        border-bottom: 1px solid #aaa;">Rs.{{$order->price}}</td>
     
     <td style=" padding: 10px;
        border-bottom: 1px solid #aaa;">Rs.{{$order->bill}}</td>

<td style=" padding: 10px;
        border-bottom: 1px solid #aaa;">{{$order->address}}</td>
            <td style=" padding: 10px;
        border-bottom: 1px solid #aaa;">{{$order->order_date}}</td>

        @if($order->status=='mail')
        <td style=" padding: 10px;
        border-bottom: 1px solid #aaa;"><font color="red">Still Mail</font</td>
        @else

        <td style=" padding: 10px;
        border-bottom: 1px solid #aaa;">{{$order->reciver_date}}</td>
        @endif
        @if($order->status=='mail')
        <td style=" padding: 10px;
        border-bottom: 1px solid #aaa;"><a href='{{url("/reciver/{$order->id}")}}'><button class="btn btn-success">Conform</button></a></td>
        @else
        <td style=" padding: 10px;
        border-bottom: 1px solid #aaa;"><button class="btn btn-primary">Recived</button></td>

@endif

</tr>

@endif
@endforeach
</table>



        
      
@endsection