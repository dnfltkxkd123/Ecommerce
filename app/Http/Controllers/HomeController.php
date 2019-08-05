<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Categories;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function logout(){
        Auth::logout();
        return redirect()->back();
    }
    public function index()
    {
        $categories = Categories::all();
        $products = Product::paginate(10);
        return view('front.home',compact(['products','categories']));
    }

    public function showCates($id){
        $products = Product::where('category_id',$id)->paginate(10);
        $categories = Categories::all();
        $categoryName = Categories::find($id);
        $categoryName = $categoryName->name;
        return view('front.home',compact(['products','categories','categoryName']));
    }

    public function product($id){
        $product = Product::findOrFail($id);
        return view('front.product_detail',compact('product'));
    }

    public function productSearch(Request $request){
        $search = $request->search;
        $products = Product::where('pro_name','like','%'.$search.'%')->paginate(10);
        return view('front.home',compact(['products','search']));
    }


}
