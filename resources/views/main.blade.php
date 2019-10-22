@extends('index')

@section('title')
welcome
@endsection


@section('body')

@include('mainnav')






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
  <p><button class="btn btn-primary">Buy</button></p>
</div>
        
      
    
@endif
@endforeach
</div>
<script>
$('#myCarousel').carousel({
  interval: 4000
})

$('.carousel .item').each(function(){
  var next = $(this).next();
  if (!next.length) {
    next = $(this).siblings(':first');
  }
  next.children(':first-child').clone().appendTo($(this));

  for (var i=0;i<2;i++) {
    next=next.next();
    if (!next.length) {
      next = $(this).siblings(':first');
    }

    next.children(':first-child').clone().appendTo($(this));
  }
});
</script>
@endsection


