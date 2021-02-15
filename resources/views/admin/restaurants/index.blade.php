@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <h1>I tuoi Ristoranti:</h1>
        {{-- fghfghfggh --}}
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

</ul>

@endsection
