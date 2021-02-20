@extends('layouts.app')

@section('content')

  <div class="dashboard-restaurant-show">
      <div class="dashboard-header-restaurant-show">
        <a href="{{route('admin.home')}}">
          <h1>Dashboard</h1>
        </a>
      </div>
      <div class="dashboard-body-restaurant-show">

          <div class="dashboard-body-menu-restaurant-show">
              <ul>
                  <li>
                      <a href="{{route('admin.restaurants.index')}}" >I Tuoi Ristoranti</a>
                  </li>
                  <li>
                      <a href="{{route('admin.restaurants.create')}}" >Aggiungi Ristorante</a>
                  </li>
                  {{-- <li>
                      <a href="{{route('admin.dishes.create')}}" class="btn add-restaurant">Aggiungi Piatto</a>
                  </li> --}}
              </ul>
          </div>

          <div class="dashboard-body-content-restaurant-show">
              <div class="container-restaurant-show">
                  <div class="title-restaurant-show">
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
                      <a href="{{ route('admin.dishes.create', ['rest'=> $restaurant->id]) }}" class="show button-new-show">
                        Crea nuovo piatto
                      </a>
                      <a href="{{ route('admin.orders.details', ['id'=> $restaurant->id]) }}" class="show button-new-show">
                        ordini
                      </a>
                  </div>

                  <h3>
                    I tuoi piatti:
                  </h3>
                  <div class="restaurants-show">

                      @foreach ($restaurant->dishes as $dish)
                        <div class="restaurant-card-show">
                          <div class="body-restaurant-card-show">
                            <h3>
                              {{$dish->name}}
                            </h3>
                            @if ($dish->cover)
                                <img src="{{asset('storage/'. $dish->cover)}}" alt="">
                            @endif

                            <div class="details-restaurant-card-show">
                              <div class="action-restaurant-card-show">
                                <div class="container-btn-action-show">
                                  <a class="button-show button-dettagli-show" href="{{ route('admin.dishes.show', ['dish' => $dish->id]) }}">
                                    Visualizza
                                  </a>
                                  <a class="button-show button-modifica-show" href="{{ route('admin.dishes.edit', ['dish' => $dish->id]) }}">
                                    Modifica
                                  </a>

                                  <form action="{{route('admin.dishes.destroy' , ['dish' => $dish->id ] )}}" method="post">
                                    <button type="submit" name="button" class="button-show button-elimina-show">Elimina</button>
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
