@extends('admin.master')
@section('title','Index')
@section('content')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
	<br><br>
    <h2 style="text-align: center;">Welcome to Chanmin Shop</h2>
    <div class="img-responsive text-center"><img src="{{asset('images/nav.png')}}" width='290px' heigth='90px' alt=""></div>

	
		<div class="" style='margin:0 auto;'>
			<br>
			<div class='row'>
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
	
</main>
@endsection