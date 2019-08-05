@extends('front.master')
@section('title','Checkout Page')
@section('content')
<main class='bg-light'>
	

<br><br>
<div class="container">
	<table  class="table table-hover table-condensed">
            <thead>
            <tr class="cart_menu" style='background-color: lightblue'>
              <th style="width:52.5%">Product</th>
              <th style="width:12.5%">Price</th>
              <th style="width:10.5%">Quantity</th>
              <th style="width:24.5%" class="text-center">Subtotal</th>
            </tr>
          </thead>
          
          <tbody>
            <?php $total=0 ?>
            
            @foreach($cartItems as $cartItem)
            <tr>
              <td data-th="Product">
                <div class="row">
                  <div class="col-sm-2 hidden-xs"><img src="{{url('images',$cartItem->options->img)}}" alt="..." class="img-fluid"/></div>
                  <div class="col-sm-10">
                    <h4 class="nomargin">{{$cartItem->name}}</h4>
                  </div>
                </div>
              </td>
              <td data-th="Price">${{$cartItem->price}}</td>
              <td data-th="Quantity" class="text-center">
                {{$cartItem->qty}}
              </td>
              <td data-th="Subtotal" class="text-center">${{$cartItem->subtotal}}</td>
            </tr>
            <?php $total +=$cartItem->subtotal ?>
            
            @endforeach
            
          </tbody>
          <tfoot>
			<tr>
				<td></td>	
				<td></td>
				<td></td>
				<td>
					<div class="text-right"><strong>Total ${{$total}}</strong></div>
				</td>
			</tr>
          </tfoot>
  </table>
  <div>
  	<section id="checkout-container">
            <div class="container">
                <div class="row py-5">
                    <div class="col-md-4 order-md-2 mb-4">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted">Your cart</span>
                            <span class="badge badge-secondary badge-pill">{{Cart::content()->count()}}</span>
                        </h4>
                        <ul class="list-group mb-3">
                        	@foreach($cartItems as $cartItem)
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0">{{$cartItem->name}}</h6>
                                    <small class="text-muted">Brief description</small>
                                </div>
                                <span class="text-muted">${{$cartItem->subtotal}}</span>
                            </li>
                            @endforeach
 
                            <li class="list-group-item d-flex justify-content-between text-success">
                                <span>Total (USD)</span>
                                <strong>${{$total}}</strong>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-8 order-md-1">
                        <h4 class="mb-3">Billing address</h4>
                        <form class="needs-validation" novalidate action="{{url('thanks')}}" method="get" id='formData'>
                            <input type="hidden" name='total' value='{{$total}}'>
                            {{csrf_field()}}
                            <div class="mb-3">
                                <label for="firstName">Full Name</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="fullname" placeholder="" value="">
                                </div>
                                @if ($errors->has('fullname'))
                                    <div class="">
                                        <span class="" role="alert" style='color:red'>
                                            <strong>{{ $errors->first('fullname') }}</strong>
                                        </span>
                                    </div>
                                @endif

                            </div>
 
                            <div class="mb-3">
                                <label for="email">Email
                                    
                                </label>
                                <input type="email" class="form-control" name="email" placeholder="you@example.com">
                                @if ($errors->has('email'))
                                    <div class="">
                                        <span class="" role="alert" style='color:red'>
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-md-9 mb-3">
                                    <label for="country">Country</label>
                                    <select class="custom-select d-block w-100" name='country' id="country">
                                        <option value="">Choose...</option>
                                        @include('cart.countryOtion')
                                    </select>
                                    @if ($errors->has('country'))
                                        <div class="">
                                            <span class="" role="alert" style='color:red'>
                                                <strong>{{ $errors->first('country') }}</strong>
                                            </span>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="zip">Zip Code</label>
                                    <input type="text" class="form-control" name="zip_code" placeholder="">
                                    @if ($errors->has('zip_code'))
                                        <div class="">
                                            <span class="" role="alert" style='color:red'>
                                                <strong>{{ $errors->first('zip_code') }}</strong>
                                            </span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            
                            
                            <div class="mb-3">
                                <label for="address2">Address</label>
                                <input type="text" class="form-control" name="address" placeholder="Main st Apartment or suite">
                            @if ($errors->has('address'))
                                <div class="">
                                    <span class="" role="alert" style='color:red'>
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                </div>
                            @endif
                            </div>
                            
                            
                            <hr class="mb-4">
                            @include('front.paypal')
                            <input type='hidden' value='paypal' name='payment_type'>

                        </form>
                        
                    </div>
                </div>
            </div>
        </section>
  </div>
</div>
</main>
@endsection