
<!DOCTYPE html>
<?php
    include ("../Conexion/Datos_de_encuesta.php");
?>


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
    

    <script>
        $(document).on("ready", function (){
            
        var punto = new google.maps.LatLng(8.300586, -62.715552);

        var mapProp = {
          center:punto,
          zoom:14,
          mapTypeId: google.maps.MapTypeId.ROADMAP
          };

        var map =new google.maps.Map( $("#map")[0], mapProp);

        var coordenadas;
        
        google.maps.event.addListener(map, 'click', function(event){
            coordenadas = event.latLng.toString();
            coordenadas = coordenadas.replace("(","");
            coordenadas = coordenadas.replace(")","");
            var lista = coordenadas.split(",");
            alert(lista[0] +" - " +lista[1] );
            var direccion = new google.maps.LatLng(lista[0],lista[1]);
     
     
            var myCity = new google.maps.Circle({
                center:direccion,
                radius:200,
                strokeColor:"#0000FF",
                strokeOpacity:0.8,
                strokeWeight:2,
                fillColor:"#0000FF",
                fillOpacity:0.4
              });
              
              
           $("#contenedor").load("Agregar_zona.php", {direccion:lista}); 
              
            google.maps.event.addListener(myCity, 'click', function(){
                alert(myCity.center);
                myCity.setMap(null);
                $("#contenedor").load("Eliminar_zona.php", {direccion:lista}); 
            });  
             myCity.setMap(map);
        });
    });

    </script> 
    

    
</head>

<title>Mapas</title>
    

   
    
<body onload="initialize()"> 
    
       <section id="contenedor" style="border:solid 1px black;heigt:100px;">
            
            
        </section>
    
     <nav class="navbar navbar-default">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">GobalQuest</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li class="active"><a href="#">Mapa <span class="sr-only">(current)</span></a></li>
          <li><a href="#">Encuestas</a></li>       
        </ul>
        <form class="navbar-form navbar-left navbar-right" role="search">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Seudonimo">
            <input type="text" class="form-control" placeholder="contraseña">
          </div>
          <button type="submit" class="btn btn-default">Ingresar</button>
        </form>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
    </nav>
    
    <div id = "map" style="width:100%; height:100%">
        
     
    
</body>
    
<script src="../js/jquery.js"></script>
    <!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>


</html>