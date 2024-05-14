
<html>
  <head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <script src="https://cdn.tailwindcss.com"></script>
        
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>


        <!-- Scripts -->
        <link href="{{asset('css/app.css')}}" rel="stylesheet" />
        <script src="{{asset('js/app.js')}}"></script>
        @stack('other-scripts')
        <!-- Styles -->
        @livewireStyles
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var phpObject = <?php echo json_encode($countByStatus); ?>;
        var data = [
            ['Disposition', 'Count']
        ];
        phpObject.forEach(function(obj) {
            data.push([obj.status, obj.count]);
        });
        console.log(data);

        var data = google.visualization.arrayToDataTable(
            data
        );

        var options = {
          title: 'Dispositions',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }
    </script>
    
  </head>
  <body>
      <div class="flex flex-col justify-end">
        {{$date}}
        <input type="date" wire:model="date" class="w-20" /> 
        <div id="piechart" style="width: 900px; height: 500px;"></div> 
      </div>
  </body>
</html>
