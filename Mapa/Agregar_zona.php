
<?php

$root = "localhost";
$user = "root";
$pass = "";
$base = "globalquest";
$tabla = "zonas";
$conexion = mysql_connect($root,$user,$pass);

$coordenadas = $_REQUEST['direccion'];
    
if(!(mysql_select_db($base)))
    print("<CENTER><h3> No se ha podido seleccionar la"
        . " base de datos \"usuarios\": <P>%s". ' Error # '.mysql_errno(). ' .-'.mysql_errno() );
else
    echo 'La conexion se ha realizado con exito <br />';



$datos = mysql_query("INSERT INTO `globalquest`.`zonas` (`Latitud`, `Longitud`, `Radio`) "
        . "VALUES ('".$coordenadas [0]."', '".$coordenadas [1]."', '200')  ",$conexion) 
        or die ('<p> no se ha podido ejecutar la setencia compruebe sintaxis <P>%s.  Error # '.mysql_errno(). ' .-'.mysql_errno());


mysql_close();
