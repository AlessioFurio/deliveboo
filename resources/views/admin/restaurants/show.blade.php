@extends('layouts.app')

@section('content')
<ul>
    <li>
        nome Ristorante: {{$restaurant->name}}
    </li>
    <li>
        indirizzo: {{$restaurant->address}}
    </li>
    <li>
        telefono: {{$restaurant->phone}}
    </li>
</ul>
<br>
<a href="{{ route('admin.dishes.create', ['rest'=> $restaurant->id]) }}" class="btn btn-primary">
    Crea nuovo piatto
</a>

<table class="table">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Azioni</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($restaurant->dishes as $dish)
        <tr>
            <td>{{$dish->name}}</td>
            <td><a class="btn btn-info" href="{{ route('admin.dishes.show', ['dish' => $dish->id]) }}">Visualizza piatto</a></td>
            <td><a class="btn btn-info" href="{{ route('admin.dishes.edit', ['dish' => $dish->id]) }}">Modifica piatto</a></td>
            <td>
                <form action="{{route('admin.dishes.destroy' , ['dish' => $dish->id ] )}}" method="post">
                    <button type="submit" name="button" class="btn btn-danger">Elimina piatto</button>
                    @csrf
                    @method('DELETE')
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
