@extends('layouts.app')

@section('content')

    <div class="dashboard-order">
        <div class="dashboard-header-order">
            <h1>Dashboard</h1>
        </div>
        <div class="dashboard-body-order">
            <div class="dashboard-body-menu-order">
                <h1 class="title-restaurant">Lista Ristoranti</h1>

            </div>

            <div class="dashboard-body-content-order">
                <div class="container-restaurant-order">
                    <div class="order-title">
                        <h1>I tuoi Ordini:</h1>
                    </div>
                        {{-- <ol>

                                <li>
                                    <p>Nome Ristorante: {{ $restaurant->name }}</p>

                                        @if ($payment->status = 1)
                                            <p>ID{{$payment->id}}</p>
                                            <p>Prezzo{{$payment->price}}</p>
                                            <p>{{$payment->created_at}}</p>
                                            <a href="{{route('admin.statistics.index')}}">Statistiche</a>
                                        @endif

                                    @endforeach
                                </li>
                            @endforeach
                        </ol> --}}
                        {{-- @foreach ( as ) --}}
                    @foreach ($restaurants as $restaurant)
                    <div class="restaurants-order">
                        <div class="restaurant-card-order">
                            <div class="title-restaurant-card-order">
                                <h4>Nome Ristorante: {{ $restaurant->name }}</h4>
                            </div>
                            @foreach ($restaurant->payments as $payment)
                            <div class="body-restaurant-card-order">
                                <div class="details-restaurant-card-order">
                                    @if ($payment->status = 1)
                                        <p>ID{{$payment->id}}</p>
                                        <p>Prezzo{{$payment->price}}</p>
                                        <p>{{$payment->created_at}}</p>
                                        <a href="{{route('admin.statistics.index',['order_id' => $payment->id ])}}">Statistiche</a>
                                    @endif
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                    @endforeach
                        {{-- @endforeach --}}
                </div>
            </div>
        </div>
    </div>

@endsection
