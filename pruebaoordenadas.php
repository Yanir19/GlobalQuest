<script>
  	var latitud;
		var longitud;
	function getLocation() {
		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(showPosition);
		} else { 
			x.innerHTML = "Geolocation is not supported by this browser.";
		}
	}

	function showPosition(position) {
		latitud = position.coords.latitude;
	longitud = position.coords.longitude;	
		 

	}
</script>
<?php
            session_start();
echo '
 <!DOCTYPE html>      
      <html>
		<head>
            
              <title>'.$_SERVER["PHP_SELF"].'</title>
            
      </head>
     
            
      <body onLoad="getLocation()">';
echo '<script languaje="JavaScript">
            
      var varjs="variable en JavaScript ";
      var varjs2="variable en JavaScript 22 ";
	
			
			 
			
</script>';



if (!( isset($_POST['variable_php']) AND isset($_POST['variable2_php'])))
            
{
echo '<script>localizame();</script>';
       
      echo '<form action="'.$_SERVER["PHP_SELF'"].'" method=post name=pasar>
            
              <input type=hidden name=variable_php>
			  <input type=hidden name=variable2_php>
			  </form>';
            
	  echo '<script>
			document.write(latitud);
	  
			</script>';
      echo '<script languaje="JavaScript">
            alert(latitud);
              document.pasar.variable_php.value=latitud;
            document.pasar.variable2_php.value=longitud;
              document.pasar.submit();
			  
            
</script>';   
            
}     
           
      echo "Valor de la variable en PHP:". $_POST['variable_php'] ; 
	  echo "Valor de la variable 2 en PHP:". $_POST['variable2_php'] ; 
	  if (isset($_POST["variable_php"])){ 
		$_SESSION["latitud1"] =  $_POST['variable_php'];
	  
	  }

            
echo "<a href=$_SERVER[PHP_SELF]>Recargar la Página</a>";
          

	  
echo '</body>
            
      </html>';
	  

?>