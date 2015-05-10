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
          <title>Encuesta #5</title>
          <div class="container">
              <h1>Plantilla #5</h1>
          </div>
      </header>
      
      <?php  
    
        
        $_SESSION["Primero_que_piensa_4"] =  $_POST['Primero_que_piensa_4'] ;
        $_SESSION["otro-pensamiento"] =  $_POST['otro-pensamiento'] ;
        echo $_SESSION["edad"] . "/ " ;
        echo $_SESSION["escuela"] . "/ ";
        echo $_SESSION["Respuesta_1"] . "/ ";
        echo $_SESSION["Descripcion"] . "/ ";
        echo $_SESSION["respuesta_2"] . "/ ";
        echo $_SESSION["frecuencia_2"] . "/ ";
        echo $_SESSION["conoce-otros-examenes_2"] . "/ " ;
        echo $_SESSION["otros-examenes_2"] . "/ " ;
        echo $_SESSION["Razones_ning_exam_3"] . "/ " ;
        echo $_SESSION["Primero_que_piensa_4"] . "/ " ;
        echo $_SESSION["otro-pensamiento"] . "/ " ;
      ?>
      
      
    <form action="Encuesta_6.php" method="post" > 
        
        <div class="container">
           <div class="col-lg-6">
                <div class="panel panel-danger">
                     <div class="panel-heading">¿Conoce cómo realizarse el auto examen?</div>
                        <div class="panel-body">

                             <ul class="list-group">
                                 <li class="list-group-item"> <div class="radio">
                                         <label><input type="radio" name="Respuesta_5" value="S">Si</label>
                                    </div></li>
                                 <li class="list-group-item"><div class="radio">
                                         <label><input type="radio" name="Respuesta_5" value="N">No</label>
                                    </div></li>
                             </ul>
                            <h5> ¿Cuál fue su reacción ante ésta situación?</h5>


                             <ul class="list-group">
                                 <li class="list-group-item"> <div class="radio">
                                         <label><input type="radio" name="Reaccion_5" value="Lo afrontamos con esperanza y energía">Lo afrontamos con esperanza y energía</label>
                                    </div></li>
                                 <li class="list-group-item"><div class="radio">
                                         <label><input type="radio" name="Reaccion_5" value="Tristeza y desesperanza">Tristeza y desesperanza</label>
                                    </div></li>
                                 <li class="list-group-item"><div class="radio">
                                         <label><input type="radio" name="Reaccion_5" value="Al principio triste y luego esperanzador">Al principio triste y luego esperanzador</label>
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