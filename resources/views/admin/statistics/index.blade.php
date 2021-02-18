@extends('layouts.app')

@section('chart-css')
  <link href="{{ asset('css/chart.css') }}" rel="stylesheet">
@endsection

@section('content')
  <div class="dashboard">
      <div class="dashboard-header">
          <h1>Dashboard</h1>
      </div>
      <div class="dashboard-body">
          @include('layouts.layout-dashboard-body-menu')

          <div class="dashboard-body-content">
              <div class="container-restaurant">
                  <div class="row row-title">
                      <h1>Statistiche</h1>
                  </div>

                  <div class="graphic-container">
                    <canvas id="chart" width="500" height="500" ></canvas>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <script>
    var chart = document.getElementById('chart').getContext('2d');
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
