@extends('layouts.app')

@section('content')
{{--
<div class="container">
    <div class="row">
        <h1>I tuoi Ristoranti:</h1>
    </div>
</div>
<ul>

@foreach ($restaurants as $restaurant)
    <li>
        {{$restaurant->name}} - - - -
        <a href="{{route('admin.restaurants.show' , ['restaurant' => $restaurant->id ] )}}">visualizza</a>
        <a href="{{route('admin.restaurants.edit' , ['restaurant' => $restaurant->id ] )}}">Modifica</a>
            <form action="{{route('admin.restaurants.destroy' , ['restaurant' => $restaurant->id ] )}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" name="button" >Elimina</button>
            </form>

    </li>

@endforeach

</ul> --}}

<div class="container">
    <div class="row">
        <h1>I tuoi Ristoranti:</h1>
    </div>
    <div class="row">
        <div class="text-center">
            <a href="{{route('admin.restaurants.create')}}" class="btn btn-primary">Aggiungi Ristorante</a>
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
                        <td>
                            <form action="{{route('admin.restaurants.destroy' , ['restaurant' => $restaurant->id ] )}}" method="post">
                                <button type="submit" name="button" class="btn btn-danger">Elimina</button>
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>



    </div>
</div>


{{-- <h1>Post:</h1>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Titolo</th>
            <th>autore</th>
            <th>slug</th>
            <th>azioni</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td> <a href="{{route('admin.posts.show', ['post' => $post->id])}}">{{$post->title}}</a></td>
                <td>{{$post->author}}</td>
                <td>{{$post->slug}}</td>
                <td><a href="{{route('admin.posts.show' , ['post' => $post->id ] )}}" class="btn btn-primary">Dettagli</a></td>
                <td><a href="{{route('admin.posts.edit' , ['post' => $post->id ] )}}" class="btn btn-warning">Modifica</a></td>
                <td>
                    <form action="{{route('admin.posts.destroy' , ['post' => $post->id ] )}}" method="post">
                        <button type="submit" name="button" class="btn btn-danger">Elimina</button>
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="text-center">
    <a href="{{route('admin.posts.create')}}" class="btn btn-primary">Aggiungi Articolo</a>
</div> --}}

@endsection
