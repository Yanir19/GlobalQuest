
<?php

$root = "localhost";
$user = "root";
$pass = "";
$base = "globalquest";
$tabla = "zonas";
$conexion = mysql_connect($root,$user,$pass);

$coordenadas = $_REQUEST['direccion'];
 

if(!(mysql_select_db($base)));
  /* print("<CENTER><h3> No se ha podido seleccionar la"
        . " base de datos \"usuarios\": <P>%s". ' Error # '.mysql_errno(). ' .-'.mysql_errno() );**/



echo $coordenadas [0];
echo $coordenadas [1];

$datos = mysql_query("DELETE FROM `globalquest`.`zonas` WHERE `Latitud`= '".$coordenadas [0]."' and `Longitud`= '".$coordenadas [1]."'; ") 
        or die ('<p> no se ha podido ejecutar la setencia compruebe sintaxis <P>%s.  Error # '.mysql_errno(). ' .-'.mysql_errno());


mysql_close();
