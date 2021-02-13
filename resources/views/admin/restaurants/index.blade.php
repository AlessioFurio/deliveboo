@extends('layouts.app')

@section('content')
<ul>

@foreach ($restaurants as $restaurant)
    <li>
        <a href="{{route('admin.restaurants.show' , ['restaurant' => $restaurant->id ] )}}">
            {{$restaurant->name}}
        </a>

    </li>

@endforeach

</ul>

@endsection
