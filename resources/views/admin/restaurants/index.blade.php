@extends('layouts.app')

@section('content')


<div class="container container-restaurant">
    <div class="row row-title">
        <h1>I tuoi Ristoranti:</h1>
    </div>

    <div class="row row-table">
        <div class="btn-add-restaurant">
            <a href="{{route('admin.restaurants.create')}}" class="btn add-restaurant">Aggiungi Ristorante</a>
        </div>

        {{-- <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Indirizzo</th>
                    <th>Telefono</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($restaurants as $restaurant)
                    <tr>
                        <td>{{$restaurant->id}}</td>
                        <td> <a href="{{route('admin.restaurants.show', ['restaurant' => $restaurant->id])}}">{{$restaurant->name}}</a></td>
                        <td>{{$restaurant->address}}</td>
                        <td>{{$restaurant->phone}}</td>

                        {{-- <td>
                            <form action="{{route('admin.restaurants.destroy' , ['restaurant' => $restaurant->id ] )}}" method="post">
                                <button type="submit" name="button" class="btn btn-danger">Elimina</button>
                                @csrf
                                @method('DELETE')
                            </form>
                        </td> --}} {{--
                    </tr>
                    <tr>
                        <td><a href="{{route('admin.restaurants.show' , ['restaurant' => $restaurant->id ] )}}" class=" btn btn-dettagli">Dettagli</a></td>
                        <td><a href="{{route('admin.restaurants.edit' , ['restaurant' => $restaurant->id ] )}}" class="btn btn-warning btn-modifica">Modifica</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table> --}}

        <div class="restaurants">
            @foreach ($restaurants as $restaurant)
            <div class="restaurant-card">

                <div class="title-restaurant-card">
                    <p>Nome Ristorante: <strong>{{  $restaurant->name }}</strong></p>
                </div>

                <div class="body-restaurant-card">
                    <div class="details-restaurant-card">
                        <h3>ID:</h3>
                        <h3>Indirizzo:</h3>
                        <h3>Telefono:</h3>
                    </div>
                    <div class="action-restaurant-card">
                        <div class="container-btn-action">
                            <a href="{{route('admin.restaurants.show' , ['restaurant' => $restaurant->id ] )}}" class=" btn btn-dettagli">Dettagli</a>
                            <a href="{{route('admin.restaurants.edit' , ['restaurant' => $restaurant->id ] )}}" class="btn btn-warning btn-modifica">Modifica</a>
                        </div>
                    </div>
                </div>

            </div>
            @endforeach
        </div>
    </div>
</div>


@endsection
