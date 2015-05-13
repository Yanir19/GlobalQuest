

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
                 
?>

<script type="text/javascript">

    // obtenemos el array de valores mediante la conversion a json del

    // array de php

    var arrayJS=<?php echo json_encode($latitud);?>;
    var arrayJS1=<?php echo json_encode($longitud);?>;

 

    // Mostramos los valores del array

    for(var i=0;i<arrayJS.length;i++)

    {

        document.write("<br>"+arrayJS[i]);
        document.write("<br>"+arrayJS1[i]);

    }

</script>