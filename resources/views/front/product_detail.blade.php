@extends('front.master')
@section('title','Product Detail')
@section('content')
<main class='bg-light'>
<br><br>
  <div class='container'>
  	<div class='row'>
  		<div class="col-md-6 col-xs-12">
  			<img src="{{url('images',$product->image)}}" alt="" class='card-img'>
        <div class='alert alert-warning' style='text-align: center;'><h2>{{$product->pro_name}}</h2></div>
  		</div>
  		<div class='col-md-5 col-md-offset-1'>
  			<div class='alert alert-warning' style='text-align: center;'><h2>Product</h2></div><hr><br>
  			<h2>Product Name : <strong>{{$product->pro_name}}</strong></h2><br><hr><br>
        <div class="divider"></div>
  			<h5>Product Information : <strong>{{$product->pro_info}}</strong></h5><br>
  			<h2 class='text-danger'>Price : <strong>$ {{$product->pro_price}}</strong></h2><br><hr><br>
  			<h2>Stock : {{$product->stock}}</h2><br><hr><br>
  			<button onclick="addItem('{{$product->id}}')" class='btn btn-success btn-product'>
  				<img src="{{url('dist/img/shopping-cart.png')}}" alt="" width="22px" height='22px'> Add To Cart
  			</button>
  			
  		</div>
  	</div>
  </div>
  <br>
</main>
@endsection