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
                              <h4>piatto</h4>
                              <h1>{{ $dish->name }}</h1>
                            </div>
                            <div class="cover-dishes">
                                @if ($dish->cover)
                                    <img src="{{asset('storage/'. $dish->cover)}}" alt="">
                                @endif
                            </div>
                            <div class="body-dishes-card-show">
                              <div class="details-dishes-card-show">
                                <p>ID: <span>{{ $dish->id }}</span></p>
                                <p>Ingredienti: <span>{{ $dish->ingredients }}</span></p>
                                <p>Portata: <span>{{ $dish->course->name }}</span></p>
                                <p>Visibilita':
                                @if ($dish->visibility)
                                  <span>Disponibile</span>
                                @else
                                  <span>Non disponibile</span>
                                @endif
                                </p>
                                <p>Prezzo: <span>{{ $dish->price }}€</span></p>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
