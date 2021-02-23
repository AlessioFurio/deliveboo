@extends('layouts.app')

@section('content')
<div class="container-general-create">
    <div class="container-general-create-plate">
        <div class="container-form-create-plate">
            <div class="title-create-plate">
                <h1>Crea nuovo piatto</h1>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('admin.dishes.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="list list-plate">
                    @if (isset($_GET['rest']) && in_array($_GET['rest'], $own_id))
                    <input type="hidden" name="restaurant_id" value="{{$restaurants}}" >
                    @else
                    <label>Scegli il ristorante</label>
                    <select class="input" name="restaurant_id">
                        @foreach ($restaurants as $restaurant)
                            <option value="{{$restaurant->id}}" {{ old('restaurant_id') == $restaurant->id ? "selected=selected" : '' }}>{{$restaurant->name}}</option>
                        @endforeach

                    </select>
                    @endif
                </div>
                <div class="list list-plate">
                    <label>Nome</label>
                    <input class="input" type="text" name="name" placeholder=" Inserisci il nome del piatto..." value=" {{ old('name')}}" required>
                </div>
                <div class="list list-plate">
                    <label>Ingredienti</label>
                    <textarea class="textarea input" name="ingredients" rows="10" placeholder=" Inserisci gli ingredienti..."  required>{{ old('ingredients') }}</textarea>
                </div>
                <div class="list list-plate">
                    <label>Prezzo</label>
                    <input class="input" type="number" min="1" max="99" step="1" name="price" placeholder=" Inserisci il prezzo..." value="{{ old('price') }}" required>
                </div>
                <div class="list list-plate">
                    <label>Portate</label>
                    <select class="input" name="course_id">
                        <option value="">seleziona portata</option>
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? "selected=selected" : '' }}>
                                {{ $course->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="list-plate">
                    <input class="check" type="radio" name="visibility" value="1">
                    <label for="visible">Imposta a visibile</label>
                </div>
                <div class="list-plate">
                    <input class="check" type="radio" name="visibility" value="0">
                    <label for="no-visible">Imposta a non visibile</label>
                </div>
                <div class="list list-plate">
                    <input class="input-search" type="file" name="cover" placeholder="Carica immagine" class="form-control-file">

                    @error('cover')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="button-create-plate">
                    <button type="submit">
                        Crea
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
