<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class Order extends Model
{
    //
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $fillable = ['status','total','user_id'];

    public function orderFields(){
    	return $this->belongsToMany(Product::class,'orders_product','orders_id','product_id')->withPivot('qty','total');
    }

    static function createOrder($total){
    	$user = Auth::user();
    	//$order = $user->orders()->create(['total'=>Cart::total(),'status'=>'pending']);//user model create orders
    	$cartItems = Cart::content();
        $order = Order::create(['user_id'=>$user->id,'total'=>$total/*Cart::total()*/,'status'=>'pending']);
    	foreach($cartItems as $cartItem){
    		$result = $order->orderFields()->attach($cartItem->id,['qty'=>$cartItem->qty,'tax'=>Cart::tax(),'total'=>$cartItem->qty*$cartItem->price]);
    	}
        //return $result->orders_id;
        return $order->id;
    }
}
