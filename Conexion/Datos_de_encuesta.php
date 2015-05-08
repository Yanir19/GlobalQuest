<?php

$root = "localhost";
$user = "root";
$pass = "";
$base = "globalquest";
$conexion = mysql_connect($root,$user,$pass);
    
if(!(mysql_select_db($base)))
    print("<CENTER><h3> No se ha podido seleccionar la"
        . " base de datos \"usuarios\": <P>%s". ' Error # '.mysql_errno(). ' .-'.mysql_errno() );
else
    echo 'La conexion se ha realizado con exito <br />';

