<script>

function mostrar_ocultar(pregunta){
    switch(pregunta){
        case 0:
            document.getElementById("encuestado").style.display = "block";
            document.getElementById("parte1").style.display = "none";
            document.getElementById("parte2").style.display = "none";
            document.getElementById("parte3").style.display = "none";
            document.getElementById("parte4").style.display = "none";
            break;
        case 1:
            document.getElementById("encuestado").style.display = "none";
            document.getElementById("parte1").style.display = "block";
            document.getElementById("parte2").style.display = "none";
            document.getElementById("parte3").style.display = "none";
            document.getElementById("parte4").style.display = "none";
            break;
        case 2:
            document.getElementById("encuestado").style.display = "none";
            document.getElementById("parte1").style.display = "none";
            document.getElementById("parte2").style.display = "block";
            document.getElementById("parte3").style.display = "none";
            document.getElementById("parte4").style.display = "none";
            break;
        case 3:
            document.getElementById("encuestado").style.display = "none";
            document.getElementById("parte1").style.display = "none";
            document.getElementById("parte2").style.display = "none";
            document.getElementById("parte3").style.display = "block";
            document.getElementById("parte4").style.display = "none";
            break;
        case 4: 
            document.getElementById("encuestado").style.display = "none";
            document.getElementById("parte1").style.display = "none";
            document.getElementById("parte2").style.display = "none";
            document.getElementById("parte3").style.display = "none";
            document.getElementById("parte4").style.display = "block";
            break;
    }  
}
/*
function validar(){
    if ((document.getElementById("respuesta1").v || !$descripcion1 || !$respuesta_2 || !$frecuencia_2 || !$otros_examenes_2 || !$razones_ning_exam_2 || !$primero_que_piensa_4 || !$respuesta_3 || !$reaccion_3 || !$respuesta_4 || !$medio_4 || !$redes_4 || !$focus_group_4){
    
    }
}*/


