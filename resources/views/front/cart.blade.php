		<li class="nav-item dropdown">  
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{url('dist/img/shopping-cart.png')}}" with='25px' height='25px' alt=""> (<span style='color:red'>{{Cart::content()->count()}}</span>)</a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            @if(Session::has('cart'))
            <?php
              $cartItems = Cart::content();
            ?>
            @foreach($cartItems as $cartItem)
            
            <li class="dropdown-item" >
              <span class="item">
                <span class="item-left">
                  <img src="{{url('images',$cartItem->options->img)}}" with='60px' height='60px' alt="" / style='margin:0 auto;border: solid black 1px;'><!--http://www.prepbootstrap.com/Content/images/template/menucartdropdown/item_1.jpg-->
                  &nbsp
                  <span class="item-info mr-sm-2" style='display: inline-block;' >
                    <strong>{{$cartItem->name}}</strong><br>
                    <span>price: ${{$cartItem->price}}</span>
                  </span>
                </span>
                
                <span class="item-right" style='margin-left: 50px;'>
                  <!--<button class="btn btn-danger  fa fa-close" onclick="removeNavItem('{{$cartItem->rowId}}')">X</button>-->
                </span>
            	
              </span>
            </li>
            @endforeach
            @endif
            <div class="dropdown-divider"></div>
            <li><a class="dropdown-item" href="{{url('cart/index')}}">View Cart</a></li>
          </ul>
        </li>