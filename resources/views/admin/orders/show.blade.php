@extends('layouts.app')

@section('content')
<div class="">
    <ul>
        <li>
            <p>Ordine id num: {{$order->id}}</p>
        </li>
        <li>
            <p>ristorante {{$order->restaurant_id}}</p>
        </li>
        <li>
            <p>status {{$order->status}}</p>
        </li>
        <li>
            <p>data {{$order->created_at}}</p>
        </li>
        <li>
            <a href="{{route('admin.statistics.index')}}">Statistiche</a>
        </li>

    </ul>

</div>


@endsection
