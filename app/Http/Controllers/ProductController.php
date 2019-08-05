<?php

namespace App\Http\Controllers;

use App\Product;
use App\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::paginate(10);
        for($i=0 ; $i<count($products) ; $i++){
            $category = Categories::find($products[$i]->category_id);
            $products[$i]->category_id = $category->name;
        }   
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Categories::all();
        return view('admin.product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        
        
        $formInput = $request->except('image');
        $this->validate($request,[
            'pro_name' => 'required',
            'pro_code'=> 'required',
            'pro_price'=>'required|integer',
            'pro_info'=>'required',
            'spl_price'=>'required|integer',
            'stock'=>'required|integer',
            'category_id'=>'required|integer',
            'image'=>'image|mimes:png,jpg,jpeg|max:10000',
        ]);
        
        $image=$request->image;
        $imageExtention = $image->getClientOriginalExtension();

        $product = Product::create($formInput);

        $product->image = $product->id.'.'.$imageExtention;
        $product->save();

        if($image){
            $image->move('images',$product->image);
        }
        return $this->index();
        return redirect()->back();
        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $categories = Categories::all();
        $product = Product::find($id);
        return view('admin.product.update',compact(['categories','product']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[
            'pro_name' => 'required',
            'pro_code'=> 'required',
            'pro_price'=>'required|integer',
            'pro_info'=>'required',
            'spl_price'=>'required|integer',
            'stock'=>'required|integer',
            'category_id'=>'required|integer',
        ]);
        $product = Product::where('id',$id)->update( $request->except(['_token','_method']) );
        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Product::find($id)->delete();
        return redirect()->back();
        
    }

    public function category($id){
       $products = Product::where('category_id',$id)->paginate(10);
       for($i=0 ; $i<count($products) ; $i++){
            $category = Categories::find($products[$i]->category_id);
            $products[$i]->category_id = $category->name;
        }   
        return view('admin.product.index',compact('products'));
    }
}
