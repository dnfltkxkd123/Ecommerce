@extends('admin.master')
@section('title','Product List')
@section('content')
	<main class="col-sm-9 ml-sm-auto col-md-10 pt-3" style='margin-top:50px;'>
		
		<h3>Products</h3>

		<div class="dropdown show" style="display: inline-block;">
		  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		    Category
		  </a>

		  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
		  	<?php $categories = DB::table('categories')->get() ?>
		  	<a class="dropdown-item" href="{{route('product.index')}}">All</a>
		  	@foreach($categories as $category)
		    <a class="dropdown-item" href="{{url('admin/product/category',$category->id)}}">{{$category->name}}</a>
		    @endforeach
		  </div>
		</div>

		<div class="dropdown show" style="display: inline-block;">
		  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		    Dropdown link
		  </a>

		  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
		    <a class="dropdown-item" href="#">Action</a>
		    <a class="dropdown-item" href="#">Another action</a>
		    <a class="dropdown-item" href="#">Something else here</a>
		  </div>
		</div>

		<div class='table-responsive'>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Image</th>
						<th>Category</th>
						<th>Name</th>
						<th>Price</th>
						<th>Stock</th>
						<th>Delete</th>
						<th>Update</th>
					</tr>
				</thead>
				<tbody>
					@foreach($products as $product)
					<tr>
						<td><img src="{{url('images',$product->image)}}" alt="none image" width="80px"></td>
						<td>{{$product->category_id}}</td>
						<td>{{$product->pro_name}}</td>
						<td>${{$product->pro_price}}</td>
						<td>{{$product->stock}}</td>
						<td>
							<form action="{{route('product.destroy',$product->id)}}" method="post">
								{{csrf_field()}}
								{{method_field('DELETE')}}
								<input type="submit" class='btn btn-sm btn-danger' value='Delete'>
							</form>
						</td>
						<td>
							<a href="{{route('product.edit',$product->id)}}" class='btn btn-sm btn-success'>Update</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</main>
@endsection