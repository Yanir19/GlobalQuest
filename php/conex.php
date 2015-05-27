

<?php

class conex //CLASE PARA CONEXION A BASE DE DATOS
{
    public static function con()
    {
        
 echo "hola mundo";
         $user = "root";
        $pass = "";
        $base = "globalquest";
        $tabla = "zonas";
        $conexion = mysql_connect($root,$user,$pass);
        mysql_select_db("86446");
        mysql_query("SET NAMES 'utf8'");
        
        if(!$conexion)
        {
            return FALSE;
        }
        else
        {
            return $conexion;
            
        }
    }
}
?>