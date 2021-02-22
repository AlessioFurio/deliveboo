@extends('layouts.app')

@section('chart-css')
  <link href="{{ asset('css/chart.css') }}" rel="stylesheet">
  <script src="https://js.braintreegateway.com/web/dropin/1.26.0/js/dropin.min.js"></script>
@endsection

@section('content')
  <div class="container">
    <div class="row">
      <div class="offset-2 col-8 order-md-1">
        <form id="payment-form" action="{{route('transaction')}}" method="post" class="needs-validation mt-5" novalidate>
          @csrf
          @method('POST')
          <h4 class="mb-3">Dati di consegna</h4>
          <div class="row">
            <div class="col-12 mb-3">
              <label>Nome</label>
              <input type="text" class="form-control" id="firstName" placeholder="Inserisci il tuo nome" value="" name="nome" required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
              <label>Cognome</label>
              <input type="text" class="form-control" id="lastName" placeholder="Inserisci il tuo cognome" value="" name="cognome" required>
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
              <label>Indirizzo</label>
              <input type="text" class="form-control" id="address" placeholder="Inserisci l'indirizzo di consegna" name="indirizzo" required>
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12 mb-3">
              <div id="dropin-container"></div>
              <input type="submit" value="Paga ora"/>
              <input type="hidden" id="nonce" name="payment_method_nonce"/>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    const form = document.getElementById('payment-form');

    braintree.dropin.create({
      authorization: '{{$clientToken}}',
      container: '#dropin-container'
    }, (error, dropinInstance) => {
      if (error) console.error(error);

      form.addEventListener('submit', event => {
        event.preventDefault();

        dropinInstance.requestPaymentMethod((error, payload) => {
          if (error) console.error(error);

          document.getElementById('nonce').value = payload.nonce;
          form.submit();
        });
      });
    });
  </script>
@endsection
