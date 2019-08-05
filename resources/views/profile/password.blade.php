@extends('front.master')
@section('title','Password Change')
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
					<h3><span style='color:green'>{{ucwords(Auth::user()->name)}}</span>,Change Password </h3><br>
					<div class="container">
						<form action="{{url('changePassword')}}" method='post'>
								@if(session('message'))
								<div class="alert alert-info">{{session('message')}}</div>
								@endif
								@if(session('error'))
								<div class="alert alert-danger">{{session('error')}}</div>
								@endif
								{{csrf_field()}}
								{{method_field('PUT')}}
								
								<div class="form-group{{$errors->has('current_password')?' has-error':''}}">
									<label for="">Current Password</label>
									<input type="password" class='form-control' name='current_password' value=''>
									<span class='text-danger'>{{$errors->first('current_password')}}</span>
								</div>
								<div class="form-group{{$errors->has('new_password')?' has-error':''}}">
									<label for="">New Password</label>
									<input type="password" class='form-control' name='new_password' value=''>
									<span class='text-danger'>{{$errors->first('new_password')}}</span>
								</div>
								<div class="form-group{{$errors->has('new_password_confirmation')?' has-error':''}}">
									<label for="">New Password confirmation</label>
									<input type="password" class='form-control' name='new_password_confirmation' value=''>
									<span class='text-danger'>{{$errors->first('new_password_confirmation')}}</span>
								</div>
								
								<button type="sumbit" class='btn btn-success'>Change Password</button>
							</form>
					</div>
				</div>
				
			</div>
		</div>
	</section>
@endsection