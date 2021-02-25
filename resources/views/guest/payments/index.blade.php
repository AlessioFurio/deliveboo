@extends('layouts.app')

@section('chart-css')
  <link href="{{ asset('css/chart.css') }}" rel="stylesheet">
  <script src="https://js.braintreegateway.com/web/dropin/1.26.0/js/dropin.min.js"></script>
@endsection

@section('content')
<div id="root">
  <div class="container-fluid">
    <div class="row">
      <div class="cart-flex offset-sm-1 col-sm-10 offset-md-2 col-md-6 order-md-1">
        <form id="payment-form" action="{{route('transaction')}}" method="post" class="needs-validation mt-5" @submit="Save">
          @csrf
          @method('POST')
          <h4 class="mb-3">Dati di consegna</h4>
          <div class="row">
            <div class="col-sm-12 mb-3">
              <input v-if="cartCookie.length" type="text" name="price" :value="parseFloat(totalPrice)" hidden>
              <input v-if="cartCookie.length" type="text" name="restaurant_id" :value="parseFloat(cartCookie[0].restaurant_id)" hidden>
              <label>Nome</label>
              <input v-model="nome" type="text" class="form-control" id="firstName" placeholder="Inserisci il tuo nome" value="" name="nome" required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
              <label>Cognome</label>
              <input v-model="cognome" type="text" class="form-control" id="lastName" placeholder="Inserisci il tuo cognome" value="" name="cognome" required>
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
              <label>Indirizzo</label>
              <input v-model="indirizzo" type="text" class="form-control" id="address" placeholder="Inserisci l'indirizzo di consegna" name="indirizzo" required>
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>

            </div>
          </div>
          <div class="row">
            <div class="col-sm-12 mb-3">
              <div id="dropin-container"></div>
              {{-- <input type="submit" value="Paga ora"/> --}}
              {{-- <button @click="provaLog()" type="button" name="button">prova cookie</button> --}}
               <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
              <input type="hidden" id="nonce" name="payment_method_nonce"/>
            </div>
          </div>
        </form>
        <div v-cloak class="cartpay mt-5" v-if="cartCookie.length">
            <div class="wp-image-cart">
                <span class="total-quantity"></span>
                <div v-cloak class="cart-dropdown">
                    <ul class="cart-dropdown-list">
                        <h4 class="mb-3">Carrello</h4>
                            <label>Riepilogo</label>
                            <div class="border-cart">

                            <div v-for="product in cartCookie" :key="product.id" >
                                <li >@{{ product.name }} (@{{ product.quantity }})</li>
                                <div class="cart">
                                    <button @click="updateCart(product, 'subtract'), cartBtnLessPlus()" class="cart__button">-</button>
                                    <span class="cart__quantity">@{{ product.quantity }}</span>
                                    <button @click="updateCart(product, 'add'), cartBtnLessPlus()" class="cart__button">+</button>
                                </div>
                        </div>
                        </div>
                        <li class="border-cart">Prezzo totale: <span>@{{Math.round(totalPrice * 100)/100}} €</span></li>
                    </ul>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

  <script type="text/javascript">

    braintree.dropin.create(
    {
      authorization: '{{$clientToken}}',
      container: '#dropin-container'
    },
    (error, dropinInstance) =>
    {
      if (error) console.error(error);
      window.dropinInstance = dropinInstance; //salvo la dropinInstance nella window(finestra del browser) cioe' lo scope globale che e' accessibile da qualsiasi funzione js (variabile globale)

      // form.addEventListener('submit', event => {
      //   event.preventDefault(); //non serve perche' sul submit stiamo chiamando la save
      //
      //   dropinInstance.requestPaymentMethod((error, payload) =>
      //   {
      //     if (error) console.error(error);
      //
      //     document.getElementById('nonce').value = payload.nonce;
      //     form.submit();
      //   });
      // });
    });
  // });

  </script>
  @include('partials.footer')

  <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js" charset="utf-8"></script>

@endsection
