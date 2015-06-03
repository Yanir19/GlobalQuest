<?php

require_once '../Conexion/BD_Conector.php';

//------- Se obtienen las variables -------//

// DATOS ENCUESTADO
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$nacimiento = $_POST['nacimiento'];
$rol = $_POST['rol'];
$passwd = $_POST['passwd'];
 

if (!$nombre || !$apellido || !$nacimiento || !$rol || !$passwd){
    echo '<script type= "text/javascript"> alert("NOTA: Todos los campos son requeridos para guardarse en la BD."); </script>';
}else{
        $query = "INSERT INTO usuarios(Nombre, Apellido, Fecha_nacimiento, Contrasena, Rol)"
                ."VALUES ('$nombre', '$apellido', '$nacimiento', '$passwd', '$rol')";

    echo $query;
    $retval = mysql_query( $query, $conexion );
    if(! $retval )
    {
      die('Error al insertar data: ' . mysql_error());
    }

    header("Location: ../Administrador/Crear_Usuario.php");
    

}

mysql_close($conexion);

