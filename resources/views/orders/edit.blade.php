@extends('layouts.admin')

@section('content')
<form method="POST" id="payment-form" action="{{route('orders.edit', $order->id)}}">
  @csrf
  <div id="dropin-wrapper">
    <div id="checkout-message"></div>
    <div id="dropin-container"></div>
    {{-- <button class="btn btn-warning" id="submit-button">Submit payment</button>
  </div> --}}
  <input id="nonce" name="payment_method_nonce" type="hidden" />
  <div class="flex justify-center">
    <button
      class="disabled:opacity-75 button border-2 px-1 py-2 rounded-lg hover:bg-black hover:text-white hover:border-white"
      type="submit"><span>Paga Ora</span></button>
  </div>
</form>
<script src="https://js.braintreegateway.com/web/dropin/1.33.1/js/dropin.min.js"></script>

<script>
  var button = document.querySelector('#submit-button');
  var form = document.querySelector('#payment-form');
  var client_token = "{{$token}}";

  braintree.dropin.create({
    // Insert your tokenization key here
    authorization: 'sandbox_nd786x78_3928pc3krb84swd8',
    container: '#dropin-container'
  }, function (createErr, instance) {
  //   button.addEventListener('click', function () {
  //     instance.requestPaymentMethod(function (requestPaymentMethodErr, payload) {
  //       // When the user clicks on the 'Submit payment' button this code will send the
  //       // encrypted payment information in a variable called a payment method nonce
  //       $.ajax({
  //         type: 'POST',
  //         // url: '/orders/{order.id}/edit',
  //         data: {'paymentMethodNonce': payload.nonce}
  //       }).done(function(result) {
  //         // Tear down the Drop-in UI
  //         instance.teardown(function (teardownErr) {
  //           if (teardownErr) {
  //             console.error('Could not tear down Drop-in UI!');
  //           } else {
  //             console.info('Drop-in UI has been torn down!');
  //             // Remove the 'Submit payment' button
  //             $('#submit-button').remove();
  //           }
  //         });

  //         if (result.success) {
  //           $('#checkout-message').html('<h1>Success</h1><p>Your Drop-in UI is working! Check your <a href="https://sandbox.braintreegateway.com/login">sandbox Control Panel</a> for your test transactions.</p><p>Refresh to try another transaction.</p>');
  //         } else {
  //           console.log(result);
  //           $('#checkout-message').html('<h1>Error</h1><p>Check your console.</p>');
  //         }
  //       });
  //     });
  //   });
  if (createErr) {
  console.log('Create Error', createErr);
  return;
  }
  form.addEventListener('submit', function (event) {
  event.preventDefault();
  let button = document.querySelector('button');
  button.disabled=true;
  instance.requestPaymentMethod(function (err, payload) {
  if (err) {
  console.log('Request Payment Method Error', err);
  return;
  }
  // Add the nonce to the form and submit
  document.querySelector('#nonce').value = payload.nonce;
  form.submit();
  });
  });
  });
</script>
@endsection