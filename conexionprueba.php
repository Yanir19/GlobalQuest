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
        
        $cadena="'localhost','root','1234'";
		$user = "root";
		$pass = "1234";
		$server = "localhost";
		$db = "mydb";
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
	 
	 
	 
	}
?>