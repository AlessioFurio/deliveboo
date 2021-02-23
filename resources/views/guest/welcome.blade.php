@extends('layouts.app-guest')

@section('content')

    <section class="card-category">
        <div class="container-card-category">
            <div class="menu-filter">
                <h3 class="ricerca-avanzata">Ricerca Avanzata</h3>
                <select class="category-select" name="" v-model="selectedCategory">
                        <option value="">Categoria</option>
                            @foreach ($categories as $category)
                              <option :value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                    </select>
                    <button @click="searchRestaurants()" type="button" name="button">Cerca</button>
            </div>
            <div class="container-card">
                <div class="cards">
                    <div class="card" v-for="restaurant in restaurants">
                        <a :href="'{{url('/restaurants')}}'+'/'+ restaurant.slug">
                            <img v-if="restaurant.cover == null" src="{{url('/images/card.jpg')}}" alt="">
                            <img v-else :src="'{{url('/storage')}}' + '/' + restaurant.cover" alt="">
                            <p>@{{ restaurant.name }}</p>
                        </a>
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
