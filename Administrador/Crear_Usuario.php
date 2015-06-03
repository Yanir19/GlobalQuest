
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
        <form method="POST" action="guardar_usuario.php"> 
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
                            <h5>Fecha de Nacimiento</h5>
                            <input type="date" class="form-control" name="nacimiento" id="nacimiento" required>
                            <br>
                            <h5>Rol</h5>
                            <select class="form-control" name="rol" id='rol' required>
                                <option  value=""></option>
                                <option  value="1">Encuestador</option>
                                <option  value="2">Administrador</option>
                            </select>
                            <br>
                            <h5>Contraseña</h5>
                            <input type="text" class="form-control" name="passwd" id="passwd" required>
                            <br>
                            <div style="text-align: center">
                                <button type="submit" class="btn btn-danger">GUARDAR</button>
                            </div>    
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