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
              <h1>Plantilla #2</h1>
          </div>
      </header>
      
    <?php  
  
        if(isset($_POST['optradio']))
       {
            $_SESSION["Respuesta_1"] =  $_POST['optradio'] ;
            $_SESSION["Descripcion"] = $_POST['descripcion'];
       }else{
           echo "no se recibio lo que se esperaba";
       }
        echo $_SESSION["edad"] ;
        echo $_SESSION["escuela"];
        echo $_SESSION["Respuesta_1"] ;
        echo $_SESSION["Descripcion"];
      ?>
      <form action="Encuesta_3.php" method="post" >
          
        <div class="container">
           <div class="col-lg-6">
            <div class="panel panel-danger">
                 <div class="panel-heading">¿Conoce cómo realizarse el auto examen?</div>
                    <div class="panel-body">

                         <ul class="list-group">
                             <li class="list-group-item"> <div class="radio">
                                  <label><input type="radio" name="respuesta_2" value="S">Si</label>
                                </div></li>
                             <li class="list-group-item"><div class="radio"  value="N">
                                     <label><input type="radio" name="respuesta_2" value="N">No</label>
                                </div></li>
                         </ul>
                        
                        <h5> ¿Con qué frecuencia lo hace?</h5>

                         <ul class="list-group">
                             <li class="list-group-item"> <div class="radio">
                                  <label><input type="radio" name="frecuencia_2" value="Antes y después del periodo">Antes y después del periodo</label>
                                </div></li>
                             <li class="list-group-item"><div class="radio" value="1 vez al mes">
                                  <label><input type="radio" name="frecuencia_2">1 vez al mes</label>
                                </div></li>
                                <li class="list-group-item"> <div class="radio">
                                  <label><input type="radio" name="frecuencia_2" value="1 vez a la semana">1 vez a la semana</label>
                                </div></li>
                             <li class="list-group-item"><div class="radio" value="1 vez al año">
                                  <label><input type="radio" name="frecuencia_2">1 vez al año</label>
                                </div></li>
                         </ul>

                          <h5> ¿Conoce otro examen que ayude a la detección del cáncer de mama?</h5>

                        <ul class="list-group">
                             <li class="list-group-item"> <div class="radio">
                                     <label><input type="radio" name="conoce-otros-examenes_2" value="S">Si</label>
                                </div></li>
                             <li class="list-group-item"><div class="radio">
                                     <label><input type="radio" name="conoce-otros-examenes_2" value="N">No</label>
                                </div></li>.
                       </ul>

                        <h5> ¿Cuál (es)?</h5>

                       <ul class="list-group">
                         <li class="list-group-item"> <div class="radio">
                                 <label><input type="radio" name="otros-examenes_2" value="Mamografía">Mamografía</label>
                            </div></li>
                         <li class="list-group-item"><div class="radio">
                                 <label><input type="radio" name="otros-examenes_2" value="Eco Mamario">Eco Mamario</label>
                            </div></li>
                         <li class="list-group-item"><div class="radio">
                                 <label><input type="radio" name="otros-examenes_2" value="Examen realizado por un médico">Examen realizado por un médico</label>
                          </div></li>
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