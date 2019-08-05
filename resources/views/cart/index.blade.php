@extends('front.master')
@section('title','Cart Page')
@section('content')
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet"> 

<br><br>
  <div class="container">
    @include('cart.update')
  </div>

<script>
  function updateItem(rowId){
    qty = $('#'+rowId).val();
    //alert(qty);
    if(qty<=0){
      alert('enter only valid qty');
    }else{
      $.ajax({
        type: 'get',
        url: "{{asset('/cart/updateItem')}}",
        data: "qty=" + qty + "& rowId=" + rowId,
        success: function (response) {
          console.log(response);
          $('#cartbox').html(response);
        }
      });
    }
    
  }

  function refreshItem(){
    $.ajax({
        type: 'get',
        url: "{{asset('/cart/refreshItem')}}",
        success: function (response) {
          console.log(response);
          $('#cartbox').html(response);
        }
    });
  }

  function removeItem(rowId){
    $.ajax({
        type: 'get',
        url: "{{asset('/cart/removeItem')}}",
        data: "rowId=" + rowId,
        success: function (response) {
          console.log(response);
          $('#cartbox').html(response);
        }
    });
    getNav()
  }

  function getNav(){
        $.ajax({
          type: 'get',
          url: "{{asset('/cart/getNav')}}",
          success: function (response) {
            $('#cart').html(response);
          }
        });
    }
</script>
@endsection
