<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap-theme.min.css" rel="stylesheet">
	<link href="../css/textoestilos1.css" rel="stylesheet">
	<link href="../css/estilos2.css" rel="stylesheet">
	
	
    
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
    <!--
       <script>
        
         //Punto inicial
            var punto = new google.maps.LatLng(8.300586, -62.715552);
            var UCAB1=new google.maps.LatLng(8.300586, -62.715552);
            var UCAB2=new google.maps.LatLng(8.302210, -62.707774);
            var UCAB3=new google.maps.LatLng(8.293144, -62.709855);
            var UCAB4=new google.maps.LatLng(8.295055, -62.718395);
    
            $(document).on("ready", function(){
           
            //Configuracion inicial
            var config = {
                zoom:14,
                center:punto,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            
            var mapa = new google.maps.Map( $("#map")[0],config);
            var map  = new google.maps.Map(document.getElementById("#map"),mapProp);
            
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
            }

            google.maps.event.addDomListener(window, 'load', initialize);
            google.maps.event.addListener(mapa, "click", function (event){
                //Mostrar alerta al hacer click al mapa
                alert(event.latLng);
            });
        });
    </script> -->
    
    

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

<title>Mapas</title>
    

   
    
<body onload="initialize()"> 
    
     
		  <!-- Cabecera de la pagina -->
    
     <div class="navbar navbar-inverse navbar-static-top">
      <div class="container">
        <div class="row">
          <div class="col-sm-2">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <div class="navbar-brand">
                <h3> GLOBALQUEST</h3>
              </div>
            </div>
          </div>
          <div class="col-sm-12">
            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li class="for-individuals"><a href="encontrousuario.php">Crear encuesta</a></li>
                <li class="for-providers"><a href="encontrousuario.php">Encuestas</a></li>
              </ul>
            </div><!--/.nav-collapse -->
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6" id = "map" style="width:50%; height:100%">
        
    </div>
	<div class="container">
		<div class="col-sm-6" id ="informacion" style="width:50%; height:100%" >
			
					<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
			  <div class="panel panel-default">
				<div class="panel-heading" role="tab" id="headingOne">
				  <h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
					  Resultados
					</a>
				  </h4>
				</div>
				<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
				  <div class="panel-body">
					Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
				  </div>
				</div>
			  </div>
				<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
				  <div class="panel-body">
					Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
				  </div>
				</div>
			  </div>
		</div>
    </div>
	</div>
	
   
    
	 <footer class="fixed">
      <div class="container">
        
       
        <div class="row">
          <div class="col-sm-6 copyright">
            <p>&copy; 2015 GlobalQuest, Inc. All rights reserved.</p>
          </div>
        </div>
      </div>
    </footer>
</body>
    
    <script src="../Administrador/js/jquery.js"></script>
    <!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>


</html>