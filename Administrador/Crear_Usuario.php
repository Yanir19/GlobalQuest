
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
      <?php require_once('../Modulos/navbar.php'); ?>
      
        <header>
          <title>Crear Usuario</title>
        </header>
        <from name ="datos_de_usuarios" type="sumit" action ="../Conexion/BD_Conector.php" method ="POST">
        
            <div class="container" >
                <div class="col-xs-12 col-sm-12">   
                    <div class="panel panel-danger ">
                        <div class="panel-heading" style="height: 50px; font-size: 20px">Crear Usuario</div>
                        <div class="panel-body">
                            <h5>Nombre</h5>
                            <input type="text" class="form-control" name="nombre" id="nombre" required>
                            <br>
                            <h5>Apellido</h5>
                            <input type="text" class="form-control" name="apellido" id="apellido" required>
                            <br>
                            <h5>Escuela</h5>
                            <input type="text" class="form-control" name="escuela" id="escuela" required>
                            <br>
                            <h5>Edad</h5>
                            <input type="text" class="form-control" name="edad" id="edad" required>
                            <br>
                            <h5>Sexo</h5>
                            <select class="form-control" name="sexo" id='sexo' required>
                                <option  value=""></option>
                                <option  value="M">Masculino</option>
                                <option  value="F">Femenino</option>
                            </select>
                            <br>
                            <h5>Escuela</h5>
                            <input type="text" class="form-control" name="escuela" id="escuela" required>
                            <br>
                            <h5>E-mail (Opcional)</h5>
                            <input type="text" class="form-control" name="email" id="email" >
                            <nav>
                                <ul class="pager">
                                    <li><button type="button" class="btn btn-default" onclick="mostrar_ocultar(1)">SIGUIENTE</button></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>       
            </div>  
      
      
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