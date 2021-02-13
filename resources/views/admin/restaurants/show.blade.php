@extends('layouts.app')

@section('content')
<ul>

    <li>
        nome: {{$restaurant->name}}
    </li>
    <li>

        indirizzo: {{$restaurant->address}}
    </li>

        <li>

        telefono: {{$restaurant->phone}}
    </li>
    <ul>

    @foreach ($restaurant->dishes as $dish)
        <li>
            Nome piatto: {{$dish->name}}
        </li>

    @endforeach

    </ul>


</ul>

@endsection
