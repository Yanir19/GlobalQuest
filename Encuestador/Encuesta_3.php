<?php
    // Start the session
    session_start();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap-theme.min.css" rel="stylesheet">
  
  </head>
  <body>
      <header>
          <title>Encuesta #3</title>
          <div class="container">
              <h1>Plantilla #3</h1>
          </div>
      </header>
      
      <?php  
    
        
            $_SESSION["respuesta_2"] =  $_POST['respuesta_2'] ;
            $_SESSION["frecuencia_2"] = $_POST['frecuencia_2'];
            $_SESSION["conoce-otros-examenes_2"] = $_POST['conoce-otros-examenes_2'];
            $_SESSION["otros-examenes_2"] = $_POST['otros-examenes_2'];
       
        echo $_SESSION["edad"] . "/ " ;
        echo $_SESSION["escuela"] . "/ ";
        echo $_SESSION["Respuesta_1"] . "/ ";
        echo $_SESSION["Descripcion"] . "/ ";
        echo $_SESSION["respuesta_2"] . "/ ";
        echo $_SESSION["frecuencia_2"] . "/ ";
        echo $_SESSION["conoce-otros-examenes_2"] . "/ " ;
        echo $_SESSION["otros-examenes_2"] . "... " ;
      ?>
    <form action="Encuesta_4.php" method="post" >  
        <div class="container">
           <div class="col-lg-6">
                <div class="panel panel-danger">
                     <div class="panel-heading">¿Cuál es la razón?</div>
                        <div class="panel-body">
                                
                            <ul class="list-group">
                                <li class="list-group-item"> <div class="radio">
                                        <label><input type="radio" name="Razones_ning_exam_3" value="Desinformación">Desinformación</label>
                                </div></li>
                                <li class="list-group-item"> <div class="radio">
                                        <label><input type="radio" name="Razones_ning_exam_3" value="No se cómo realizar el auto examen">No se cómo realizar el auto examen</label>
                                </div></li>
                                <li class="list-group-item"> <div class="radio">
                                        <label><input type="radio" name="Razones_ning_exam_3" value="Considero que estoy joven para realizarlo">Considero que estoy joven para realizarlo</label>
                                </div></li>
                                <li class="list-group-item"> <div class="radio">
                                        <label><input type="radio" name="Razones_ning_exam_3" value="Nunca he asistido a un médico que evalúe mis senos">Nunca he asistido a un médico que evalúe mis senos</label>
                                </div></li>
                                <li class="list-group-item"> <div class="radio">
                                        <label><input type="radio" name="Razones_ning_exam_3" value=">No he sentido la necesidad de realizarme exámenes de éste tipo">>No he sentido la necesidad de realizarme exámenes de éste tipo</label>
                                </div></li>  
                            </ul>

                            <br>

                            <input type="submit" name="enviar" value="enviar">
                     </div>

                </div>
            </div>       
       </div>
    </form>
      <section class="main">
          
      </section>
    
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>