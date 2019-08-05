@extends('admin.master')
@section('title','Update Product')
@section('content')
		<div class="container-fluid">
			<div class="row">
				<main class='col-sm-9 ml-sm-auto col-md-10 pt-3' style='text-decoration: underline; margin-top:50px'>
					<h3>Update Product</h3>
					<div class='col-md-6'>
						<div class="panel-body">
							<form action="{{route('product.update',$product->id)}}" method='post' role='form' enctype="multipart/form-data">
								{{csrf_field()}}
								{{method_field('PUT')}}
								<div class="form-group{{$errors->has('category_id')?' has-error':''}}">
									<label for="category_id">Category</label>
									<select class="browser-default custom-select" name='category_id'>
									  <option selected>--Select Category--</option>
									  @foreach($categories as $category)
									  <option value="{{$category->id}}">{{$category->name}}</option>
									  @endforeach
									  
									</select>
									<span class="text-danger">{{$errors->first('category_id')}}</span>
								</div>

								<div class="form-group{{$errors->has('pro_name')?' has-error':''}}">
									<label for="pro_name">Name</label>
									<input type="text" class='form-control' name='pro_name' id='pro_name' placeholder="Product Name" value='{{$product->pro_name}}'>
									<span class="text-danger">{{$errors->first('pro_name')}}</span>
								</div>

								<div class="form-group{{$errors->has('pro_code')?' has-error':''}}">
									<label for="pro_code">Code</label>
									<input type="text" class='form-control' name='pro_code' id='pro_code' placeholder="Product Code" value='{{$product->pro_code}}'>
									<span class="text-danger">{{$errors->first('pro_code')}}</span>
								</div>

								<div class="form-group{{$errors->has('pro_price')?' has-error':''}}">
									<label for="pro_price">Price</label>
									<input type="text" class='form-control' name='pro_price' id='pro_price' placeholder="Product Price" value='{{$product->pro_price}}'>
									<span class="text-danger">{{$errors->first('pro_price')}}</span>
								</div>

								<div class="form-group{{$errors->has('pro_info')?' has-error':''}}">
									<label for="pro_info">Information</label>
									<textarea name="pro_info" id="pro_info" class='form-control' rows="5" >{{$product->pro_info}}</textarea>
									<span class="text-danger">{{$errors->first('pro_info')}}</span>
								</div>

								<div class="form-group{{$errors->has('stock')?' has-error':''}}">
									<label for="stock">Stock</label>
									<input type="text" class='form-control' name='stock' id='stock' placeholder="Product Stock" value='{{$product->stock}}'>
									<span class="text-danger">{{$errors->first('stock')}}</span>
								</div>

								<div class="form-group{{$errors->has('image')?' has-error':''}}">
									<label for="image">Image</label>
									<input type="file" class='form-control' name='image' id='image' >
									<span class="text-danger">{{$errors->first('image')}}</span>
								</div>

								<div class="form-group{{$errors->has('spl_price')?' has-error':''}}">
									<label for="spl_price">Sale Price</label>
									<input type="text" class='form-control' name='spl_price' id='spl_price' placeholder="Product Sale Price" value='{{$product->spl_price}}'>
									<span class="text-danger">{{$errors->first('spl_price')}}</span>
								</div>
								<input type="submit" class="btn btn-primary" value='Submit'>
							</form>
						</div>
					</div>
				</main>	
			</div>
		</div>
	
@endsection