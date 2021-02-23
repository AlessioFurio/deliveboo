
@extends('layouts.app')

@section('chart-css')
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
@endsection

@section('content')<!DOCTYPE html>

  <div class="chart-container">
      <div class="">
          <p >Filtra per mese</p>
          @foreach ($months as $key => $month)
              <a href="{{route('admin.statistics.month', ['id' => $id , 'month' => $key+1 ])}}">{{$month}}</a>

          @endforeach


      </div>
    <div class="pie-chart-container">
      <canvas id="pie-chart"></canvas>
    </div>
  </div>

  <!-- javascript -->

   <script>
  $(function(){
      //get the pie chart canvas
      var cData = JSON.parse(`<?php echo $chart_data; ?>`);
      var ctx = $("#pie-chart");

      //pie chart data
      var data = {
        labels: cData.label,
        datasets: [
          {
            label: "Totale ordine",
            data: cData.data,
            backgroundColor: [
              "#DEB887",
              "#A9A9A9",
              "#DC143C",
              "#F4A460",
              "#2E8B57",
              "#1D7A46",
              "#CDA776",
            ],
            borderColor: [
              "#CDA776",
              "#989898",
              "#CB252B",
              "#E39371",
              "#1D7A46",
              "#F4A460",
              "#CDA776",
            ],
            borderWidth: [1, 1, 1, 1, 1,1,1]
          }
        ]
      };

      //options
      var options = {
        responsive: true,
        title: {
          display: true,
          position: "top",
          text: "Tutti gli ordini",
          fontSize: 18,
          fontColor: "#111"
        },
        legend: {
          display: true,
          position: "bottom",
          labels: {
            fontColor: "#333",
            fontSize: 16
          }
        }
      };

      //create Pie Chart class object
      var chart1 = new Chart(ctx, {
        type: "bar",
        data: data,
        options: options
      });

  });
</script>
@endsection
