<html>
  <head>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Cantidad', 'Respuesta'],
          ['SI',     300],
          ['NO',     100]
        ]);

        var options = {
          title: '¿Conoce el término cáncer de mama?',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('informacion'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
      <div class="col-lg-6" id="informacion" style="width: 100%; height: 100%; background-color: red"></div>
  </body>
</html>