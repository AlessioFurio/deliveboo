@extends('layouts.app')

@section('content')
    <form method="post" action="{{route('admin.restaurants.update' , ['restaurant' => $restaurant->id])}}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div>
            <div>
                <label>Nome ristorante</label>
                <input value="{{old( 'name', $restaurant->name)}}" type="text" name="name" required>
                @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label>indirizzo</label>
                <input value="{{old( 'address', $restaurant->address)}}" type="text" name="address" required>
                @error('address')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label>Telefono</label>
                <input value="{{old( 'phone', $restaurant->phone)}}" type="text" name="phone" required>
                @error('phone')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        <button type="submit" class="btn btn-primary">Salva</button>
    </form>


@endsection
