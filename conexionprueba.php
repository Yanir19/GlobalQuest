<?php
/*Para utilizar cualquier de estar funiones, debes instanciar la clase trabajo o conectar donde necesites usarlo. 
  La sesion se crea si el usuario se encuestra registrado en la BD
  Si usas otro nombre de base de datos diferente, username, o password cambialo en la clase conectar.
  
 */
session_start();

if (isset($_POST["enviar_btns"])){ 
    echo("Los datos se recibieron correctamente");
    $usuario = $_POST["n_usuario"];
    $password = $_POST["pwd"];
    echo "los datos son: $usuario , $password";
    
}

 class Conectar{ 
    public function con(){
        
        $cadena="'localhost','root',''";
		$user = "root";
		$pass = "";
		$server = "localhost";
		$db = "globalquest";
        $con = mysql_connect($server,$user,$pass) or die ('<!DOCTYPE html>
                                            <HTML>
                                               <HEAD>
                                                  <TITLE>Error de conexion</TITLE>
                                               </HEAD>Error de conexion
                                            </HTML>');
		mysql_select_db($db,$con);									
        return $con;
	} 
 }
 
 
 class Trabajo extends Conectar
	{
		 private $t;
		 public function _construct()
		 {
			$this ->t=array();
		 }
		 
		/*Buscar usuario en base de datos*/
      public function validar_usuario($php_pwd,$php_username){
			
            $sql =sprintf
          ( " SELECT * FROM usuarios "
             );
          
            $res = mysql_query($sql,parent::con());
            while($reg = mysql_fetch_assoc($res))
            {
				echo $reg['idUsuario'];
				if(($reg['Contrasena'] == $php_pwd ) AND ($reg['Nombre'] == $php_username ) ){
					$_SESSION['login'] = $reg['Nombre'];
					$_SESSION['idusuario'] = $reg['idUsuarios'];
					return true; 
				}
                $this->t[]=$reg;

            } 
        
            return false;
     }
	 /*Verificar si el usuario es administrador o encuestador, devolvera true si es administrador y false si es encuestador*/
	  public function verificar_administrador($php_pwd,$php_username){
            $sql =sprintf
          ( " SELECT * FROM usuarios "
             );
          
            $res = mysql_query($sql,parent::con());
            while($reg = mysql_fetch_assoc($res))
            {
				echo $reg['idUsuario'];
				if(($reg['Contrasena'] == $php_pwd ) AND ($reg['Nombre'] == $php_username ) ){
					if($reg['Rol']==1){
						return true;
					}		
				}			
                $this->t[]=$reg;
			} 
        
            return false;
     }
	 
	 
	  public function verificar_circulo($latitudX,$longitudY,$radio,$x1,$y1){
           
		
     }
	 
	 
	  public function haversineGreatCircleDistance(
			  $latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthMeanRadius  )
			{
				$deltaLatitude = deg2rad($latitudeTo - $latitudeFrom);
				$deltaLongitude = deg2rad($longitudeTo - $longitudeFrom);
				$a = sin($deltaLatitude / 2) * sin($deltaLatitude / 2) +
					 cos(deg2rad($latitudeFrom)) * cos(deg2rad(latitudeTo)) *
					 sin($deltaLongitude / 2) * sin($deltaLongitude / 2);
				$c = 2 * atan2(sqrt($a), sqrt(1-$a));
				return $earthMeanRadius * $c;
			}
		
	 
        public function verificar_localizacion($latitud,$longitud){
            $sql =sprintf
          ( " SELECT z.Latitud, z.Longitud, z.Radio FROM zonas AS z, zona_usuario AS z_u WHERE z.idZonas = z_u.idZona AND z_u.idUsuario = %s; ",$_SESSION['idusuario']
             );
          
            $res = mysql_query($sql,parent::con());
            while($reg = mysql_fetch_assoc($res))
            {
                echo '<script type= "text/javascript"> alert("hola"); </script>';
				echo $reg['Latitud'];
                                echo $reg['Longitud'];
                                echo $reg['Radio'];
                                $la = $reg['Latitud'];
                                $lo = $reg['Longitud'];
                                $ra = $reg['Radio'];
                                echo '<script type= "text/javascript"> alert("Lat: "+$la+", Lon: "+$lo+", Rad: "+$ra); </script>';
				
				/*if(sqrt((pow((floatval($reg['Latitud'])-$latitud),2)) + (pow((floatval($reg['Longitud'])- $longitud),2))) <= floatval($reg['Radio'])){
					return true;*/	
					
					$deltaLatitude = deg2rad($latitud - floatval($reg['Latitud']));
					$deltaLongitude = deg2rad($longitud - floatval($reg['Longitud']));
					$a = sin($deltaLatitude / 2) * sin($deltaLatitude / 2) +
						 cos(deg2rad(floatval($reg['Latitud']))) * cos(deg2rad($latitud)) *
						 sin($deltaLongitude / 2) * sin($deltaLongitude / 2);
					$c = 2 * atan2(sqrt($a), sqrt(1-$a));
					$distancia= 6371 * $c;
					
					if($distancia <= floatval($reg['Radio'])){
						return true;
					}
				/*if(haversineGreatCircleDistance(floatval($reg['Latitud']),floatval($reg['Longitud']),$latitud,$longitud,floatval(6371))<= floatval($reg['Radio'])){
					return true;*/
				
				
                
			} 
        
            return false;
     }
	 
	 
	
	 	
	 
	 
	 
	}
?>