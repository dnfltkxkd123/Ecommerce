@extends('admin.master')
@section('title','Order List')
@section('content')
	<main class="col-sm-9 ml-sm-auto col-md-10 pt-3" style='margin-top:50px;'>
		
		<h3>Order List</h3><br>

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
						<th>Detail</th>
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
						<td>
							<a class='btn btn-sm btn-danger' href="{{url('admin/shippingAddress',$order->orders_id)}}">Click</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</main>
@endsection