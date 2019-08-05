@extends('front.master')
@section('title','Orders')
@section('content')
<style>
	table td{
		padding:10px;
	}
</style>
	<section id="cart_items" style=''>
		<div class="container">
			<br>
			<div class='row'>
				@include('profile.menu')
				<div class="col-md-8">
					<h3><span style='color:green'>{{ucwords(Auth::user()->name)}}</span>, Your Address</h3>
					<div class="table table-hover">
						<table>
							<thead>
								<tr>
									<th>Date</th>
									<th>Product name</th>
									<th>Product Code</th>
									<th>Order Total</th>
									<th>Order Status</th>
									<th>Detail</th>
								</tr>
							</thead>
							<tbody>
								@foreach($orders as $order)
								<tr>
									<td>{{$order->created_at}}</td>
									<td>{{$order->pro_name}}</td>
									<td>{{$order->pro_code}}</td>
									<td>{{$order->total}}</td>
									<td>{{$order->status}}</td>
									<td><a href="{{url('detail',$order->id)}}" class='btn btn-danger'>Click</a></td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection