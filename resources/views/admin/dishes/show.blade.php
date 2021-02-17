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
                        <h1>Dettagli piatto</h1>
                    </div>

                    <div class="restaurants">
                      <div class="restaurant-card">
                        <div class="title-restaurant-card">
                          <h4>Nome piatto: </h4>
                          <h1>{{ $dish->name }}</h1>
                        </div>
                        <div class="body-restaurant-card">
                          <div class="details-restaurant-card">
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
