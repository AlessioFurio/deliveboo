@extends('layouts.app')

@section('content')

    <div class="dashboard-order">
        <div class="dashboard-header-order">
            <h1>Dashboard</h1>
        </div>
        <div class="dashboard-body-order">
            <div class="dashboard-body-menu-order">
                <h1 class="title-restaurant">Lista Ristoranti</h1>
                <ol>
                    @foreach ($restaurants as $restaurant)
                        <li>
                            <a href="{{ route('admin.payments.index') }}">{{ $restaurant->name }}</a>
                        </li>
                    @endforeach
                </ol>
                {{-- <div>
                    <a href="#" class="btn add-restaurant">Aggiungi Ordine</a>
                </div> --}}
            </div>

            <div class="dashboard-body-content-order">
                <div class="container-restaurant-order">
                    <div class="order-title">
                        <h1>I tuoi Ordini:</h1>
                    </div>
                    <div class="restaurants-order">
                        {{-- @foreach ( as ) --}}
                        <div class="restaurant-card-order">
                            <div class="title-restaurant-card-order">
                                <h4>Ordine</h4>
                                <h1></h1>
                            </div>
                            <div class="body-restaurant-card-order">
                                <div class="details-restaurant-card-order">
                                    <p></p>
                                    <p></p>
                                    <p></p>
                                </div>
                                <div class="action-restaurant-card-order">
                                    <div class="container-btn-action-order">
                                        <a href="#" class="btn btn-dettagli">Dettagli</a>
                                        <a href="#" class="btn btn-modifica">Modifica</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- @endforeach --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
