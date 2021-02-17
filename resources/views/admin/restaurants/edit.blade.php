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
                    <a href="{{route('admin.restaurants.create')}}" class="btn add-restaurant">Aggiungi Ristorante</a>
                </li>
            </ul>
        </div>

        <div class="dashboard-body-content">
            <div class="card-form">

                <div class="card-title">
                    <h2>Modifica Ristorante</h2>
                </div>
                <form method="post" action="{{route('admin.restaurants.update' , ['restaurant' => $restaurant->id])}}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="content-form">
                        <div class="content-form-input">
                            <input value="{{old( 'name', $restaurant->name)}}" type="text" name="name" required>
                            @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="content-form-input">
                            <input value="{{old( 'address', $restaurant->address)}}" type="text" name="address" required>
                            @error('address')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="content-form-input">
                            <input value="{{old( 'phone', $restaurant->phone)}}" type="text" name="phone" required>
                            @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="content-form-category">
                            <p>Seleziona Categoria</p>
                            <div class="form-group col-12">
                                @foreach ($categories as $category)
                                <div class="form-check">
                                    @if ($errors->any())
                                        <input name="categories[]" class="form-check-input" type="checkbox" value="{{ $category->id }}"
                                        {{ in_array($category->id , old('categories', [])) ? 'checked=checked' : '' }}>
                                        <label class="form-check-label">
                                            {{ $tag->name }}
                                        </label>
                                    @else
                                        <input name="categories[]" class="form-check-input" type="checkbox" value="{{ $category->id }}"
                                        {{ $restaurant->categories->contains($category) ? 'checked=checked' : '' }}>
                                        <label class="form-check-label">
                                            {{ $category->name }}
                                        </label>
                                    @endif
                                </div>
                                @endforeach
                                @error('tags')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <button type="submit">Modifica</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection

{{-- @section('content')
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


@endsection --}}
