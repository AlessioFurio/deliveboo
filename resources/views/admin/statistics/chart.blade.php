
@extends('layouts.app')

@section('chart-css')

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
  {{-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> --}}

@endsection

@section('content')

  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12">
        <div>
          <h2 class="mt-5 mb-3">Filtra per mese</h2>
          @foreach ($months as $key => $month)
            <a href="{{route('admin.statistics.month', ['id' => $id , 'month' => $key+1 ])}}" class="btn" >{{$month}}</a>

          @endforeach
        </div>
        <canvas id="ordersChart" class="mt-5"></canvas>
      </div>
    </div>
  </div>
@endsection

@section('script')
  <!-- javascript -->

   <script>


      window.cData = JSON.parse(`@php
        echo $chart_data;
      @endphp `);



    </script>
 @endsection
