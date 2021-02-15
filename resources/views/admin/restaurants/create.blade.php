@extends('layouts.app')

@section('content')
    <form method="post" action="{{route('admin.restaurants.store')}}" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div>
            <div >
                <label>Nome ristorante</label>
                <input value="{{old('name')}}" type="text" name="name" required>
                @error('name')
                <div>{{ $message }}</div>
                @enderror
            </div>
            <div >
                <label>indirizzo</label>
                <input value="{{old('address')}}" type="text" name="address" required>
                @error('address')
                <div>{{ $message }}</div>
                @enderror
            </div>
            <div >
                <label>Telefono</label>
                <input value="{{old('phone')}}" type="number" name="phone" required>
                @error('phone')
                <div>{{ $message }}</div>
                @enderror
            </div>
        </div>
        <button type="submit">Aggiungi</button>
    </form>


@endsection
