@extends('layouts.app')

@section('content')

  <div class="dashboard">
      <div class="dashboard-header">
        <a href="{{route('admin.home')}}">
          <h1>Dashboard</h1>
        </a>
      </div>
      <div class="dashboard-body">
          <div class="dashboard-body-menu">
              <ul>
                  <li>
                      <a href="{{route('admin.restaurants.create')}}" class="btn add-restaurant">Aggiungi Ristorante</a>
                  </li>
                  <li>
                      <a href="{{route('admin.dishes.create')}}" class="btn add-restaurant">Aggiungi Piatto</a>
                  </li>
              </ul>
          </div>

          <div class="dashboard-body-content">
              <div class="container-restaurant">
                  <div class="row row-title">
                      <h1>I tuoi piatti:</h1>
                  </div>
                  <div class="row">

                  </div>

                  <div class="restaurants">
                      @foreach ($restaurants as $restaurant)
                        @foreach  ($restaurant->dishes as $dish)

                          <div class="restaurant-card">
                            <div class="title-restaurant-card">
                              <h4>Nome piatto: </h4>
                              <h1>{{ $dish->name }}</h1>
                            </div>
                            <div class="body-restaurant-card">
                              <div class="details-restaurant-card">
                                  @if ($dish->cover)
                                      <img src="{{asset('storage/'. $dish->cover)}}" alt="{{$dish->name}}">
                                  @endif

                                <p>ID: <strong>{{ $dish->id }}</strong></p>
                                <p>Ingredienti:</p> <strong>{{ $dish->ingredients }}</strong></p>
                                <p>Portata:</p> <strong>{{ $dish->course->name }}</strong></p>
                                <p>Visibilita':</p>
                                @if ($dish->visibility)
                                  <strong>Disponibile</strong>
                                @else
                                  <strong>Non disponibile</strong>
                                @endif

                                <p>Prezzo:</p> <strong>{{ $dish->price }}</strong></p>
                              </div>
                              <div class="action-restaurant-card">
                                <div class="container-btn-action">
                                  <a href="{{route('admin.dishes.show' , ['dish' => $dish->id ] )}}" class="btn btn-dettagli">Dettagli</a>
                                  <a href="{{route('admin.dishes.edit' , ['dish' => $dish->id ] )}}" class="btn btn-modifica">Modifica</a>
                                  <form action="{{route('admin.dishes.destroy' , ['dish' => $dish->id ] )}}" method="post">
                                  <button class="btn btn-elimina" type="submit" name="button">Elimina piatto</button>
                                    @csrf
                                    @method('DELETE')
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                        @endforeach
                      @endforeach
                  </div>
              </div>
          </div>
      </div>
  </div>

@endsection
