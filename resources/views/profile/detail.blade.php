@extends('front.master')
@section('title','Detail')
@section('content')
	<section id="cart_items" style=''>
		<div class="container">
			<br>
			<div class='row'>
				@include('profile.menu')
				<div class="col-md-8">
					<h3><span style='color:green'>{{ucwords(Auth::user()->name)}}</span>, Order Detail</h3>
					<div class='table-responsive'>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Image</th>
						<th>name</th>
						<th>Buyer</th>
						<th>Date</th>
						<th>Price</th>
						<th>QTY</th>
						<th>Total</th>
					</tr>
				</thead>
				<tbody>
					@foreach($orders as $order)
					<tr>
						<td><img src="{{url('images',$order->image)}}" alt="none image" width="80px"></td>
						<td>{{$order->pro_name}}</td>
						<td>{{$order->name}}</td>
						<td>{{$order->created_at}}</td>
						<td>${{$order->pro_price}}</td>
						<td>{{$order->qty}}</td>
						<td>${{$order->total}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>

		<br><br>
		<h3>Address</h3><br>

		<div>
			@foreach($address as $value)
			<form action="{{url('updateAddress',$value->id)}}" method='post'>
				@if(session('message'))
							<div class="alert alert-info">{{session('message')}}</div>
							@endif
				{{csrf_field()}}
				
							<div class="form-group">
								<label for="">Full Name</label>
								<input type="text" class='form-control' name='fullname' value='{{$value->fullname}}' >
								<span class='text-danger'>{{$errors->first('fullname')}}</span>
							</div>
							<div class="form-group">
								<label for="">Email</label>
								<input type="text" class='form-control' name='email' value='{{$value->email}}' >
								<span class='text-danger'>{{$errors->first('email')}}</span>
							</div>
							<!--
							<div class="form-group">
								<label for="">Country</label>
								<input type="text" class='form-control' name='country' value='{{$value->country}}' >
								<span class='text-danger'>{{$errors->first('country')}}</span>
							</div>
						-->
							<div class="form-group">
								<label for="">Country</label>
								<select class="custom-select d-block w-100" name="country" id="country" >
									<option value="{{$value->country}}" selected>{{$value->country}}</option>
									@include('cart.countryOtion')
								</select>
							</div>
							<div class="form-group">
								<label for="">Address</label>
								<input type="text" class='form-control' name='address' value='{{$value->address}}' >
							</div>
							<div class="form-group">
								<label for="">Zip Code</label>
								<input type="text" class='form-control' name='zip_code' value='{{$value->zip_code}}' >
							</div>
							
							<button type="sumbit" class='btn btn-success'>Update</button>
			</form>
			@endforeach
							
		</div>
				</div>
			</div>
		</div>
	</section>

	
@endsection