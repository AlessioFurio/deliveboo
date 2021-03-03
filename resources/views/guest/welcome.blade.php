@extends('layouts.app-guest')

@section('content')

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

  <section class="card-category">
      <div class="container-card-category">
          <div class="menu-filter">
              <h3 class="ricerca-avanzata">Seleziona una categoria</h3>
              <div class="selection">
                <select @change="searchRestaurants()" class="category-select" name="" v-model="selectedCategory">
                  <option value="">Tutte le categorie</option>
                  @foreach ($categories as $category)
                    <option :value="{{$category->id}}">{{$category->name}}</option>
                  @endforeach
                </select>
          </div>
          <div class="container-card">

              <h1>Ultimi Ristoranti Inseriti</h1>
              <div class="cards">
                  <div class="card" v-for="restaurant in restaurants">
                      <a :href="'{{url('/restaurants')}}'+'/'+ restaurant.slug">
                          <img v-if="restaurant.cover == null" src="{{url('/images/image-non-disp.png')}}" alt="">
                          <img v-else :src="'{{url('/storage')}}' + '/' + restaurant.cover" alt="">
                          <p>@{{ restaurant.name }}</p>
                      </a>
                      <div class="card-restaurant-details">
                          <p><i class="fas fa-phone-alt"></i>@{{restaurant.phone}}</p>
                          <p><i class="fas fa-map-marker-alt"></i>@{{restaurant.address}}</p>
                          <div class="see-restaurant">
                              <a :href="'{{url('/restaurants')}}'+'/'+ restaurant.slug">Visita Ristorante</a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>


  @if ($transaction_result)
    <div id="myModal" class="modal" @click="closeModalOnWindow()">
      <div class="modal-content">
        <span @click="closeModal()" class="close">&times;</span>
        <div class="result">
          <i class="fas fa-check-circle fa-9x"></i>
          <h2 class="mt-3">
            Pagamento riuscito
          </h2>
          <h3 class="mt-3 mb-3">
            Il tuo ordine e' stato inviato al ristorante
          </h3>
        </div>
      </div>
    </div>
  @elseif ($transaction_result == null)

  @else
    <div id="myModal" class="modal" @click="closeModalOnWindow()">
     <div class="modal-content">
        <span @click="closeModal()" class="close">&times;</span>
        <div class="result">
          <i class="fas fa-times-circle fa-9x"></i>
          <h2 class="mt-3 mb-3">
            Pagamento non riuscito
          </h2>
        </div>
      </div>
    </div>
  @endif

@endsection
