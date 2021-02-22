@extends('layouts.app')

@section('content')

<div class="container-restaurant-orders-details">
    <div class="title-restaurant-orders-details">
        <h1>Dettagli Ordini</h1>
    </div>
    <div class="container-form-details">
        <h1 class="my-restaurant-name">{{$myrestaurant->name}}</h1>
        <div class="container-form-details-orders">
            <div class="form-details-orders">
                <div class="link-details-order">
                    <a href="{{route('admin.statistics.chart', ['id'=> $myrestaurant->id ])}}">Vedi Statistiche</a>
                </div>
            </div>
        </div>


        @foreach ($myrestaurant->payments as $payment)
            <div class="container-form-details-orders">
                <div class="form-details-orders">
                    <ul>
                        <li>
                            <span>Id: <strong>{{$payment->id}}</strong></span>
                        </li>
                        <li>
                            <span>Status: <strong>{{$payment->status}}</strong></span>
                        </li>
                        <li>
                            <span>Ristorante_id: <strong>{{$payment->restaurant_id}}</strong></span>
                        </li>
                        <li>
                            <span>Data: <strong>{{$payment->created_at}}</strong></span>
                        </li>
                    </ul>
                    <div class="link-details-order">
                        <a href="{{route('admin.orders.show', ['id' => $payment->id ])}}">Vedi i dettagli
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

{{-- <br>
    <label for="statistics">Date:</label>

    <input type="date" id="statistics" name=""
           value="2021-02-18"
           min="2021-01-01" max="2021-12-31">
    <button type="button" name="button">Filtra</button>


</div> --}}
