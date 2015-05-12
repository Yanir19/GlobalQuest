<?php
/*VERIFICO SI EL USUARIO EXISTE, Y LO REDIRIJO A LA PAGINA CORRESPONDIENTE*/
include("conexionprueba.php"); 

$trab = new Trabajo();

if(isset($_POST["pwd"]) AND ($_POST["n_usuario"])) {
    echo "hola";
     $obj=new Trabajo();
     if($obj->validar_usuario($_POST["pwd"],$_POST["n_usuario"])){
       
        if($obj->verificar_administrador($_POST["pwd"],$_POST["n_usuario"])){
			header("Location: http://localhost/GlobalQuest/Mapa/ejemploderejillas.php");
			
		}else{
			header("Location: http://localhost/GlobalQuest/Encuestador/Realizar_Encuesta.php");
		}
        
     }
     else{
       header("Location: http://localhost/GlobalQuest");
     }
}
?>