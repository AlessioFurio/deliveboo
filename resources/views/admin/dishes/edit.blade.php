@extends('layouts.app')

@section('content')
<div class="container-general-create">
    <div class="container-general-create-plate">
        <div class="container-form-create-plate">
            <div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <form action="{{ route('admin.dishes.update', ['dish' => $dish->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="list list-plate">
                    @if ($dish->cover)
                        <figure>
                            <figcaption>Immagine presente:</figcaption>
                            <img src="{{asset('storage/'.$dish->cover )}}" alt="{{$dish->name}}">

                        </figure>
                    @endif
                    <input class="input" type="file" name="cover" class="form-control-file">

                    @error('cover')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="list list-plate">
                    <label>Nome</label>
                    <input class="input" type="text" name="name" placeholder="Inserisci il nome del piatto" value=" {{ old('name', $dish->name) }}" required>
                </div>
                <div class="list list-plate">
                    <label>Ingredienti</label>
                    <textarea class="textarea input" name="ingredients" rows="10" placeholder="Inizia a scrivere qualcosa..."  required>{{ old('ingredients', $dish->ingredients) }}</textarea>
                </div>
                <div class="list list-plate">
                    <label>Prezzo</label>
                    <input class="input" type="text" name="price" placeholder="Prezzo" value="{{ old('price', $dish->price) }}" required>
                </div>
                <div class="list list-plate">
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
                <div class="list list-plate">
                    <label for="visible">Imposta a visibile</label>
                    <input type="radio" class="check" name="visibility" value="1">
                    <input class="check" type="radio" name="visibility" value="0">
                    <label for="no-visible">Imposta a non visibile</label>
                </div>
                <div class="list list-plate">
                    <button type="submit" class="btn btn-success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg> Modifica piatto
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
