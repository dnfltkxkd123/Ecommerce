<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Address;
use App\Order;

class CheckoutController extends Controller
{
    //

    public function index(){

    	if(Auth::user()){
    		$cartItems = Cart::content();
    		return view('cart.checkout',compact('cartItems'));
    	}else{
    		return redirect('login');
    	}
    }

    public function address(Request $request){
        $this->validate($request,[
        	'fullname'=>'required',
        	'zip_code'=>'required|numeric',
        	'address'=>'required',
            'email'=>'required|min:5|max:191',
        	'country'=>'required',
        ]);

        $request['user_id'] = Auth::user()->id;
        //$addressCheck = Address::where('user_id',$request['user_id'])->get();
        
        $request['orders_id'] = Order::createOrder($request->total);

        Address::create($request->all());
        Cart::destroy();
        
        
        
    }

    public function thanks(){
        return view('cart.purchaseSuccess');
    }

    public function check(Request $request){

        $validator = Validator::make($request,[
            'fullname'=>'required|min:5|max:35',
            'zip_code'=>'required|numeric',
            'address'=>'required|min:5|max:191',
            'email'=>'required|min:5|max:191',
            'country'=>'required',
        ]);

        if($validator->fails()) {
            return 0;
        }else{
            return 1;
        }
    }
}