</script>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/bootstrap-theme.min.css" rel="stylesheet">
        <script src=" ../js/main.js"></script>

    </head>
    <body onload="mostrar_ocultar(0)">
        <header>
            <title>Encuesta Cancer de mama</title>
            <div class="container">
            </div>
        </header>
        
        <?php require_once('../Modulos/navbar.php'); ?>
        
        <form method="POST" action="../Encuestador/guardar_encuesta.php"> 
            
            <!---------------------------  DATOS ENCUESTADO  --------------------------->
            <div class="container" id='encuestado'>
                <div class="col-xs-12 col-sm-12">   
                    <div class="panel panel-danger ">
                        <div class="panel-heading ">Datos del Encuestado</div>
                        <div class="panel-body">
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
            
            <!---------------------------  PREGUNTA 1  --------------------------->    
            <div class="container" id='parte1'>
                <div class="col-xs-12 col-sm-12">   
                    <div class="panel panel-danger ">
                        <div class="panel-heading ">1. Cáncer de mama</div>
                        <div class="panel-body">
                            <h5>¿Conoce el término cáncer de mama?</h5>
                            <select class="form-control" name="respuesta_1" id='respuesta_1' required>
                                <option  value=""></option>
                                <option  value="S">SI</option>
                                <option  value="N">NO</option>
                            </select>
                            <br>
                            <h5> Insertar una breve descripción del cáncer de mama.</h5>
                            <textarea class="form-control" rows="3" name="descripcion_1" id="descripcion_1" required></textarea>
                            <nav>
                                <ul class="pager">
                                    <li><button type="button" class="btn btn-default" onclick="mostrar_ocultar(0)">ANTERIOR </button></li>
                                    <li><button type="button" class="btn btn-default" onclick="mostrar_ocultar(2)">SIGUIENTE</button></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>       
            </div>   

            <!---------------------------  PREGUNTA 2  --------------------------->
            <div class="container" id='parte2'>
                <div class="col-xs-12 col-sm-12">   
                    <div class="panel panel-danger ">
                        <div class="panel-heading ">2. Autoexamen del Seno</div>
                        <div class="panel-body">
                            <h5>¿Conoce cómo realizarse el auto examen?</h5>
                            <select class="form-control" name="respuesta_2" id="respuesta_2" required>
                                <option  value=""></option>
                                <option  value="S">SI</option>
                                <option  value="N">NO</option>
                            </select>
                            <br>
                            <h5>¿Con qué frecuencia lo hace?</h5>
                            <select class="form-control" name="frecuencia_2" id="frecuencia_2" required>
                                <option  value=""></option>
                                <option  value="semanal">Una vez a la Semana</option>
                                <option  value="mensual">Una vez al Mes</option>
                                <option  value="anual">Una vez al Año</option>
                                <option  value="nunca">Nunca</option>
                            </select>
                            <br>
                            <h5> ¿Conoce otro examen que ayude a la detección del cáncer de mama?</h5>
                            <select class="form-control" name="otros_examenes_2" id="otros_examenes_2" required>
                                <option  value=""></option>
                                <option  value="mamografia">Mamografía</option>
                                <option  value="eco_mamario">Eco Mamario</option>
                                <option  value="examen_por_medico">Examen realizado por un médico</option>
                                <option  value="todos_anteriores">Todos los anteriores</option>
                                <option  value="no_conozco">No Conozco</option>
                            </select>
                            <br>
                            <h5> Si no se ha realizado ninguno de estos exámenes ¿Cuál es la razón?</h5>
                            <select class="form-control" name="razones_ning_exam_2" id="razones_ning_exam_2" required>
                                <option  value=""></option>
                                <option  value="desinformacion">Desinformación</option>
                                <option  value="no_se_realizar">No se cómo realizar el auto examen</option>
                                <option  value="muy_joven">Considero que estoy joven para realizarlo</option>
                                <option  value="nunca_al_medico">Nunca he asistido a un médico que evalúe mis senos</option>
                            </select>
                            <nav>
                                <ul class="pager">
                                    <li><button type="button" class="btn btn-default" onclick="mostrar_ocultar(1)">ANTERIOR </button></li>
                                    <li><button type="button" class="btn btn-default" onclick="mostrar_ocultar(3)">SIGUIENTE</button></li>
                                </ul>
                            </nav>
                        </div>
                    </div> 
                </div>       
            </div> 

            <!---------------------------  PREGUNTA 3  --------------------------->    
            <div class="container" id='parte3'>
                <div class="col-xs-12 col-sm-12">   
                    <div class="panel panel-danger ">
                        <div class="panel-heading ">3. El Cáncer </div>
                        <div class="panel-body">
                            <h5>¿Cuándo escucha/lee/ve la palabra cáncer qué es lo primero que se le viene a la mente?</h5>

                            <ul class="col-xs-12 col-sm-12 radio">
                    
                                <li class=" col-xs-6 col-sm-6 "> 
                                    <label><input type="radio" name="primero_que_piensa_4" value="nada" checked>Nada</label>
                                </li>
                                <li class=" col-xs-6 col-sm-6 ">
                                    <label><input type="radio" name="primero_que_piensa_4" value="felicidad" >Felicidad</label>
                                </li>  
                                <br>
                                <li class=" col-xs-6 col-sm-6 "> 
                                    <label><input type="radio" name="primero_que_piensa_4" value="muerte" >Muerte</label>
                                </li>
                                <li class=" col-xs-6 col-sm-6 ">
                                    <label><input type="radio" name="primero_que_piensa_4" value="miedo" >Miedo</label>
                                </li> 
                                <br>
                                <li class=" col-xs-6 col-sm-6 "> 
                                    <label><input type="radio" name="primero_que_piensa_4" value="desesperanza" >Desesperanza</label>
                                </li>
                                <li class=" col-xs-6 col-sm-6 ">
                                    <label><input type="radio" name="primero_que_piensa_4" value="preocupacion" >Preocupación</label>
                                </li> 
                                <br>
                                <li class=" col-xs-6 col-sm-6 "> 
                                    <label><input type="radio" name="primero_que_piensa_4" value="resistencia" >Resistencia</label>
                                </li>
                                <li class=" col-xs-6 col-sm-6 ">
                                    <label><input type="radio" name="primero_que_piensa_4" value="esperanza" >Esperanza</label>
                                </li> 
                                <br>
                                <li class=" col-xs-6 col-sm-6 "> 
                                    <label><input type="radio" name="primero_que_piensa_4" value="tristeza" >Tristeza</label>
                                </li>
                                <li class=" col-xs-6 col-sm-6 ">
                                    <label><input type="radio" name="primero_que_piensa_4">Otro (Escriba)</label>
                                    <input type="text" class="form-control" name="primero_que_piensa_3"> 
                                    <br> 
                                </li> 
                            </ul>
                            
                            <h5> ¿Ha tenido algún caso de cáncer en su familia?</h5>
                            <select class="form-control" name="respuesta_3" id="respuesta_3" required>
                                <option  value=""></option>
                                <option  value="S">SI</option>
                                <option  value="N">NO</option>
                            </select>
                            <br>
                            <h5> ¿Cuál fue su reacción ante ésta situación?</h5>
                            <select class="form-control" name="reaccion_3" id="reaccion_3" required>
                                <option  value=""></option>
                                <option  value="esperanza">Lo afrontamos con esperanza y energía</option>
                                <option  value="tristeza">Tristeza y desesperanza</option>
                                <option  value="tristeza/esperanza">Primero triste y luego esperanzador</option>
                                <option  value="no_tuve">No tuve ésta situación</option>
                            </select>
                            <nav>
                                <ul class="pager">
                                    <li><button type="button" class="btn btn-default" onclick="mostrar_ocultar(2)">ANTERIOR </button></li>
                                    <li><button type="button" class="btn btn-default" onclick="mostrar_ocultar(4)">SIGUIENTE</button></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>       
            </div> 

            <!---------------------------  PREGUNTA 4  --------------------------->
            <div class="container" id='parte4'>
                <div class="col-xs-12 col-sm-12">   
                    <div class="panel panel-danger ">
                        <div class="panel-heading ">4. Información al Respecto</div>
                        <div class="panel-body">
                            <h5>¿Le gustaría recibir información del cáncer de mama?</h5>
                            <select class="form-control" name="respuesta_4" id="respuesta_4" required>
                                <option  value=""></option>
                                <option  value="S">SI</option>
                                <option  value="N">NO</option>
                            </select>
                            <br>
                            <h5>¿Por cuál medio le gustaría recibirla?</h5>
                            <select class="form-control" name="medio_4" id="medio_4" required>
                                <option  value=""></option>
                                <option  value="radio">Radio</option>
                                <option  value="cine">Cine</option>
                                <option  value="prensa/revistas">Prensa/Revistas</option>
                            </select>
                            <br>
                            <h5> ¿Por cuál red social?</h5>
                            <select class="form-control" name="redes_4" id="redes_4" required>
                                <option  value=""></option>
                                <option  value="twitter">Twitter</option>
                                <option  value="instagram">Instagram</option>
                                <option  value="facebook">Facebook</option>
                                <option  value="youtube">Youtube</option>
                            </select>
                            <br>
                            <h5> ¿Te gustaría asistir a un Focus Group informativo sobre la detección precoz del cáncer de mama?</h5>
                            <select class="form-control" name="focus_group_4" id="focus_group_4" required>
                                <option  value=""></option>
                                <option  value="S">SI</option>
                                <option  value="N">NO</option>
                            </select>
                            <nav>
                                <ul class="pager">
                                    <li><button type="button" class="btn btn-default" onclick="mostrar_ocultar(3)">ANTERIOR</button></li>
                                    <li><button type="submit" class="btn btn-danger" >GUARDAR </button></li>
                                </ul>
                            </nav>
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