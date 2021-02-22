@extends('layouts.app')

@section('content')
<div class="">
    <h1>{{$myrestaurant->name}}</h1>
    @foreach ($myrestaurant->payments as $payment)
    <div class="">

            <ul>

                <li>
                    <a href="{{route('admin.orders.show', ['id' => $payment->id])}}">id {{$payment->id}}</a>
                </li>
                <li>
                    <p>status {{$payment->status}}</p>
                </li>
                <li>
                    <p>ristorante_id {{$payment->restaurant_id}}</p>
                </li>
                <li>
                    <p>Prezzo: {{$payment->price}}</p>
                </li>
                <li>
                    <p>data {{$payment->created_at}}</p>
                </li>
            </ul>
    </div>
    <br>
@endforeach
<div class="">
    <a href="{{route('admin.statistics.show', ['id' => $myrestaurant->id])}}">Statistiche</a>
    <br>

</div>
<br>
    <label for="statistics">Date:</label>

    <input type="date" id="statistics" name=""
           value="2021-02-18"
           min="2021-01-01" max="2021-12-31">
    <button type="button" name="button">Filtra</button>


</div>


@endsection
