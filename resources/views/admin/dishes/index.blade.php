@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h1>Tutti i piatti</h1>
                <a href="{{ route('admin.dishes.create') }}" class="btn btn-primary">
                    Crea nuovo piatto
                </a>
            </div>
            <table class="table-dishes">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Ingredients</th>
                        <th class="">Price</th>
                        <th class="">Portata</th>
                        <th class="">Visibility</th>
                        <th class="text-center">Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dishes as $dish)
                        <tr>
                            <td>{{ $dish->id }}</td>
                            <td>{{ $dish->name }}</td>
                            <td>{{ $dish->ingredients }}</td>
                            <td>{{ $dish->Visibility }}</td>
                            <td>{{ $dish->slug }}</td>
                            <td><a class="btn btn-info" href="{{ route('admin.dishes.show', ['dish' => $dish->id]) }}">Visualizza</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
