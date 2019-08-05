<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('favicon.ico')}}">
    
    <title>@yield('title','page name')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('dist/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('dist/css/album.css')}}" rel="stylesheet">
  </head>

  <body>
@include('front.nav')
    @yield('content')
  
    @include('front.foot')
  <div class="container">
    
  </div>

  
  
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="{{asset("dist/js/jquery-slim.min.js")}}"><\/script>')</script>
    <script src="{{ asset('dist/js/popper.min.js') }}"></script>
    <script src="{{asset('dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('dist/js/holder.min.js')}}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
      function addItem(id){
        $.ajax({
          type: 'get',
          url: "{{asset('/cart/addItem')}}"+'/'+id,
          success: function (response) {
            alert('Added Item success');
            $('#cart').html(response);
          }
        });
      }
      function removeNavItem(id){
        $.ajax({
          type: 'get',
          url: "{{asset('/cart/removeNavCartItem')}}",
          data:'rowId='+id,
          success: function (response) {
            $('#cart').html(response);
          }
        });
      }
      
    </script>
  </body>
</html>