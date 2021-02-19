@extends('layouts.app')

@section('content')

  <div class="dashboard-dishes-index">
      <div class="dashboard-header-dishes-index">
        <a href="{{route('admin.home')}}">
          <h1>Dashboard</h1>
        </a>
      </div>
      <div class="dashboard-body-dishes-index">
          <div class="dashboard-body-menu-dishes-index">
              <ul>
                  <li>
                      <a href="{{route('admin.restaurants.create')}}" >Aggiungi Ristorante</a>
                  </li>
                  <li>
                      <a href="{{route('admin.dishes.create')}}">Aggiungi Piatto</a>
                  </li>
              </ul>
          </div>

          <div class="dashboard-body-content-dishes-index">
              <div class="container-dishes-index">
                  <div class="title-dishes-index">
                      <h1>I tuoi piatti:</h1>
                  </div>

                  <div class="dishes-index">
                      @foreach ($restaurants as $restaurant)
                        @foreach  ($restaurant->dishes as $dish)

                          <div class="dishes-card-index">
                            <div class="title-dishes-card">
                              <h4>Nome piatto: </h4>
                              <h1>{{ $dish->name }}</h1>
                            </div>
                            <div class="body-dishes-card">
                              <div class="details-dishes-card">
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
                              <div class="action-dishes-card">
                                <div class="container-button-action-dishes">
                                  <a href="{{route('admin.dishes.show' , ['dish' => $dish->id ] )}}" class="button-dishes-index button-dettagli-dishes-index">Dettagli</a>
                                  <a href="{{route('admin.dishes.edit' , ['dish' => $dish->id ] )}}" class="button-dishes-index button-modifica-dishes-index">Modifica</a>
                                  <form action="{{route('admin.dishes.destroy' , ['dish' => $dish->id ] )}}" method="post">
                                  <button class="button-dishes-index button-elimina-dishes-index" type="submit" name="button">Elimina piatto</button>
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
