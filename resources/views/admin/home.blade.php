@extends('layouts.app')

@section('content')
<div class="container-general-dashboard">
    <div class="container-dashboard">
        <div class="container-card">
            <div class="card-dashboard">
                <div class="card-header-dashboard">{{ __('Dashboard') }}</div>

                <div class="card-body-dashboard">
                    @if (session('status'))
                        <div class="session-status" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
                <div class="container-button">
                    <button type="button" name="button">
                        <a href="{{route('admin.restaurants.index')}}">I tuoi ristoranti</a>
                    </button>
                    <button type="button" name="button">
                        <a href="{{route('admin.orders.index')}}">Riepilogo Ordini</a>
                    </button>
                    <button type="button" name="button">
                        <a href="{{route('admin.dishes.index')}}">I tuoi piatti</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
