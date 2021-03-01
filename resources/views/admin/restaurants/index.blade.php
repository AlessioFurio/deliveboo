@extends('layouts.app')

@section('content')

    <div class="dashboard-restaurant-index">
        <div class="dashboard-header-restaurant-index">
            <h1>Dashboard</h1>
        </div>


        <div class="dashboard-body-content-restaurant-index">
            <div class="container-restaurant-index">
                <div class="title-restaurant-index">
                    <h1>I Tuoi Ristoranti</h1>
                </div>

                <div class="restaurants-index">
                    @foreach ($restaurants as $restaurant)
                    <div class="restaurant-card-index">
                        <div class="title-restaurant-card">
                            <h1>{{ $restaurant->name }}</h1>
                        </div>
                        <div class="cover-card">
                            @if ($restaurant->cover)
                                <img src="{{asset('storage/'. $restaurant->cover)}}" alt="{{$restaurant->name}}">
                            @else <img src="{{asset('images/img_non_disponibile.jpg')}}" alt="{{$restaurant->name}}">
                            @endif
                        </div>
                        <div class="body-restaurant-card-index">
                            <div class="details-restaurant-card-index">
                                <p>Indirizzo: <strong>{{ $restaurant->address }}</strong></p>
                                <p>Telefono: <strong>{{ $restaurant->phone }}</strong></p>
                            </div>
                            <div class="action-restaurant-card-index">
                                <div class="container-button-action-index">
                                    <a href="{{route('admin.restaurants.show' , ['restaurant' => $restaurant->id ] )}}" class="button-index button-dettagli-index">Piatti</a>
                                    <a href="{{route('admin.orders.details' , ['id' => $restaurant->id ] )}}" class="button-index button-ordini-index">Ordini</a>
                                    <a href="{{route('admin.restaurants.edit' , ['restaurant' => $restaurant->id ] )}}" class="button-index button-modifica-index">Modifica</a>
                                    {{-- <a href="{{route('admin.restaurants.destroy' , ['restaurant' => $restaurant->id ] )}}" class="button-index button-elimina-index">Elimina</a> --}}
                                    {{-- <div class="button-index button-elimina-index">
                                        <form action="{{route('admin.restaurants.destroy' , ['restaurant' => $restaurant->id ] )}}" method="post">
                                            <button type="submit" name="button" >Elimina</button>
                                            @csrf
                                            @method('DELETE')
                                            </form>

                                            </div> --}}
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
