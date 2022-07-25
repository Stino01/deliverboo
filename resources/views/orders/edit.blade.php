@extends('layouts.admin')

@section('content')
<form method="POST" id="payment-form" action="{{route('orders.update', $order->id)}}">
  @csrf
  @method('PUT')
  <h1 class="text-center text-2xl text-gray-800">Pagamento di: <span class="uppercase block">{{$order->name}} -
      {{$order->surname}}</span>
  </h1>
  <section class="mt-6 mb-3">
    <label for="amount" class="flex justify-center space-x-2">
      <span class="input-label text-gray-800 text-lg">Prezzo:</span>
      <span class="text-lg text-gray-800">{{$order->total_price}} &euro; </span>
    </label>

    <div class="bt-drop-in-wrapper">
      <div id="bt-dropin"></div>
    </div>
  </section>

  <input id="nonce" name="payment_method_nonce" type="hidden" />
  <div class="flex justify-center">
    <button
      class="disabled:opacity-75 button border-2 px-1 py-2 rounded-lg hover:bg-black hover:text-white hover:border-white"
      type="submit"><span>Paga Ora</span></button>
  </div>


</form>
<script src="https://js.braintreegateway.com/web/dropin/1.33.1/js/dropin.min.js"></script>

<script>
  // var button = document.querySelector('#submit-button');
  var form = document.querySelector('#payment-form');
  var client_token = "{{$token}}";

  braintree.dropin.create({
    // Insert your tokenization key here
    authorization: 'sandbox_nd786x78_3928pc3krb84swd8',
    selector: '#bt-dropin',
    // container: '#dropin-container'
  }, function (createErr, instance) {
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