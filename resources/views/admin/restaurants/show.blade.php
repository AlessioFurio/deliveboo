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

    @foreach ($restaurant->dishes as $dish)
    <ul>
        <li>
            Nome piatto: {{$dish->name}}
            <a href="{{ route('admin.dishes.show', ['dish' => $dish->id]) }}">Visualizza
            </a>
            <a href="{{ route('admin.dishes.edit', ['dish' => $dish->id]) }}">Modifica
            </a>
            <form action="{{route('admin.dishes.destroy' , ['dish' => $dish->id ] )}}" method="post">
                <button type="submit" name="button" class="btn btn-danger">Elimina piatto</button>
                @csrf
                @method('DELETE')
            </form>
        </li>
        <li>
            Ingredienti: {{$dish->ingredients}}
        </li>
        <li>
            Prezzo: {{$dish->price}}
        </li>
    </ul>
    <br>
    @endforeach




@endsection
