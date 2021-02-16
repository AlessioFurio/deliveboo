@extends('layouts.app')

@section('content')


<div class="container container-restaurant">
    <div class="row row-title">
        <h1>I tuoi Ristoranti:</h1>
    </div>
    <div class="row row-table">
        <div class="btn-add-restaurant">
            <a href="{{route('admin.restaurants.create')}}" class="btn btn-primary add-restaurant">Aggiungi Ristorante</a>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Indirizzo</th>
                    <th>Telefono</th>
                    <th>azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($restaurants as $restaurant)
                    <tr>
                        <td>{{$restaurant->id}}</td>
                        <td> <a href="{{route('admin.restaurants.show', ['restaurant' => $restaurant->id])}}">{{$restaurant->name}}</a></td>
                        <td>{{$restaurant->address}}</td>
                        <td>{{$restaurant->phone}}</td>
                        <td><a href="{{route('admin.restaurants.show' , ['restaurant' => $restaurant->id ] )}}" class="btn btn-primary">Dettagli</a></td>
                        <td><a href="{{route('admin.restaurants.edit' , ['restaurant' => $restaurant->id ] )}}" class="btn btn-warning">Modifica</a></td>
                        {{-- <td>
                            <form action="{{route('admin.restaurants.destroy' , ['restaurant' => $restaurant->id ] )}}" method="post">
                                <button type="submit" name="button" class="btn btn-danger">Elimina</button>
                                @csrf
                                @method('DELETE')
                            </form>
                        </td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>



    </div>
</div>


@endsection
