
<!DOCTYPE html>

<?php
    include ("../Conexion/Datos_de_encuesta.php");
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
                            <form action="Encuesta_1.php" method="post" >
                                <div class="input-group">
                                    <input type="text" name="nombre" class="form-control" placeholder="Nombre" aria-describedby="basic-addon1">
                                </div>
                               <div class="input-group">
                                   <input type="text" name="edad" class="form-control" placeholder="Edad" aria-describedby="basic-addon1">
                                </div>
                               <br>
                               
                               <h5> Sexo </h5>
                               <ul class="list-group">
                                    <li class="list-group-item"> <div class="radio">
                                         <label><input type="radio" name="sexo" value="Masculino">Masculino</label>
                                       </div></li>
                                    <li class="list-group-item"><div class="radio" >
                                         <label><input type="radio" name="sexo" value="Femenino" >Femenino</label>
                                       </div></li>
                                </ul>

                               <br>
                               <div class="input-group">
                                    <input type="text" class="form-control" name="escuela" placeholder="Escuela" aria-describedby="basic-addon1">
                                </div>

                               <br>
                               <input type="submit" name="enviar" value="enviar">

                            </form >
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