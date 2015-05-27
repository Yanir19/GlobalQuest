<?php  
    $root = "localhost";
    $user = "root";
    $pass = "";
    $base = "globalquest";
    $tabla = "zonas";
    $conexion = mysql_connect($root,$user,$pass);

    if(!(mysql_select_db($base)))
        print("<CENTER><h3> No se ha podido seleccionar la"
            . " base de datos \"usuarios\": <P>%s". ' Error # '.mysql_errno(). ' .-'.mysql_errno() );
    else
        echo 'La conexion se ha realizado con exito <br />';


   $datos = mysql_query("SELECT latitud,longitud FROM globalquest.zonas ",$conexion) 
        or die ('<p> no se ha podido ejecutar la setencia compruebe sintaxis <P>%s.  Error # '.mysql_errno(). ' .-'.mysql_errno());
   
    $latitud;
    $longitud;
    $i=0;
     while ( $arrayPHP = mysql_fetch_array($datos)){
         $latitud[$i] = $arrayPHP ['latitud'];
         $longitud[$i] = $arrayPHP ['longitud'];
         $i++;
     }
                 
     mysql_close();

?>
   
       
            


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
    
    
    
    
    <!----------------------------------------------------------------------->
    
    
<script type="text/javascript">

    // obtenemos el array de valores mediante la conversion a json del

    // array de php

    var arrayJS=<?php echo json_encode($latitud);?>;
    var arrayJS1=<?php echo json_encode($longitud);?>;


</script>
    
    
    
    
    <!----------------------------------------------------------------------->
    

    <script>
        
     var zonas_bd= [];
     var map;
     
     $(document).on("ready", function (){
            
        var punto = new google.maps.LatLng(8.300586, -62.715552);

        var mapProp = {
          center:punto,
          zoom:15,
          mapTypeId: google.maps.MapTypeId.ROADMAP
          };

         map =new google.maps.Map( $("#map")[0], mapProp);
         
          for(var i=0;i<arrayJS.length;i++)

                {

                    direccion = new google.maps.LatLng(arrayJS[i].toString(),arrayJS1[i].toString());
                   listar(direccion);
                }     
                    
                    
        function listar(direccion){
            
            alert(direccion);
            var myCity = new google.maps.Circle({
                        center:direccion,
                        radius:200,
                        strokeColor:"#0000FF",
                        strokeOpacity:0.8,
                        strokeWeight:2,
                        fillColor:"#0000FF",
                        fillOpacity:0.4
                      });


                 //   $("#contenedor").load("Agregar_zona.php", {direccion:lista}); 

                    google.maps.event.addListener(myCity, 'click', function(){
                        alert(myCity.center);
                    //    myCity.setMap(null);
                        //$("#contenedor").load("Agregar_zona.php", {direccion:lista}); 
                    });  
                     myCity.setMap(map);
        };        
                    
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
    
    <div id = "map" style="width:50%; height:100%">
        
    </div>
    <div id ="informacion" style="width:50%; height:100%" >
        
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
   <!--          <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingTwo">
              <h4 class="panel-title">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Collapsible Group Item #2
                </a>
              </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
              <div class="panel-body">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
              </div>
            </div>
          </div>
          <div class="panel panel-default">
         <div class="panel-heading" role="tab" id="headingThree">
              <h4 class="panel-title">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Collapsible Group Item #3
                </a>
              </h4>
            </div> -->
            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
              <div class="panel-body">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
              </div>
            </div>
          </div>
        </div>
        
    </div>
    
</body>
    
    <script src="../js/jquery.js"></script>
    <!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>


</html>