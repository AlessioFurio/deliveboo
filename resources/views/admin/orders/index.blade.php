@extends('layouts.app')

@section('content')

    <div class="dashboard">
        <div class="dashboard-header">
            <h1>Dashboard</h1>
        </div>
        <div class="dashboard-body">
            <div class="dashboard-body-menu">
                <ul>
                    <li>
                        <h1>Lista Ristoranti</h1>
                        <ul>
                            @foreach ($restaurants as $restaurant)
                                <li>
                                    <a href="{{ route('admin.payments.index') }}">{{ $restaurant->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="btn add-restaurant">Aggiungi Ordine</a>
                    </li>
                </ul>
            </div>

            <div class="dashboard-body-content">
                <div class="container-restaurant">
                    <div class="row row-title">
                        <h1>I tuoi Ordini:</h1>
                    </div>
                    <div class="row">

                    </div>

                    <div class="restaurants">
                        {{-- @foreach ( as ) --}}
                        <div class="restaurant-card">
                            <div class="title-restaurant-card">
                                <h4>Ordine</h4>
                                <h1></h1>
                            </div>
                            <div class="body-restaurant-card">
                                <div class="details-restaurant-card">
                                    <p></p>
                                    <p></p>
                                    <p></p>
                                </div>
                                <div class="action-restaurant-card">
                                    <div class="container-btn-action">
                                        <a href="#" class="btn btn-primary btn-dettagli">Dettagli</a>
                                        <a href="#" class="btn btn-warning btn-modifica">Modifica</a>
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
