@extends('layouts.app')

@section('content')

  <div class="dashboard">
      <div class="dashboard-header">
        <a href="{{route('admin.home')}}">
          <h1>Dashboard</h1>
        </a>
      </div>
      <div class="dashboard-body">
          <div class="dashboard-body-menu">
              <ul>
                  <li>
                      <a href="{{route('admin.restaurants.create')}}" class="btn add-restaurant">Aggiungi Ristorante</a>
                  </li>
                  <li>
                      <a href="{{route('admin.dishes.create')}}" class="btn add-restaurant">Aggiungi Piatto</a>
                  </li>
              </ul>
          </div>

          <div class="dashboard-body-content">
              <div class="container-restaurant">
                  <div class="row row-title">
                      <h1>
                        Dettaglio ristorante
                      </h1>
                  </div>
                  <div class="restaurants">
                    <div class="restaurant-card">
                      <div class="title-restaurant-card">
                        <h4>{{$restaurant->name}}</h4>
                        <p>
                          {{$restaurant->address}}
                        </p>
                        <p>
                          {{$restaurant->phone}}
                        </p>
                      </div>
                      <div class="body-restaurant-card">
                        <div class="details-restaurant-card">
                          <a href="{{ route('admin.dishes.create', ['rest'=> $restaurant->id]) }}" class="btn btn-primary">
                              Crea nuovo piatto
                          </a>

                          <table class="table">
                              <thead>
                                  <tr>
                                      <th>Nome</th>
                                      <th>Azioni</th>
                                  </tr>
                              </thead>
                              <tbody>
                              @foreach ($restaurant->dishes as $dish)
                                  <tr>
                                      <td>{{$dish->name}}</td>
                                      <td><a class="btn btn-info" href="{{ route('admin.dishes.show', ['dish' => $dish->id]) }}">Visualizza piatto</a></td>
                                      <td><a class="btn btn-info" href="{{ route('admin.dishes.edit', ['dish' => $dish->id]) }}">Modifica piatto</a></td>
                                      <td>
                                          <form action="{{route('admin.dishes.destroy' , ['dish' => $dish->id ] )}}" method="post">
                                              <button class="btn btn-elimina" type="submit" name="button">Elimina piatto</button>
                                              @csrf
                                              @method('DELETE')
                                          </form>
                                      </td>
                                  </tr>
                              @endforeach
                              </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
          </div>
      </div>
  </div>

{{-- <ul>
    <li>
        nome Ristorante: {{$restaurant->name}}
    </li>
    <li>
        indirizzo: {{$restaurant->address}}
    </li>
    <li>
        telefono: {{$restaurant->phone}}
    </li>
</ul>
<br>
<a href="{{ route('admin.dishes.create', ['rest'=> $restaurant->id]) }}" class="btn btn-primary">
    Crea nuovo piatto
</a>

<table class="table">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Azioni</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($restaurant->dishes as $dish)
        <tr>
            <td>{{$dish->name}}</td>
            <td><a class="btn btn-info" href="{{ route('admin.dishes.show', ['dish' => $dish->id]) }}">Visualizza piatto</a></td>
            <td><a class="btn btn-info" href="{{ route('admin.dishes.edit', ['dish' => $dish->id]) }}">Modifica piatto</a></td>
            <td>
                <form action="{{route('admin.dishes.destroy' , ['dish' => $dish->id ] )}}" method="post">
                    <button type="submit" name="button" class="btn btn-danger">Elimina piatto</button>
                    @csrf
                    @method('DELETE')
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table> --}}
@endsection
