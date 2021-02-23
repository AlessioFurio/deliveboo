@extends('layouts.app')

@section('chart-css')
  <link href="{{ asset('css/chart.css') }}" rel="stylesheet">
  <script src="https://js.braintreegateway.com/web/dropin/1.26.0/js/dropin.min.js"></script>
@endsection

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        @if ($result->success)
          <div class="text-center mt-5">
            <i class="fas fa-check-circle fa-9x"></i>
            <h2 class="mt-3">
              Pagamento riuscito
            </h2>
            <h3 class="mt-3 mb-3">
              Il tuo ordine e' stato inviato al ristorante
            </h3>
            <a href="{{url('/')}}">
              Torna alla home
            </a>
          </div>
        @else
          <div class="text-center mt-5">
            <i class="fas fa-times-circle fa-9x"></i>
            <h2 class="mt-3 mb-3">
              Pagamento non riuscito
            </h2>
            <a href="{{url('/')}}">
              Torna alla home
            </a>
          </div>
        @endif
      </div>
    </div>
  </div>
@endsection
