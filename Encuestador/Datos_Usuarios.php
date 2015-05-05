
<!DOCTYPE html>

<?php
    include ("../Conexion/BD_Conector.php");
?>
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
          <title>Datos de usuario.</title>
          <div class="container">
              <h1>Datos de usuario.</h1>
          </div>
      </header>
    <from name ="datos_de_usuarios" type="sumit" action ="../Conexion/BD_Conector.php" method ="POST">
      
      
       <div class="container">
           <div class="col-lg-6">
                <div class="panel panel-danger">
                    <div class="panel-heading">Datos del usario</div>
                    <div class="panel-body">

                         <div class="input-group">
                             <input type="text" class="form-control" placeholder="Nombre" aria-describedby="basic-addon1">
                         </div>
                        <div class="input-group">
                             <input type="text" class="form-control" placeholder="Edad" aria-describedby="basic-addon1">
                         </div>
                        <br>
                        <div class="dropdown">
                              <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-expanded="true">
                                Sexo
                                <span class="caret"></span>
                              </button>
                              <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu2">
                                <li role="presentation"><a role="menuitem" tabindex="1" href="#">Masculino</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="2" href="#">Femenino</a></li>
                              </ul>
                          </div>
                        <br>
                        <div class="input-group">
                             <input type="text" class="form-control" placeholder="Escuela" aria-describedby="basic-addon1">
                         </div>

                        <br>
                        <a type="button" class="btn btn-danger"   href="http://localhost/GlobalQuest2/Encuestador/Encuesta_1.php">Siguiente</a>
                     </div>

                 </div>
            </div>     
        </div>
    </from>
  
  
      <section class="main">
          
      </section>
    
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>