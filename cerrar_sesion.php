<?php
/*
	La sesion se cerrara si el usuario cierra la pagina o si le da al boton de cerrar sesion (si este esta logeado)

 */
session_start();
	if (isset($_SESSION["login"])){
		unset($_SESSION["login"]);
		unset($_SESSION["idusuario"]);
		
	}
	header("Location: http://localhost/GlobalQuest");
?>