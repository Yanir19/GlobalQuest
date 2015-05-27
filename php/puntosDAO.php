<?php
include_once 'conex.php';//INCLUIR CONEXION DE BASE DE DATOS
 echo "hola mundo 2";
class puntosDao
{
    private $r;
    public function __construct()
    {
        $this->r = array();
       
    }
   
    public function listar_todo()
    {
        $q = "SELECT latitud,longitud FROM globalquest.zonas";
        $con = conex::con();
        $rpta = mysql_query($q,$con);
        mysql_close($con);
        while($fila = mysql_fetch_assoc($rpta))
        {
            $this->r[] = $fila;
        }
        return $this->r;
    }
}
?>