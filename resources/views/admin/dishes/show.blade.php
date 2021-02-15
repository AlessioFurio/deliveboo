@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="">
                <h1>Piatto n. {{ $dish->id }}</h1>
            </div>
            <div class="">
                <h1>Nome piatto: {{ $dish->name }}</h1>
                <p>Ingredienti: {{ $dish->ingredients }}</p>
                <p>Prezzo: {{ $dish->price }}</p>
                <p>Portata: {{ $dish->course->name }}</p>
                <p>Visibilità: {{ $dish->visibility }}</p>
            </div>
        </div>
    </div>
@endsection
