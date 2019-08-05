          
<div id="cartbox">
  @if(isset($error))
    <div class="alert alert-danger">{{$error}}</div>
  @endif
  @if(isset($status))
    <div class="alert alert-success">
        {{$status}}
    </div>
  @endif
@if(!$cartItems->isEmpty())
  <table  class="table table-hover table-condensed" >
            <thead>
            <tr class="cart_menu" style='background-color: lightblue'>
              <th style="width:50%">Product</th>
              <th style="width:10%">Price</th>
              <th style="width:8%">Quantity</th>
              <th style="width:22%" class="text-center">Subtotal</th>
              <th style="width:10%"></th>
            </tr>
          </thead>
          
          <tbody>
            <?php $total=0 ?>
            
            @foreach($cartItems as $cartItem)
            <tr>
              <td data-th="Product">
                <div class="row">
                  <div class="col-sm-2 hidden-xs"><img src="{{url('images',$cartItem->options->img)}}" alt="..." class="img-fluid"/></div>
                  <div class="col-sm-10">
                    <h4 class="nomargin">{{$cartItem->name}}</h4>
                    <p>Stock : {{$cartItem->options->stock}}</p>
                  </div>
                </div>
              </td>
              <td data-th="Price">${{$cartItem->price}}</td>
              <td data-th="Quantity">
                <input type="number" class="form-control text-center" value="{{$cartItem->qty}}" id='{{$cartItem->rowId}}' >
                <input type='button' class="form-control btn btn-info btn-sm" onclick="updateItem('{{$cartItem->rowId}}')" value='Update'>
              </td>
              <td data-th="Subtotal" class="text-center">${{$cartItem->subtotal}}</td>
              <td class="actions" data-th="">
                <button class="btn btn-info btn-sm" href="" onclick="refreshItem()"><i class="fa fa-refresh"></i></button>
                <button class="btn btn-danger btn-sm"><a class="fa fa-trash-o" onclick="removeItem('{{$cartItem->rowId}}')"></a></button>                
              </td>
            </tr>
            <?php $total +=$cartItem->subtotal ?>
            
            @endforeach
            
          </tbody>
          <tfoot>
            
            <tr>
              <td><a href="{{url('/')}}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
              <td colspan="2" class="hidden-xs"></td>
              <td class="hidden-xs text-center"><strong>Total ${{$total}}</strong></td>
              <td><a href="{{url('checkout')}}" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
            </tr>
          </tfoot>
  </table>
@else
    <section id="cart_items">
        <div class="container">
            <div align="center">  <img src="{{asset('dist/img/empty-cart.png')}}"/></div>
        </div>
    </section>
@endif

</div>
