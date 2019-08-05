@extends('admin.master')
@section('title','Product Categories')
@section('content')
	<main class='col-sm-9 ml-sm-auto col-md-10 pt-3' role='main'>
		<h3 style='text-decoration: underline; margin-top:50px;'>Product Category</h3><br>
		<a href="" class='navbar-brand'>Categories =></a>
		<ul class='nav navbar-nav'>
			@if(!empty($categories))
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th style='width:33%'>Category ID</th>
								<th style='width:33%'>Category Name</th>
								<th style='width:33%'>Update</th>
							</tr>
						</thead>
						<tbody>
						@forelse($categories as $category)
							<tr>
								<td>{{$category->id}}</td>
								<td>{{$category->name}}</td>
								<td>
									<form action="{{ route('category.update',$category->id) }}" method='post'>
										{{csrf_field()}}
										{{method_field('PUT')}}
										<input type="text" name='name' placeholder="{{$category->name}}">
										<button type='submit' class='btn btn-primary'>Save</button>
									</form>
								</td>
							</tr>
						@empty
							<li>No Category</li>
						@endforelse
						</tbody>
					</table>
				</div>	
			@endif
		</ul>
		<br><br>
		<form action="{{route('category.store')}}" method='post' role='form'>
			{{csrf_field()}}
			<div class='form-group'>
				<label for="name">Category name:</label>
				<input type="text" class='form-control' name='name' id='' placeholder="Category">
			</div>
			<button type='submit' class='btn btn-primary'>Add Category</button>
		</form>
	</main>
@endsection