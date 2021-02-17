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
                        <a href="{{route('admin.restaurants.index')}}">ristoranti</a>
                    </button>
                    <button type="button" name="button">
                        <a href="{{route('admin.orders.index')}}">Ordini</a>
                    </button>
                    {{-- <button type="button" name="button">
                        <a href="{{route('admin.dishes.index')}}">piatti</a>
                    </button> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
