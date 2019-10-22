@extends('index')

@section('title')

User Details
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
        color: #4B0082;">User Details<span style="  font-size: 20px;"></span></h1></center>

<center>

<div class="md-form active-pink active-pink-2 mb-3 mt-0" align="left">
  <input class="form-control" style=" height: 30px;
                width: 300px; align:left" id="myInput" onkeyup="myFunction()" type="text" title="Type in a name" placeholder="Search for name" aria-label="Search">
</div>


<div class="md-form active-pink active-pink-2 mb-3 mt-0"  width="100" height="100"  align="right">
<button type="button"class="btn btn-success" data-toggle="modal" data-target="#myModal">Add User</button>
</div>


<table id="myTable" style="    width: 100%;
    border-collapse: collapse">
<tr class="table-success" >
<th style="  background-color: #191970;
        text-align: left   padding-top: 12px;
  padding-bottom: 12px; color: white;">Name</th>
<th style="  background-color: #191970;
        text-align: left   padding-top: 12px;
  padding-bottom: 12px  ;color: white;">ID Number</th>

<th style="  background-color: #191970;
        text-align: left   padding-top: 12px;
  padding-bottom: 12px  ;color: white;">Phone Number</th>
<th style="  background-color: #191970;
        text-align: left   padding-top: 12px;
  padding-bottom: 12px; color: white;">Email Address</th>


<th style="  background-color: #191970;
        text-align: left   padding-top: 12px;
  padding-bottom: 12px; color: white;">Address</th>



<th style="  background-color: #191970;
        text-align: left   padding-top: 12px;
  padding-bottom: 12px; color: white;">Type</th>



<th style="  background-color: #191970;
        text-align: left   padding-top: 12px;
  padding-bottom: 12px; color: white;">status</th>

</tr>


@foreach($user as $user)
<tr>

<td style=" padding: 10px;
        border-bottom: 1px solid #aaa;">{{$user->name}}</td>
<td style=" padding: 10px;
        border-bottom: 1px solid #aaa;">{{$user->id_number}}</td>

<td style=" padding: 10px;
        border-bottom: 1px solid #aaa;">{{$user->phone}}</td>

<td style=" padding: 10px;
        border-bottom: 1px solid #aaa;">{{$user->email}}</td>
     
     <td style=" padding: 10px;
        border-bottom: 1px solid #aaa;">{{$user->address}}</td>

        @if($user->type=='admin')
        <td style=" padding: 10px;
        border-bottom: 1px solid #aaa;"><button class="btn btn-secondary">Admin</button></td>
        @else

        <td style=" padding: 10px;
        border-bottom: 1px solid #aaa;"><button class="btn btn-info">User</button></td>
        @endif


        @if($user->status=='inactive')
        <td style=" padding: 10px;
        border-bottom: 1px solid #aaa;"><a href='{{url("/inactive/{$user->id}")}}'><button class="btn btn-danger">Inactive</button></a></td>
        @else

        <td style=" padding: 10px;
        border-bottom: 1px solid #aaa;"><a href='{{url("/active/{$user->id}")}}'><button class="btn btn-primary">Active</button></a></td>
        @endif

</tr>
@endforeach
</table>

<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
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




<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"  style="color:blue">Registation</h4>
        </div>
        <div class="modal-body">
         
    
        <form method="POST" action="{{route('submit')}}">
 
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
  <div class="form-group row">
                            <label for="category_id" class="col-md-4 col-form-label text-md-right">User type</label>

                            <div class="col-md-6">
                                <select id="category_id"  class="form-control @error('category_id') is-invalid @enderror" name="type" required autocomplete="category_id">
                            <option >Admin</option>
                               <option >User</option>
                            </select>
</div>
</div>

 
  <input type="hidden" name="status" value="active" >
  <div class="form-group">
    <label for="exampleInputEmail1">Password</label>
    <input type="password" name="password" class="form-control"  placeholder="Enter passsword">
  
  </div>




  
  <button type="submit" class="btn btn-primary">Registation </button>
</form>
    
    
  </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>

      </div>
      
    </div>
  </div>
  




@endsection