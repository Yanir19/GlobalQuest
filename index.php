

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
	<link href="css/textoestilos1.css" rel="stylesheet">
	<link href="css/estilos2.css" rel="stylesheet">
	
	

  
  </head>
  <body onLoad="localizame()">
      
		  <!-- Cabecera de la pagina -->
    
     <div class="navbar navbar-inverse navbar-static-top">
      <div class="container">
        <div class="row">
          <div class="col-sm-2">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <div class="navbar-brand">
                <h3> GLOBALQUEST</h3>
              </div>
            </div>
          </div>
          <div class="col-sm-12">
            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li class="for-individuals"><a href="encontrousuario.php">Encuestas</a></li>
                <li class="for-providers"><a href="encontrousuario.php">Quienes somos</a></li>
              </ul>
			 
                <form method="POST" action="validar_usuario.php"  class="navbar-form navbar-left navbar-right" role="search">
                  <div class="form-group">
                    <input name="n_usuario" type="text" class="form-control" placeholder="Usuario">
                    <input  name="pwd" type="text" class="form-control" placeholder="contraseña">
                  </div>
                  <button  name="enviar_btns"type="submit" class="btn btn-default" value="enviar_btn">Ingresar</button>
                </form>

            </div><!--/.nav-collapse -->
          </div>
        </div>
      </div>
    </div>
    
	<!-- Contenido de la pagina -->
	<header>
	  <div class="container" >
		<div class="row">
		  <div class="col-sm-12">	
			<h2>ENCUESTAS A TU ALCANCE </h2>
			</br>
		  </div>
		  
		</div>
		
		<div class="row" align="right" >
		  <div class="col-sm-12">
			<h1>Nunca habia sido tan sencillo</h1>
		  </div>
		</div>
	  </div>
    </header>
	
  <!-- Footer de la pagina -->
   <footer class="fixed">
      <div class="container">
        <div class="row">
          <div class="col-sm-6 copyright">
            <p>2015 GlobalQuest, Inc. All rights reserved.</p>
          </div>
        </div>
      </div>
   </footer>
  
      
	
		
		
      <section class="main">
      </section>
	  
	  
	  
	  
	  
    
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>