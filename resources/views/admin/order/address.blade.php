@extends('admin.master')
@section('title','Order List')
@section('content')
	<main class="col-sm-9 ml-sm-auto col-md-10 pt-3" style='margin-top:50px;'>
		<a class='btn btn-secondary' href="{{url('admin/backPage')}}"><=Back</a><br><br>
		<h3>Order Detail</h3><br>

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
							<div class="form-group">
								<label for="">Full Name</label>
								<input type="text" class='form-control' name='fullname' value='{{$value->fullname}}' disabled>
								<span class='text-danger'>{{$errors->first('fullname')}}</span>
							</div>
							<div class="form-group">
								<label for="">Email</label>
								<input type="text" class='form-control' name='email' value='{{$value->email}}' disabled>
								<span class='text-danger'>{{$errors->first('email')}}</span>
							</div>
							<div class="form-group">
								<label for="">Country</label>
								<input type="text" class='form-control' name='country' value='{{$value->country}}' disabled>
								<span class='text-danger'>{{$errors->first('country')}}</span>
							</div>
							<div class="form-group">
								<label for="">Address</label>
								<input type="text" class='form-control' name='address' value='{{$value->address}}' disabled>
							</div>
							<div class="form-group">
								<label for="">Zip Code</label>
								<input type="text" class='form-control' name='zip_code' value='{{$value->zip_code}}' disabled>
							</div>
							@endforeach
		</div>
	</main>
@endsection