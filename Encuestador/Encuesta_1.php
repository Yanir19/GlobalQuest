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
          <title>Encuesta #1</title>
          <div class="container">
              <h1>Encuesta #1</h1>
          </div>
      </header>
      
       <?php
  
            $_SESSION["edad"] =  $_POST['edad'] ;
            $_SESSION["escuela"] = $_POST['escuela'];
            $_SESSION["sexo"] =  $_POST['sexo'] ;
            

            echo $_SESSION["edad"] ;
            echo $_SESSION["escuela"];
            echo $_SESSION["sexo"]
        ?>
    <form action="Encuesta_2.php" method="post" >
        <div class="container">
           <div class="col-lg-6">
                <div class="panel panel-danger">
                     <div class="panel-heading">¿Conoce el término cáncer de mama?</div>
                        <div class="panel-body">

                                 <ul class="list-group">
                                        <p>
                                         <li class="list-group-item"> <div class="radio">
                                              <label><input type="radio" name="optradio" value="S">Si</label>
                                            </div></li>
                                         <li class="list-group-item"><div class="radio" >
                                              <label><input type="radio" name="optradio" value="N" >No</label>
                                            </div></li>
                                        </p>
                                 </ul>
                                 
                                        <h5> Insertar una breve descripción del cáncer de mama.</h5>
                                         <textarea class="form-control" name="descripcion" rows="3"></textarea>
                                         
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