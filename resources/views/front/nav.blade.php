<?php use Illuminate\Support\Facades\Auth; ?>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet"> 
<div id='nav'>
  <nav class="navbar navbar-expand-md navbar-dark" style="background-color:#0c5460">
    <a class="navbar-brand" href="{{route('home')}}" ><img src="{{url('images/nav.png')}}" alt="" width='90px' height="30px"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{{route('home')}}">Home <span class="sr-only">(current)</span></a>
        </li>
        <!--
        <li class="nav-item">
          <a class="nav-link" href="#">Shop</a>
        </li>
      -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Categories
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php $categories = DB::table('categories')->get() ?>
            @foreach($categories as $category)
              <!--<div class="dropdown-divider"></div>-->
              <a class="dropdown-item" href="{{url('category',$category->id)}}">{{$category->name}}</a>

            @endforeach
          </div>
        </li>
        <!--
        <li class="nav-item">
          <a class="nav-link" href="{{route('contact')}}">Contact</a>
        </li>
      -->
        @if(!Auth::user())
        @else
        @endif
        <?php $user = DB::table('users')->find(Auth::id())?>
        @if(isset($user->admin))
        <li>
          <a class="nav-link" href="{{route('admin')}}" >Admin</a>
        </li>
        @endif
        <li class="nav-item">
          <a class="nav-link" href="{{url('profile')}}" >Profile</a>
        </li>
        @if(!Auth::user())
        <li class="nav-item">
          <a class="nav-link" href="{{route('login')}}" >Log in</a>
        </li>
        @else
        <li class="nav-item">
          <a class="nav-link" href="{{route('log_out')}}" >Log out</a>
        </li>
        @endif
        <!--
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Profile
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            @if(!Auth::user())
            <a class="dropdown-item" href="{{route('login')}}" >Log in</a>
            @else
            <a class="dropdown-item" href="{{route('log_out')}}" >Log out</a>
            @endif
            <a class="dropdown-item" href="{{url('profile')}}">profile</a>
          </div>
        </li>
-->
        <!--test-->
        <div id='cart'>
          @include('front.cart')
        </div>
        <!--test-->
      </ul>
      <form class="form-inline my-2 my-lg-0" action="{{route('search')}}">
        <input class="form-control mr-sm-2" type="search" placeholder="Search Product" aria-label="Product Search" name='search'>
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>
</div>
