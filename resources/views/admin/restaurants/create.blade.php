
@extends('layouts.app')

@section('content')

<div class="dashboard">
    <div class="dashboard-header">
        <h1>Dashboard</h1>
    </div>
    <div class="dashboard-body">
        @include('layouts.layout-dashboard-body-menu')

        <div class="dashboard-body-content">

            <div class="card-form">

                <div class="card-title">
                    <h2>Aggiungi Ristorante</h2>
                </div>
                <form method="post" action="{{route('admin.restaurants.store')}}" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="content-form">
                        <div class="content-form-input">
                            <input value="{{old('name')}}" type="text" name="name" required placeholder="Nome Ristorante">
                            @error('name')
                            <div>{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="content-form-input">
                            <input value="{{old('address')}}" type="text" name="address" required placeholder="Indirizzo">
                            @error('address')
                            <div>{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="content-form-input">
                            <input value="{{old('phone')}}" type="text" name="phone" required placeholder="Telefono">
                            @error('phone')
                            <div>{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="content-form-category">
                            <p>Seleziona Categoria</p>
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

                        {{-- <div class="content-form-category">
                            <label for="">Categoria</label>
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
                        </div> --}}


                        {{-- <div class="form-group col-12">
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
                        </div> --}}
                        <button type="submit">Aggiungi</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection
