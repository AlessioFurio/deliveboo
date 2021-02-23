@extends('layouts.app')

@section('content')
<div class="container-general-edit">
    <div class="container-general-edit-plate">
        <div class="container-form-edit-plate">
            <div class="title-edit-plate">
                <h1>Modifica Piatto</h1>
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
            <form action="{{ route('admin.dishes.update', ['dish' => $dish->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="list list-edit-plate">
                    <label>Nome</label>
                    <input class="input" type="text" name="name" placeholder="Inserisci il nome del piatto" value=" {{ old('name', $dish->name) }}" required>
                </div>
                <div class="list list-edit-plate">
                    <label>Ingredienti</label>
                    <textarea class="textarea input" name="ingredients" rows="10" placeholder="Inizia a scrivere qualcosa..."  required>{{ old('ingredients', $dish->ingredients) }}</textarea>
                </div>
                <div class="list list-edit-plate">
                    <label>Prezzo</label>
                    <input class="input" type="text" name="price" placeholder="Prezzo" value="{{ old('price', $dish->price) }}" required>
                </div>
                <div class="list list-edit-plate">
                    <label>Portate</label>
                    <select class="input" name="course_id">
                       <option value="">-- seleziona portata --</option>
                       @foreach ($courses as $course)
                           <option value="{{ $course->id }}"
                               {{ $course->id == old('course_id', $dish->course_id) ? 'selected=selected' : '' }}>
                               {{ $course->name }}
                           </option>
                       @endforeach
                   </select>
                </div>
                <div class="list list-edit-plate">
                    <input type="radio" class="check" name="visibility" value="1">
                    <label for="visible">Imposta a visibile</label>
                </div>
                <div class="list list-edit-plate">
                    <input class="check" type="radio" name="visibility" value="0">
                    <label for="no-visible">Imposta a non visibile</label>
                </div>
                <div class="list list-edit-plate">
                    @if ($dish->cover)
                        <figure>
                            <figcaption>Immagine presente:</figcaption>
                            <img src="{{asset('storage/'.$dish->cover )}}" alt="{{$dish->name}}">

                        </figure>
                    @endif
                    <input class="input-search" type="file" name="cover">
                    @error('cover')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="button-edit-plate">
                    <button type="submit">
                        Modifica
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
