<!--
  <input type="hidden" name="cmd" value="_cart">
  <input type="hidden" name='upload' value='1'>
  <input type="hidden" name="business" value="dnfltkxkd123@naver.com">
  <?php $count=0; ?>
  @foreach($cartItems as $cartItem)
  <?php $count++; ?>
  <input type="hidden" name="item_name_{{$count}}" value="{{$cartItem->name}}">
  <input type="hidden" name="item_number_{{$count}}" value="{{$cartItem->id}}">
  <input type="hidden" name='quantity_{{$count}}' value='{{$cartItem->qty}}'>
  <input type="hidden" name="amount_{{$count}}" value="{{$cartItem->price}}">
  <input type="hidden" name="shipping_{{$count}}" value="0">
  
  @endforeach
  <input type="image" name="submit"
    src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/blue-rect-paypalcheckout-34px.png"
    vallue='PayPal'
    formaction="https://www.paypal.com/cgi-bin/webscr" 
    alt="PayPal - The safer, easier way to pay online">

-->
<div id="paypal-button-container"></div>
    <!-- Include the PayPal JavaScript SDK -->
<script src="https://www.paypal.com/sdk/js?client-id=sb&currency=USD"></script>
<script>

        // Render the PayPal button into #paypal-button-container
        paypal.Buttons({

            // Set up the transaction
            createOrder: function(data, actions) {
                
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '{{$total}}'
                        }
                    }]
                });
                
            },
            // Finalize the transaction
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    // Show a success message to the buyer
                    alert('Transaction completed by ' + details.payer.name.given_name + '!');
                   
                    var form = $('#formData')[0];
                    var data = new FormData(form);
                    $.ajax({
                      type: 'POST',
                      url: "http://localhost:8000/purchase",
                      data:data,
                      processData: false,
                      contentType: false,
                      success: function (response) {
                        form.submit();
                        //console.log(response)
                      },
                      error: function (e) {
                        console.log("ERROR : ", e);
                      }
                    });

                });
            }
        }).render('#paypal-button-container');

        function check(){
          var form = $('#formData')[0];
          var data = new FormData(form);
          $.ajax({
            type: 'get',
            url: "http://localhost:8000/check",
            data:data,
            success: function (response) {
              return response
            },
            error: function (e) {
              return "ERROR : "+ e;
            }
          });
        }
</script>