<?php
					$deltaLatitude = deg2rad(8.007556673489722- 8.3280911);
					
					$deltaLongitude = deg2rad(-62.38861083984375 - -62.6349537);
					
					$a = sin($deltaLatitude / 2) * sin($deltaLatitude / 2) +
						 cos(deg2rad(8.3280911)) * cos(deg2rad(8.007556673489722)) *
						 sin($deltaLongitude / 2) * sin($deltaLongitude / 2);
					
					$c = 2 * atan2(sqrt($a), sqrt(1-$a));
					
					$distancia= 6371 * $c;
					echo $distancia;
					
					if($distancia <= 100){
						echo "MAYOR";
					}else{
						echo "MENOR";
					}
					
?>