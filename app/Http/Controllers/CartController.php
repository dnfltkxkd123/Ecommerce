<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    //
    public function index(){
    	$cartItems = Cart::content();
    	//return $cartItems;
        //session()->forget('error');
    	return view('cart.index',compact('cartItems'));
    }

    public function addItem($id){
    	$product = Product::findOrFail($id);
    	Cart::add($id,$product->pro_name,1,$product->pro_price,['img'=>$product->image,'stock'=>$product->stock]);
        return view('front.cart');
    	return back();
    }

    public function updateItem(Request $request){
        $rowId = $request->rowId;
        $qty = $request->qty;
        $cartItem = Cart::get($request->rowId);
        $product = Product::findOrFail($cartItem->id);
        if(isset($product)&&$qty>$product->stock){//error
            $cartItems = Cart::content();
            $error = 'Please check qty than product stock';
            return view('cart.update',compact(['error','cartItems']));
        }else{
            Cart::update($rowId, $qty);
            $cartItems = Cart::content();
            $status = 'Cart is upated';
            return view('cart.update',compact(['status','cartItems']));
        }
    }

    public function refreshItem(){
        $cartItems = Cart::content();
        $status = 'Cart is refreshed';
        return view('cart.update',compact(['status','cartItems']));
    }

    public function removeItem(Request $request){
        Cart::remove($request->rowId);
        $cartItems = Cart::content();
        $status = 'Removed Itemd';
        return view('cart.update',compact(['status','cartItems']));
    }

    public function removeNavCartItem(Request $request){
        Cart::remove($request->rowId);
        return getNav();
        return view('front.cart');
    }

    public function getNav(){
        return view('front.cart');
    }

}
