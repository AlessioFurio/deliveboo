@extends('layouts.app')

@section('content')

  <div class="dashboard">
      <div class="dashboard-header">
        <a href="{{route('admin.home')}}">
          <h1>Dashboard</h1>
        </a>
      </div>
      <div class="dashboard-body">
        @include('layouts.layout-dashboard-body-menu')

          <div class="dashboard-body-content">
              <div class="container-restaurant-show">
                  <div class="row row-title">
                      <h1>
                        Dettagli ristorante
                      </h1>
                      <h2>
                        {{$restaurant->name}}
                      </h2>
                      <h3>
                        {{$restaurant->address}}
                      </h3>
                      <h4>
                        {{$restaurant->phone}}
                      </h4>
                      <a href="{{ route('admin.dishes.create', ['rest'=> $restaurant->id]) }}" class="btn btn-new">
                        Crea nuovo piatto
                      </a>
                      <a href="{{ route('admin.orders.index', ['rest'=> $restaurant->id]) }}" class="btn btn-new">
                        ordini
                      </a>
                  </div>

                  <h3>
                    I tuoi piatti:
                  </h3>
                  <div class="restaurants">

                      @foreach ($restaurant->dishes as $dish)
                        <div class="restaurant-card-show">
                          <div class="body-restaurant-card">
                            <h3>
                              {{$dish->name}}
                            </h3>
                            @if ($dish->cover)
                                <img src="{{asset('storage/'. $dish->cover)}}" alt="">
                            @endif

                            <div class="details-restaurant-card">
                              <div class="action-restaurant-card">
                                <div class="container-btn-action">
                                  <a class="btn btn-dettagli" href="{{ route('admin.dishes.show', ['dish' => $dish->id]) }}">
                                    Visualizza
                                  </a>
                                  <a class="btn btn-modifica" href="{{ route('admin.dishes.edit', ['dish' => $dish->id]) }}">
                                    Modifica
                                  </a>

                                  <form action="{{route('admin.dishes.destroy' , ['dish' => $dish->id ] )}}" method="post">
                                    <button type="submit" name="button" class="btn btn-elimina">Elimina</button>
                                    @csrf
                                    @method('DELETE')
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      @endforeach

                  </div>
              </div>
          </div>
      </div>
  </div>


@endsection
