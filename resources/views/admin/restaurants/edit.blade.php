@extends('layouts.app')

@section('content')

<div class="dashboard-restaurant-edit">

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
                        <div>
                            @if ($restaurant->cover)
                                <figure>
                                    <figcaption>Immagine presente:</figcaption>
                                    <img src="{{asset('storage/'.$restaurant->cover )}}" alt="{{$restaurant->name}}">
                                </figure>
                            @endif
                            <input type="file" name="cover" class="form-control-file">

                            @error('cover')
                            <div>{{ $message }}</div>
                            @enderror

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
