@extends('layouts.app')

  @section('content')

    <div class="dashboard-dishes-show">
        <div class="dashboard-header-dishes-show">
          <a href="{{route('admin.home')}}">
            <h1>Dashboard</h1>
          </a>
        </div>
        <div class="dashboard-body-dishes-show">
            <div class="dashboard-body-menu-dishes-show">
                <ul>
                    <li>
                        <a href="{{route('admin.restaurants.create')}}" >Aggiungi Ristorante</a>
                    </li>
                    <li>
                        <a href="{{route('admin.dishes.create')}}" >Aggiungi Piatto</a>
                    </li>
                </ul>
            </div>

            <div class="dashboard-body-content-dishes-show">
                <div class="container-restaurant-dishes-show">
                    <div class="title-dishes-show">
                        <h1>Dettagli piatto</h1>
                    </div>

                    <div class="dishes-show">
                      <div class="dishes-card-show">
                        <div class="title-dishes-card-show">
                          <h4>Nome piatto: </h4>
                          <h1>{{ $dish->name }}</h1>
                        </div>
                        <div class="cover-dishes">
                            @if ($dish->cover)
                                <img src="{{asset('storage/'. $dish->cover)}}" alt="">
                            @endif
                        </div>
                        <div class="body-dishes-card-show">
                          <div class="details-dishes-card-show">
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
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

  @endsection
