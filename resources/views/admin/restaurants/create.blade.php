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
            <div class="form-group col-12">
                @foreach ($categories as $category)
                <div class="form-check">
                    <input name="categories[]" class="form-check-input" type="checkbox" value="{{ $category->id }}" {{ in_array($category->id , old('category', [])) ? 'checked=checked' : '' }}>
                    <label class="form-check-label">
                        {{ $category->name }}
                    </label>
                </div>
                @endforeach
                @error('categories')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

        </div>
        <button type="submit">Aggiungi</button>
    </form>



@endsection
