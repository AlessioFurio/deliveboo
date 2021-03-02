@extends('layouts.app-guest')
@section('content')

  <main>
    <section class="how-to-order">
      <h1>
        Come ordinare:
      </h1>
      <div class="steps">
        <div class="step">
          <img src="{{url('/images/menu.png')}}" alt="">
          <h5>
            1. Scegli il ristorante
          </h5>
        </div>
        <div class="step">
          <img src="{{url('/images/order-food.png')}}" alt="">
          <h5>
            2. Seleziona i tuoi piatti preferiti
          </h5>
        </div>
        <div class="step">
          <img src="{{url('/images/food-delivery.png')}}" alt="">
          <h5>
            3. Attendi la consegna
          </h5>
        </div>
      </div>
    </section>
    <div class="container-restaurant">
      <div class="content-restaurant">
            <h1>
              {{$restaurant->name}}
            </h1>
        <div class="details-restaurant">
            <p>
                <i class="fas fa-map-marker-alt"></i>
                Indirizzo: <span>{{$restaurant->address}}</span>
            </p>
            <p>
                <i class="fas fa-phone-alt"></i>
                Telefono: <span>{{$restaurant->phone}}</span>
            </p>
        </div>
      </div>

      <div class="container-dish">
        <div class="container-list-dishes">

          <div v-for="product in dishesList" :key="product.id" class="card-dish">
            <h3 class="product__header">@{{ product.name }}</h3>
            <div class="wp-img-card-dish" :class="!product.visibility? 'dishnotavailable' : null">
                <img v-if="product.cover == null" src="{{url('/images/card.jpg')}}" alt="">
                <img v-else :src="'{{url ('/storage')}}' + '/' + product.cover" :alt="product.name" class="product__image">
            </div>
            <p class="product__description">@{{ product.description }}</p>
            <p class="">Prezzo: @{{ product.price }} €</p>

            <div class="cart" v-if="product.visibility">
                <button @click="updateCart(product, 'subtract'), cartBtnLessPlus()" class="cart__button">-</button>
                <span v-if="totalPrice != 0" class="cart__quantity">@{{ product.quantity }}</span>
                <span v-else class="cart__quantity">0</span>
                <button @click="updateCart(product, 'add'), cartBtnLessPlus()" class="cart__button">+</button>
            </div>
            <div class="" v-else>
                <h3>Attualmente non disponibile</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection
