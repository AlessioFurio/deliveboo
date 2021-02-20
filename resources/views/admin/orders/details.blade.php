@extends('layouts.app')

@section('content')
<div class="">
    <h1>{{$myrestaurant->name}}</h1>
    @foreach ($myrestaurant->payments as $payment)
    <div class="">

            <ul>

                <li>
                    <p>id {{$payment->id}}</p>
                </li>
                <li>
                    <p>status {{$payment->status}}</p>
                </li>
                <li>
                    <p>ristorante_id {{$payment->restaurant_id}}</p>
                </li>
                <li>
                    <p>data {{$payment->created_at}}</p>
                </li>
                <li>
                    <a href="{{route('admin.orders.show', ['id' => $payment->id ])}}">Vedi i dettagli
                    </a>
                </li>
            </ul>
    </div>
@endforeach

</div>


@endsection
