@extends('layouts.app')
@section('content')
    <div id="root">

        <button @click="provalog()" type="button" name="button">LOG PROVA</button>
        <h1>
          {{$restaurant->name}}
        </h1>
        <h3>
          {{$restaurant->address}}
        </h3>

        <br>
        <br>

        <section class="products">
            <button @click="aggiornaCarrello()" type="button" name="button">Aggiorna Carrello</button>
            <div class="cart">
                <button @click="showCart = !showCart" type="button" name="button">
                    <i class="fas fa-shopping-cart"></i>
                </button>
                <span class="total-quantity">@{{ totalQuantity }}</span>
                <div v-if="showCart" class="cart-dropdown">
                    <ul class="cart-dropdown-list">
                        <li v-for="product in cart" :key="product.id">@{{ product.name }} @{{ product.quantity }}</li>
                    </ul>
                </div>
            </div>

            <div v-for="product in dishesList" :key="product.id" class="product">
                <h3 class="product__header">@{{ product.name }}</h3>
                <img src="https://via.placeholder.com/150" :alt="product.name" class="product__image">
                <p class="product__description">@{{ product.description }}</p>

                <div class="cart">
                    <button @click="updateCart(product, 'subtract'), cartBtnLessPlus()" class="cart__button">-</button>
                    <span class="cart__quantity">@{{ product.quantity }}</span>
                    <button @click="updateCart(product, 'add'), cartBtnLessPlus()" class="cart__button">+</button>
                </div>
            </div>
        </section>

        <br>

        {{-- <ul>

          @foreach ($restaurant->dishes as $dish)
            <li>
                <a href="#">
                    <div class="">
                        <h2>
                        {{$dish->name}}
                        </h2>
                        <em>
                        {{$dish->ingredients}}
                        </em>
                        <h3>
                        {{$dish->price}}
                        </h3>
                        <div class="cart-less-plus">
                            <button @click="updateCart(product, 'subtract')" class="cart-button" type="button" name="button">-</button>
                            <span class="cart-quantity">0</span>
                            <button @click="updateCart(product, 'add')" class="cart-button" type="button" name="button">+</button>
                        </div>
                    </div>
                </a>
            </li>
            <br>
          @endforeach
        </ul> --}}
    </div>

@endsection
