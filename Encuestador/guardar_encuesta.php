<?php

require_once '../Conexion/BD_Conector.php';

//------- Se obtienen las variables -------//

// DATOS ENCUESTADO
$edad = $_POST['edad'];
$sexo = $_POST['sexo'];
$escuela = $_POST['escuela'];
$email = $_POST['email'];
 
// PARTE 1
$respuesta1 = $_POST['respuesta_1'];
$descripcion1 = $_POST['descripcion_1'];

// PARTE 2
$respuesta_2 = $_POST['respuesta_2'];
$frecuencia_2 = $_POST['frecuencia_2'];
$otros_examenes_2 = $_POST['otros_examenes_2'];
$razones_ning_exam_2 = $_POST['razones_ning_exam_2'];

// PARTE 3
$primero_que_piensa_3 = $_POST['primero_que_piensa_4'];
$respuesta_3 = $_POST['respuesta_3'];
$reaccion_3 = $_POST['reaccion_3'];

// PARTE 4
$respuesta_4 = $_POST['respuesta_4'];
$medio_4 = $_POST['medio_4'];
$redes_4 = $_POST['redes_4'];
$focus_group_4 = $_POST['focus_group_4'];


echo "PARTE 1<br>R1 = $respuesta1<br>D1 = $descripcion1<br><br>PARTE 2<br>R2 = $respuesta_2<br>Frecuencia = $frecuencia_2<br>Otros Examenes = $otros_examenes_2<br>Razones ningun examen = $razones_ning_exam_2<br><br>PARTE 3<br>Primero que piensa = $primero_que_piensa_3<br>Familia Pesenta? = $respuesta_3<br>Reaccion = $reaccion_3<br><br>PARTE 4<br>Recibir info = $respuesta_4<br>Medio = $medio_4<br>Redes = $redes_4<br>Focus Group = $focus_group_4<br><br>";

if (!$edad || !$sexo || !$escuela || !$respuesta1 || !$descripcion1 || !$respuesta_2 || !$frecuencia_2 || !$otros_examenes_2 || !$razones_ning_exam_2 || !$primero_que_piensa_3 || !$respuesta_3 || !$reaccion_3 || !$respuesta_4 || !$medio_4 || !$redes_4 || !$focus_group_4){
    echo '<script type= "text/javascript"> alert("NOTA: Todos los campos son requeridos para guardarse en la BD."); </script>';
}else{
    if ($email){
        $query = "INSERT INTO encuesta(respuesta_1, descripcion_1, respuesta_2, frecuencia_2, otros_examenes_2, razones_ning_exam_2, primero_que_piensa_3, respuesta_3, reaccion_3, respuesta_4, medio_4, redes_4, focus_group_4, edad, sexo, escuela, email, Usuario_idUsuario)"
                ."VALUES ('$respuesta1', '$descripcion1', '$respuesta_2', '$frecuencia_2', '$otros_examenes_2', '$razones_ning_exam_2', '$primero_que_piensa_3', '$respuesta_3', '$reaccion_3', '$respuesta_4', '$medio_4', '$redes_4', '$focus_group_4', '$edad', '$sexo', '$escuela', '$email', 0)";
    }else{
        $query = "INSERT INTO encuesta(respuesta_1, descripcion_1, respuesta_2, frecuencia_2, otros_examenes_2, razones_ning_exam_2, primero_que_piensa_3, respuesta_3, reaccion_3, respuesta_4, medio_4, redes_4, focus_group_4, edad, sexo, escuela, Usuario_idUsuario)"
                ."VALUES ('$respuesta1', '$descripcion1', '$respuesta_2', '$frecuencia_2', '$otros_examenes_2', '$razones_ning_exam_2', '$primero_que_piensa_3', '$respuesta_3', '$reaccion_3', '$respuesta_4', '$medio_4', '$redes_4', '$focus_group_4', '$edad', '$sexo', '$escuela', 0)";
    }
    
    

    echo $query;
    $retval = mysql_query( $query, $conexion );
    if(! $retval )
    {
      die('Error al insertar data: ' . mysql_error());
    }

    //header("Location: ../Encuestador/Realizar_Encuesta.php?ok");
    

}

mysql_close($conexion);