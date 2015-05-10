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
          <title>Encuesta #2</title>
          <div class="container">
              <h1>Plantilla #3</h1>
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
      
       <div class="container">
           <div class="col-lg-6">
           <div class="panel panel-danger">
                <div class="panel-heading">¿Le gustaría recibir información del cáncer de mama?</div>
                   <div class="panel-body">
                       
                        <ul class="list-group">
                   <li class="list-group-item"> <div class="radio">
                        <label><input type="radio" name="optradio1">Si</label>
                      </div></li>
                   <li class="list-group-item"><div class="radio">
                        <label><input type="radio" name="optradio2">No</label>
                      </div></li>.
                      </ul>
                       <h5> ¿Por cuál medio?</h5>
                       
                      
                        <div class="dropdown">
                             <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
                               Medios
                               <span class="caret"></span>
                             </button>
                             <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                               <li role="presentation"><a role="menuitem" tabindex="1" href="#">Radio</a></li>
                               <li role="presentation"><a role="menuitem" tabindex="2" href="#">Cine</a></li>
                               <li role="presentation"><a role="menuitem" tabindex="3" href="#">Prensa/revistas</a></li>
                             </ul>
                         </div>
                       
                       <div class="dropdown">
                             <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-expanded="true">
                               Redes sociales
                               <span class="caret"></span>
                             </button>
                             <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu2">
                               <li role="presentation"><a role="menuitem" tabindex="1" href="#">Twitter</a></li>
                               <li role="presentation"><a role="menuitem" tabindex="2" href="#">Cine</a></li>
                               <li role="presentation"><a role="menuitem" tabindex="3" href="#">Prensa/revistas</a></li>
                             </ul>
                         </div>
                       
                       <br>
                       
                        <a type="button" class="btn btn-danger"   href="http://localhost/GlobalQuest2/Encuestador/Encuesta_7.php">Siguiente</a>
                </div>
               
             </div>
        </div>       
       </div>
      <section class="main">
          
      </section>
    
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>