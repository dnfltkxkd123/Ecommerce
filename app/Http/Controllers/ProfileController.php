<?php

namespace App\Http\Controllers;

use App\Address;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    //

    public function index(){
    	return view('profile.index');
    }

    public function orders(){
    	$user_id = Auth::user()->id;
    	//$orders = Order::where('user_id',$user_id)->with('orderFields')->get();
    	$orders = DB::table('orders_product')
    	->leftJoin('products','products.id','=','orders_product.product_id')
    	->leftJoin('orders','orders.id','=','orders_product.orders_id')
    	->where('orders.user_id',$user_id)->get();
    	//return $orders;
    	return view('profile.orders',compact('orders'));
    }

    public function address(){
    	$user_id = Auth::user()->id;
    	$address = Address::where('user_id',$user_id)->limit(1)->get();
    	return view('profile.address',compact('address'));
    }

    public function updateAddress(Request $request,$id){
    	$this->validate($request,[
    		'fullname'=>'required|min:5|max:35',
    		'email'=>'required|email|min:5|max:191',
    		'country'=>'required',
    		'address'=>'required|min:5|max:191',
    		'zip_code'=>'required|numeric',
    	]);
    	$user_id = Auth::user()->id;
    	//Address::where('user_id',$user_id)->update( $request->except('_token') );
        Address::where('id',$id)->update( $request->except('_token') );
    	return back()->with('message','You are address update success');
    }

    public function updateAddress2(){

    }

    public function password(){
    	return view('profile.password');
    }

    public function changePassword(Request $request){
    	$this->validate($request,[
    		'current_password'=>'required|min:8',
    		'new_password'=>'required|min:8|confirmed',
    		'new_password_confirmation'=>'required|min:8',
    	]);
    	$email = Auth::user()->email;
    	if(Hash::check($request['current_password'],Auth::user()->password)){
    		$password = bcrypt($request['new_password']);
    		$user = User::find(Auth::user()->id);
    		$user->password = $password;
    		$user->save();
    		return back()->with('message','You are password change success!!');
    	}else{
    		return back()->with('error','Current Password False!!');
    	}
    	
    }

    public function detailInfo($orders_id){
        /*
        $address = Address::where('orders_id',$orders_id)
        ->leftJoin('orders','orders.id','=','address.orders_id')
        ->get();
        */
        $address = Address::where('orders_id',$orders_id)->get();

        $orders = DB::table('orders_product')
        ->select(['products.image','users.name','users.email','products.pro_name','products.pro_price','orders_product.qty','orders.total','orders.user_id','orders_product.orders_id','orders.created_at'])
        ->leftJoin('products','products.id','=','orders_product.product_id')
        ->leftJoin('orders','orders.id','=','orders_product.orders_id')
        ->leftJoin('users','orders.user_id','=','users.id')
        ->where('orders.id',$orders_id)
        ->get();
        
        return view('profile.detail',compact(['address','orders']));
        
    }
}
