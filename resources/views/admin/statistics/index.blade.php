@extends('layouts.app')

@section('chart-css')
  <link href="{{ asset('css/chart.css') }}" rel="stylesheet">
@endsection

@section('content')
  <div class="dashboard">
      <div class="dashboard-header">
          <h1>Dashboard</h1>
      </div>

                  {{-- <div class="graphic-container"> --}}
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-2 p-0">
                        {{-- <div class="dashboard-body"> --}}
                         @include('layouts.layout-dashboard-body-menu')

                        {{-- <div class="dashboard-body-content">
                          <div class="container-restaurant">
                              <div class="row row-title">
                                <h1>Statistiche</h1>
                              </div>
                          </div>

                        </div> --}}
                        </div>
                      {{-- </div> --}}
                      <div class="col-10">
                        <div class="container-fluid">
                          <canvas id="chart" style="{width: 300px; height: 300px;}" class="mt-5"></canvas>
                        </div>
                      </div>
                  </div>
                  </div>

      </div>
  </div>

  <script>
    var chart = document.getElementById('chart').getContext('2d');

    chart.canvas.parentNode.style.maxHeight = '600px';
    chart.canvas.parentNode.style.maxWidth = '600px';

    var ordersChart = new Chart(chart, {
      type: 'bar',
      data: {
          labels: ['Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio'],
          datasets: [{
              label: 'Ammontare ordini',
              data: [500.00, 320.00, 150.00, 240.00, 2500.00, 3000.00],
              backgroundColor: [
                  'rgba(255, 99, 132, 0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(255, 206, 86, 0.2)',
                  'rgba(75, 192, 192, 0.2)',
                  'rgba(153, 102, 255, 0.2)',
                  'rgba(255, 159, 64, 0.2)'
              ],
              borderColor: [
                  'rgba(255, 99, 132, 1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(153, 102, 255, 1)',
                  'rgba(255, 159, 64, 1)'
              ],
              borderWidth: 1
          }]
      },
      options: {
        responsive: true,
          scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero: true
                  }
              }]
          }
      }
    });
  </script>

@endsection
