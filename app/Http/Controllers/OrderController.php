<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Address;
class OrderController extends Controller
{
    //
    public function orderList(){
    	$orders = DB::table('orders_product')
    	->select(['products.image','users.name','users.email','products.pro_name','products.pro_price','orders_product.qty','orders.total','orders.user_id','orders_product.orders_id','orders.created_at'])
    	->leftJoin('products','products.id','=','orders_product.product_id')
    	->leftJoin('orders','orders.id','=','orders_product.orders_id')
    	->leftJoin('users','orders.user_id','=','users.id')
    	->get();
    	//return $orders;
    	
    	return view('admin.order.index',compact('orders'));
    }

    public function shippingAddress($orders_id){
    	$address = Address::where('orders_id',$orders_id)
    	->leftJoin('orders','orders.id','=','address.orders_id')
    	->get();

        $orders = DB::table('orders_product')
        ->select(['products.image','users.name','users.email','products.pro_name','products.pro_price','orders_product.qty','orders.total','orders.user_id','orders_product.orders_id','orders.created_at'])
        ->leftJoin('products','products.id','=','orders_product.product_id')
        ->leftJoin('orders','orders.id','=','orders_product.orders_id')
        ->leftJoin('users','orders.user_id','=','users.id')
        ->where('orders.id',$orders_id)
        ->get();
        
        return view('admin.order.address',compact(['address','orders']));
    	
    }

    public function backPage(){
        
    }
}
