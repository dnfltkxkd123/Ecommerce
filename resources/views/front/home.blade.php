@extends('front.master')
@section('title','Ecommer Shop')
@section('content')
<main role="main">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="{{url('dist/img/1.jpg')}}" class="d-block w-100" alt="..." height='300px'>
          </div>
          <div class="carousel-item">
            <img src="{{url('dist/img/2.jpeg')}}" class="d-block w-100" alt="..." height='300px'>
          </div>
          <div class="carousel-item">
            <img src="{{url('dist/img/3.jpg')}}" class="d-block w-100" alt="..." height='300px'>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      
      <div class="album py-5 bg-light">
        <div class="container">

          @if(isset($categoryName))
          <h4>Category {{$categoryName}}</h4>
          @endif
          @if(isset($search))
          <h4>Search: {{$search}}</h4>
          @endif
          <br>
          @if(isset($submenus))
          <ul class="nav">
            @foreach($submenus as $submenu)
              <li class="nav-item">
                <a class="nav-link active" href="#">Active</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
              </li>
            @endforeach
          </ul>
          @endif
          <br>
          <div class="row">
            @forelse($products as $product)
            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <img class="card-img-top" src="{{url('images',$product->image)}}" alt="Card image cap">
                <div class="card-body">
                  <span class='price text-muted float-left'><strong>{{$product->pro_name}}</strong></span>
                  <br>
                  <del>$ {{$product->pro_price}}</del>
                  <span class='price text-muted float-right'>$ {{$product->spl_price}}</span>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="{{url('product',$product->id)}}" class="btn btn-sm btn-outline-secondary">View Product</a>
                      <a onclick="addItem('{{$product->id}}')" class="btn btn-sm btn-outline-secondary js-cd-add-to-cart">Add to Cart</a>
                    </div>
                    <small class="text-muted">9min</small>
                  </div>
                </div>
              </div>
            </div>
            @empty
            <h3>&nbsp No Products</h3>
            @endforelse
          </div>
          
            {{ $products->links() }}
          
        </div>
      </div>
    </main>
@endsection