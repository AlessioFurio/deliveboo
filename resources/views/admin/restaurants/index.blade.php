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
            </ul>
        </div>

        <div class="dashboard-body-content">
            <div class="container-restaurant">
                <div class="row row-title">
                    <h1>I tuoi Ristoranti:</h1>
                </div>
                <div class="row">

                </div>

                <div class="restaurants">
                    @foreach ($restaurants as $restaurant)
                    <div class="restaurant-card">
                        <div class="title-restaurant-card">
                            <h4>Nome ristorante: </h4>
                            <h1>{{ $restaurant->name }}</h1>
                        </div>
                        <div class="body-restaurant-card">
                            <div class="details-restaurant-card">
                                <p>ID: <strong>{{ $restaurant->id }}</strong></p>
                                <p>Indirizzo: <strong>{{ $restaurant->address }}</strong></p>
                                <p>Telefono:</p> <strong>{{ $restaurant->phone }}</strong></p>
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
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
