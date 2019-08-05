@extends('front.master')
@section('title','Address')
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
					<div class="container">

						<form action="{{url('updateAddress')}}" method='post'>
							@if(session('message'))
							<div class="alert alert-info">{{session('message')}}</div>
							@endif
							{{csrf_field()}}
							@foreach($address as $value)
							<div class="form-group{{$errors->has('fullname')?' has-error':''}}">
								<label for="">Full Name</label>
								<input type="text" class='form-control' name='fullname' value='{{$value->fullname}}'>
								<span class='text-danger'>{{$errors->first('fullname')}}</span>
							</div>
							<div class="form-group{{$errors->has('email')?' has-error':''}}">
								<label for="">Email</label>
								<input type="text" class='form-control' name='email' value='{{$value->email}}'>
								<span class='text-danger'>{{$errors->first('email')}}</span>
							</div>
							<div class="form-group{{$errors->has('country')?' has-error':''}}">
								<label for="">Country</label>
								<input type="text" class='form-control' name='country' value='{{$value->country}}'>
								<span class='text-danger'>{{$errors->first('country')}}</span>
							</div>
							<div class="form-group{{$errors->has('address')?' has-error':''}}">
								<label for="">Address</label>
								<input type="text" class='form-control' name='address' value='{{$value->address}}'>
								<span class='text-danger'>{{$errors->first('address')}}</span>
							</div>
							<div class="form-group{{$errors->has('zip_code')?' has-error':''}}">
								<label for="">Zip Code</label>
								<input type="text" class='form-control' name='zip_code' value='{{$value->zip_code}}'>
								<span class='text-danger'>{{$errors->first('zip_code')}}</span>
							</div>
							@endforeach
							<button type="sumbit" class='btn btn-success'>Submit</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection