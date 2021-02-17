<h1>Lista Ordini per ristorante</h1>
@foreach ($restaurants as $restaurant)
    <a href="{{ route('admin.payments.index') }}">{{ $restaurant->name }}</a>
@endforeach
