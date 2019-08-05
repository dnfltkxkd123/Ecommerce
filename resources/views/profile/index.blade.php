@extends('front.master')
@section('title','Profile')
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
					<ol class="breadcrumb">
						<li><h3>Welcome <span style='color:green'>{{ucwords(Auth::user()->name)}}</span></h3></li>
						<table border='0' align='center'>
							<tr>
								<td><a href="{{url('/orders')}}" class='btn btn-success'>My Orders</a></td>
								<!--<td><a href="{{url('/address')}}" class='btn btn-success'>My Address</a></td>-->
								<td><a href="{{url('/password')}}" class='btn btn-success'>Change Password</a></td>
							</tr>
						</table>
					</ol>
				</div>
			</div>
		</div>
	</section>
@endsection