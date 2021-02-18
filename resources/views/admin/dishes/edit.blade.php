@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
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
                <div class="form-group col-12">
                    @if ($dish->cover)
                        <figure>
                            <figcaption>Immagine presente:</figcaption>
                            <img src="{{asset('storage/'.$dish->cover )}}" alt="{{$dish->name}}">

                        </figure>
                    @endif
                    <input type="file" name="cover" class="form-control-file">

                    @error('cover')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Nome</label>
                    <input type="text" name="name" class="form-control" placeholder="Inserisci il nome del piatto" value=" {{ old('name', $dish->name) }}" required>
                </div>
                <div class="form-group">
                    <label>Ingredienti</label>
                    <textarea name="ingredients" class="form-control" rows="10" placeholder="Inizia a scrivere qualcosa..."  required>{{ old('ingredients', $dish->ingredients) }}</textarea>
                </div>
                <div class="form-group">
                    <label>Prezzo</label>
                    <input type="text" name="price" class="form-control" placeholder="Prezzo" value="{{ old('price', $dish->price) }}" required>
                </div>
                <div class="form-group">
                    <label>Portate</label>
                    <select class="form-control" name="course_id">
                       <option value="">-- seleziona portata --</option>
                       @foreach ($courses as $course)
                           <option value="{{ $course->id }}"
                               {{ $course->id == old('course_id', $dish->course_id) ? 'selected=selected' : '' }}>
                               {{ $course->name }}
                           </option>
                       @endforeach
                   </select>
                <div class="form-group">
                    <input type="radio" name="visibility" value="1">
                    <label for="visible">Imposta a visibile</label>
                    <input type="radio" name="visibility" value="0">
                    <label for="no-visible">Imposta a non visibile</label>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg> Modifica piatto
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
