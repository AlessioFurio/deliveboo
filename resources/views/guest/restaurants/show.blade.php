@extends('layouts.app')
@section('content')
    <h1>
      {{$restaurant->name}}
    </h1>
    <h3>
      {{$restaurant->address}}
    </h3>

    <br>
    <br>

    <div class="">
      @foreach ($courses as $course)
        <a href="#">
          {{$course->name}}
        </a>
      @endforeach
    </div>

    <br>
    <br>

    <ul>
      @foreach ($restaurant->dishes as $dish)
        <li>
          <a href="#">
            <div class="">
              <h2>
                {{$dish->name}}
              </h2>
              <em>
                {{$dish->ingredients}}
              </em>
              <h3>
                {{$dish->price}}
              </h3>
            </div>
          </a>
        </li>
        <br>
      @endforeach
    </ul>
@endsection
