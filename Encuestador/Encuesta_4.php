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
          <title>Encuesta #4</title>
          <div class="container">
              <h1>Plantilla #4</h1>
          </div>
      </header>
      
      <?php  
    
        
            $_SESSION["Razones_ning_exam_3"] =  $_POST['Razones_ning_exam_3'] ;
       
        echo $_SESSION["edad"] . "/ " ;
        echo $_SESSION["escuela"] . "/ ";
        echo $_SESSION["Respuesta_1"] . "/ ";
        echo $_SESSION["Descripcion"] . "/ ";
        echo $_SESSION["respuesta_2"] . "/ ";
        echo $_SESSION["frecuencia_2"] . "/ ";
        echo $_SESSION["conoce-otros-examenes_2"] . "/ " ;
        echo $_SESSION["otros-examenes_2"] . "/ " ;
        echo $_SESSION["Razones_ning_exam_3"] . "/ " ;
      ?>
    
    <form action="Encuesta_5.php" method="post" >   
       <div class="container">
           <div class="col-lg-6">
                <div class="panel panel-danger">
                     <div class="panel-heading">¿Conoce el término cáncer de mama?</div>
                        <div class="panel-body">

                        <ul class="list-group">

                            <li class="list-group-item"> <div class="radio">
                                    <label><input type="radio" name="Primero_que_piensa_4" value="Nada">Nada</label>
                               </div></li>
                            <li class="list-group-item"><div class="radio">
                                    <label><input type="radio" name="Primero_que_piensa_4" value="Muerte">Muerte</label>
                               </div></li>
                             <li class="list-group-item"> <div class="radio">
                                     <label><input type="radio" name="Primero_que_piensa_4" value="Desesperanza">Desesperanza</label>
                               </div></li>
                            <li class="list-group-item"><div class="radio">
                                    <label><input type="radio" name="Primero_que_piensa_4" value="Resistencia">Resistencia</label>
                               </div></li>
                             <li class="list-group-item"> <div class="radio">
                                     <label><input type="radio" name="Primero_que_piensa_4" value="Tristeza">Tristeza</label>
                               </div></li>
                            <li class="list-group-item"><div class="radio">
                                    <label><input type="radio" name="Primero_que_piensa_4" value="Felicidad">Felicidad</label>
                               </div></li>
                             <li class="list-group-item"> <div class="radio">
                                     <label><input type="radio" name="Primero_que_piensa_4" value="Miedo">Miedo</label>
                               </div></li>
                            <li class="list-group-item"><div class="radio">
                                    <label><input type="radio" name="Primero_que_piensa_4" value="Preocupación">Preocupación</label>
                               </div></li>
                               <li class="list-group-item"><div class="radio">
                                       <label><input type="radio" name="Primero_que_piensa_4" value="Esperanza">Esperanza</label>
                               </div></li>
                               <h5>Escriba otra</h5> 
                               <input type="text" class="form-control" name="otro-pensamiento" aria-describedby="basic-addon1">
                        </ul>
                            
                             <input type="submit" name="enviar" value="enviar">
                     </div>

                  </div>
             </div>       
       </div>
    </form>
    
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>