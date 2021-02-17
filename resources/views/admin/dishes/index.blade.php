@extends('layouts.app')

@section('content')

  <div class="dashboard">
      <div class="dashboard-header">
          <h1>Dashboard</h1>
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
                              <h4>Nome ristorante: </h4>
                              <h1>{{ $dish->name }}</h1>
                            </div>
                            <div class="body-restaurant-card">
                              <div class="details-restaurant-card">

                                <p>ID: <strong>{{ $dish->id }}</strong></p>
                                <p>Nome piatto: <strong>{{ $dish->name }}</strong></p>
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
                                  <a href="{{route('admin.restaurants.show' , ['restaurant' => $restaurant->id ] )}}" class="btn btn-primary btn-dettagli">Dettagli</a>
                                  <a href="{{route('admin.restaurants.edit' , ['restaurant' => $restaurant->id ] )}}" class="btn btn-warning btn-modifica">Modifica</a>
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
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h1>I tuoi piatti</h1>
                <a href="{{ route('admin.dishes.create') }}" class="btn btn-primary">
                    Crea nuovo piatto
                </a>
            </div>


            <table class="table-dishes">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Ingredients</th>
                        <th class="">Portata</th>
                        <th class="">Visibility</th>
                        <th class="">Prezzo</th>
                        <th class="text-center">Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($restaurants as $restaurant)
                            @foreach ($restaurant->dishes as $dish)
                                <tr>

                                <td>{{ $dish->id }}</td>
                                <td>{{ $dish->name }}</td>
                                <td>{{ $dish->ingredients }}</td>
                                <td>{{ $dish->course->name }}</td>
                                <td>{{ $dish->visibility }}</td>
                                <td>{{ $dish->price }}</td>
                                <td><a class="btn btn-info mr-2" href="{{ route('admin.dishes.show', ['dish' => $dish->id]) }}">Visualizza piatto</a></td>
                                <td><a class="btn btn-info mr-2" href="{{ route('admin.dishes.edit', ['dish' => $dish->id]) }}">Modifica piatto</a></td>
                                <td>
                                    <form action="{{route('admin.dishes.destroy' , ['dish' => $dish->id ] )}}" method="post">
                                        <button type="submit" name="button" class="btn btn-danger">Elimina piatto</button>
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div> --}}
@endsection
