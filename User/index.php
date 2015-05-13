<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="../css/estilos.css">
    
    
    <style type="text/css">
      html { height: 100% }
      body { height: 100% }
      #map { height: 100%;
             float: left;
            }
      
      #informacion{ height: 100%; float: left; }
    </style>
    
    <script type="text/javascript"
      src="http://maps.googleapis.com/maps/api/js?sensor=true">
    </script>   
    
    <script type="text/javascript"
      src="http://code.jquery.com/jquery-2.0.3.min.js">
    </script>  
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data1 = google.visualization.arrayToDataTable([
          ['Cantidad', 'Respuesta'],
          ['SI',     300],
          ['NO',     100]
        ]);
        
        var data2 = google.visualization.arrayToDataTable([
          ['Cantidad', 'Respuesta'],
          ['Mamografía',     300],
          ['Eco Mamario',     100],
          ['Examen realizado por un médico',     200],
          ['Todos los anteriores',     600],
          ['No Conozco',     50]
        ]);

        var options1 = {
          title: '1. ¿Conoce el término cáncer de mama?',
          is3D: true
        };
        
        var options2 = {
          title: '2. ¿Conoce otro examen que ayude a la detección del cáncer de mama?',
          is3D: true
        };

        var chart1 = new google.visualization.PieChart(document.getElementById('informacion1'));
        chart1.draw(data1, options1);
        
        var chart2 = new google.visualization.PieChart(document.getElementById('informacion2'));
        chart2.draw(data2, options2);
      }
    </script>
    
    

    <script>
        var punto = new google.maps.LatLng(8.300586, -62.715552);
                var UCAB1=new google.maps.LatLng(8.300586, -62.715552);
                var UCAB2=new google.maps.LatLng(8.302210, -62.707774);
                var UCAB3=new google.maps.LatLng(8.293144, -62.709855);
                var UCAB4=new google.maps.LatLng(8.295055, -62.718395);


        function initialize()
        {
        var mapProp = {
          center:punto,
          zoom:16,
          mapTypeId: google.maps.MapTypeId.ROADMAP
          };

        var map=new google.maps.Map(document.getElementById("map"),mapProp);

        var myTrip=[UCAB1,UCAB2,UCAB3,UCAB4];
        var flightPath=new google.maps.Polygon({
          path:myTrip,
          strokeColor:"#0000FF",
          strokeOpacity:0.8,
          strokeWeight:2,
          fillColor:"#0000FF",
          fillOpacity:0.4
          });

        flightPath.setMap(map);
        
        google.maps.event.addListener(flightPath, 'click', function(){
            alert("Acabas de presionar en una zona de encuesta.");
        });
        
        }

    google.maps.event.addDomListener(window, 'load', initialize);
    </script> 
    
</head>

<title>GlobalQuest</title>
    

   
    
<body onload="initialize()"> 
    
     <?php require_once('../Modulos/navbar.php'); ?>
    
    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" style=" width: 100%; height: 100%;">
        
        <!-- Div del Mapa -->
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6 " style="height: 100%;">
            <div class="panel-heading" role="tab" id="headingOne" style="background-color: #f8bbd0">
                <h4 class="panel-title" style="color:black">Zonas de Encuesta</h4>
            </div>
            <div class="panel-body" id = "map" style="width: 100%; height: 100%;"></div>
        </div>  <!-- Div del Mapa -->
        
        <!-- Div del resumen estadistico -->
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6" style=" height: 100%;">
            <div   style=" width: 100%; height: 100%;">
                
                <div class=" " >
                        <div class="panel-heading" role="tab" id="headingOne" style="background-color: #f8bbd0">
                            <h4 class="panel-title"style="color:black">
                            
                              Resultados
                            
                          </h4>
                        </div>
                        
                        <div class="panel-body" id ="informacion1" style="width: 100%; height: 300px;">
                           
                        </div>
                        <div class="panel-body" id ="informacion2" style="width: 100%; height: 300px;">
                           
                        </div>
                    </div>
            </div>
        </div>   <!-- Div del resumen estadistico -->
        
    </div>
    
</body>
    
    <script src="../Administrador/js/jquery.js"></script>
    <!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>


</html>