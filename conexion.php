<?php


if (isset($_POST["enviar_btns"])){ 
    echo("Los datos se recibieron correctamente");
    $usuario = $_POST["n_usuario"];
    $password = $_POST["pwd"];
    echo "los datos son: $usuario , $password";
    
}


 class Conectar{ 
    public function con(){
        
        $cadena="'localhost','root','1234'";
        $con = mysql_connect($cadena) or die ('<!DOCTYPE html>
                                            <HTML>
                                               <HEAD>
                                                  <TITLE>Error de conexion</TITLE>
                                               </HEAD>Error de conexion
                                            </HTML>');
		mysql_select_db('mydb',$con);									
        return $con;
    } 
    
 }
 
 
 class Trabajo extends Conectar
 {
     private $t;
     public function _construct()
     {
        $this ->t=array();
     }
     
     public function get_bancos(){
    if (isset($_POST["enviar_btns"])){
        $sql = "select * from banco;";
        $res = pg_query(parent::con(),$sql);
        while($reg = pg_fetch_assoc($res)){
            $this->t[]=$reg;
        } 
    }
        return $this->t;
    
     }
     
     public function get_listado_empleados_activos(){
        if (isset($_POST["empleados_activos"])){
            $sql = "SELECT fichaempleado,nombre,estatus,fechaing,fechaeg,codbanco,codsucursal 
                    FROM empleado 
                    WHERE estatus='A' 
                    ORDER BY codbanco,codsucursal ;";
            $res = pg_query(parent::con(),$sql);
            while($reg = pg_fetch_assoc($res))
            {
                $this->t[]=$reg;
            } 
        }   
        return $this->t;
        
     }
     
     public function get_vigilantes_contratados(){
        if (isset($_POST["enviar_fechas"],$_POST["fecha_desde"],$_POST["fecha_hasta"])){
            $sql =sprintf
          ( "SELECT * FROM contrata WHERE 
                    fechacontrato BETWEEN '%s' AND '%s'
                    ORDER BY codbanco,codsucursal; ",$_POST["fecha_desde"],$_POST["fecha_hasta"]
                    );
            $res = pg_query(parent::con(),$sql);
            while($reg = pg_fetch_assoc($res))
            {
                $this->t[]=$reg;
            } 
        }   
        return $this->t;
        
     }
     

     public function get_mayor_contrato(){
        if (isset($_POST["enviar_fechas"],$_POST["fecha_desde"],$_POST["fecha_hasta"])){
            $sql =sprintf
          ( " SELECT codbanco,codsucursal,count(*) AS contratos FROM contrata WHERE 
                    fechacontrato BETWEEN '%s' AND '%s' group by codsucursal,codbanco order by contratos DESC ",
                    $_POST["fecha_desde"],$_POST["fecha_hasta"]
                    );
            $res = pg_query(parent::con(),$sql);
            while($reg = pg_fetch_assoc($res))
            {
                $this->t[]=$reg;
            } 
        }   
        return $this->t;
        
     }
     
     
     public function get_numero_empleados($banco,$sucursal){
       $empleados=0;
            $sql =sprintf
          ( " SELECT count(*) as nroempleados FROM empleado 
                WHERE codbanco=%s
                AND codsucursal=%s
                AND estatus='A' or estatus= 'a' ;",$banco,$sucursal
                    );
            $res = pg_query(parent::con(),$sql);
            $reg = pg_fetch_row($res);
            $empleados = $reg[0];
            
       
        return $empleados;
        
     }
     
     public function get_cinco_delincuentes_mayorDelitos(){
       if (isset($_POST["enviar_fechasD"],$_POST["fecha_desde"],$_POST["fecha_hasta"])){
            $sql =sprintf
          ( " SELECT c.ceduladelincuente,delito.codbanco,delito.codsucursal, COUNT(*) as nroveces 
              FROM delito, comete as c 
              WHERE 
			     delito.nroexpediente=c.nroexpediente AND
       	         delito.fecha between '%s' AND '%s'
			     group by c.ceduladelincuente,delito.codbanco,delito.codsucursal
			     order by nroveces DESC ,c.ceduladelincuente LIMIT 5",
                    $_POST["fecha_desde"],$_POST["fecha_hasta"]
                    );
            $res = pg_query(parent::con(),$sql);
            while($reg = pg_fetch_assoc($res))
            {
                $this->t[]=$reg;
            } 
        }   
        return $this->t;  
     }
     
     public function get_bandas_nmiembros(){
       
            $sql =sprintf
          ( " SELECT DISTINCT(banda.nombre),banda.nromiembros
                FROM banda, delito, delincuente as d, comete as c
                WHERE
                	banda.nrobanda=d.nrobanda AND
                	delito.nroexpediente=c.nroexpediente AND 
                	d.cedula=c.ceduladelincuente
                group by delito.codbanco,d.nombre,banda.nombre,banda.nromiembros
                HAVING COUNT(*) >= 2
                order by banda.nombre,banda.nromiembros ASC
            ");
            $res = pg_query(parent::con(),$sql);
            while($reg = pg_fetch_assoc($res))
            {
                $this->t[]=$reg;
            } 
           
        return $this->t;  
     }
     
     
     public function get_bandas_delitosreincididos(){
       
            $sql =sprintf
          ( " SELECT banda.nombre as banda,d.nombre as delincuente,delito.codbanco,banda.nromiembros, COUNT(*) as veces
                FROM banda, delito, delincuente as d, comete as c
                WHERE
                	banda.nrobanda=d.nrobanda AND
                	delito.nroexpediente=c.nroexpediente AND 
                	d.cedula=c.ceduladelincuente
                group by delito.codbanco,d.nombre,banda.nombre,banda.nromiembros
                HAVING COUNT(*) >= 2
                order by banda.nombre,banda.nromiembros desc

            ");
            $res = pg_query(parent::con(),$sql);
            while($reg = pg_fetch_assoc($res))
            {
                $this->t[]=$reg;
            } 
           
        return $this->t;  
     }
     
     public function get_delincuentes_periodo(){
       if (isset($_POST["enviar_fechasDP"],$_POST["fecha_desde"],$_POST["fecha_hasta"])){
            $sql =sprintf
          ( " SELECT d.cedula, d.nombre, d.apellido,d.alias,banda.nombre as Banda,banco.denominacion,sucursal.codsucursal
                FROM delincuente as d, delito,banda,comete,sucursal,banco
                WHERE 
                	banco.codigobanco=delito.codbanco AND
                	sucursal.codsucursal=delito.codsucursal AND
                	sucursal.codbanco=delito.codbanco AND
                	delito.nroexpediente=comete.nroexpediente AND
                	comete.ceduladelincuente=d.cedula AND
                	d.nrobanda=banda.nrobanda AND
                	delito.fecha between '%s' AND '%s' AND
                	delito.anoscondena>1
                ORDER BY banco.denominacion,sucursal.codsucursal",
              $_POST["fecha_desde"],$_POST["fecha_hasta"]
             );
            $res = pg_query(parent::con(),$sql);
            while($reg = pg_fetch_assoc($res))
            {
                $this->t[]=$reg;
            } 
        }   
        return $this->t;  
     }
     
     public function get_entidadesbancarias_delitosPeriodo(){
       if (isset($_POST["enviar_fechasED"],$_POST["fecha_desde"],$_POST["fecha_hasta"])){
            $sql =sprintf
          ( " SELECT banco.denominacion, sucursal.codbanco,sucursal.codsucursal, COUNT(sucursal.codsucursal) as vecesatracada
                FROM banco,delito,sucursal
                WHERE 
                	banco.codigobanco=delito.codbanco AND
                	banco.codigobanco=sucursal.codbanco AND
                	delito.codbanco=banco.codigobanco AND
                	delito.codsucursal=sucursal.codsucursal AND
                	delito.fecha BETWEEN '%s' AND '%s'
                GROUP BY banco.denominacion ,sucursal.codbanco,sucursal.codsucursal
                	
                ORDER BY banco.denominacion",
              $_POST["fecha_desde"],$_POST["fecha_hasta"]
             );
            $res = pg_query(parent::con(),$sql);
            while($reg = pg_fetch_assoc($res))
            {
                $this->t[]=$reg;
            } 
        }   
        return $this->t;  
     }
     
     
      public function obtener_error(){
        
        $resultado_query = pg_last_error(parent::con);
        return $resultado_query;
     }
     
     /*Gesitonamiento de bancos*/
     public function registrar_banco($php_codigobanco,$php_denominacion,$php_domicilio){

        $sql =sprintf
          ( " INSERT INTO banco VALUES(%d,'%s','%s')
               ",$php_codigobanco,$php_denominacion,$php_domicilio
          );
          $res = pg_query(parent::con(),$sql);
        
        return $res;  
     }
     
    
     
      public function buscar_banco($php_codigobanco){
            $sql =sprintf
          ( " SELECT * FROM banco WHERE codigobanco = %d",$php_codigobanco
             );
            $res = pg_query(parent::con(),$sql);
            while($reg = pg_fetch_assoc($res))
            {
                $this->t[]=$reg;
            } 
        
        return $this->t;  
     }
     
     
        public function modificar_banco($php_codigobanco,$php_denominacion,$php_domicilio){
            $sql =sprintf
          ( " UPDATE banco SET denominacion='%s', domicilio='%s'
                where codigobanco=%d ",$php_denominacion,$php_domicilio,$php_codigobanco
             );
           $res = pg_query(parent::con(),$sql);
        
        return $res;    
     }
     
     /*Gestionamiento de bandas*/
       public function registrar_banda($php_nrobanda,$php_nromiembros,$php_nombrebanda){

        
          try{
            $sql =sprintf
              ( " INSERT INTO banda VALUES(%d,'%d','%s')
                   ",$php_nrobanda,$php_nromiembros,ucwords(strtolower($php_nombrebanda))
              );
            
            $res = pg_query(parent::con(),$sql);
            return $res;     
            
        
          }catch(Exception $e){
                
            $res = "Ha ocurrido un error";
            return $res;
          }
          
        
     }
     
       public function buscar_banda($php_nrobanda){
            $sql =sprintf
          ( " SELECT * FROM banda WHERE nrobanda = %d",$php_nrobanda
             );
          
            $res = pg_query(parent::con(),$sql);
            while($reg = pg_fetch_assoc($res))
            {
                $this->t[]=$reg;
            } 
        
        return $this->t;  
     }
     
     public function modificar_banda($php_nrobanda,$php_nromiembros,$php_nombrebanda){
            $sql =sprintf
          ( " UPDATE banda SET nromiembros=%d, nombre='%s'
                where nrobanda=%d ",$php_nromiembros,ucwords(strtolower($php_nombrebanda)),$php_nrobanda
             );
           $res = pg_query(parent::con(),$sql);
        
        return $res;    
     }
     
     /*Gestionamiento Cargos*/
     
     public function registrar_cargos($php_nombre_cargo,$php_descripcion){

        
          try{
            $sql =sprintf
              ( " INSERT INTO catalogocargos VALUES('%s','%s')
                   ",ucwords(strtolower($php_nombre_cargo)),$php_descripcion
              );
            
            $res = pg_query(parent::con(),$sql);
            return $res;     
            
        
          }catch(Exception $e){
                
            $res = "Ha ocurrido un error";
            return $res;
          }
          
        
     }
     
     public function buscar_cargos($php_nombre_cargo){
            $sql =sprintf
          ( " SELECT * FROM catalogocargos WHERE nombrecargo = '%s'",ucwords(strtolower($php_nombre_cargo))
             );
          
            $res = pg_query(parent::con(),$sql);
            while($reg = pg_fetch_assoc($res))
            {
                $this->t[]=$reg;
            } 
        
        return $this->t;  
     }
     
     public function modificar_cargos($php_nombre_cargo,$php_descripcion_cargo){
            $sql =sprintf
          ( " UPDATE catalogocargos SET descripcion='%s'
                where nombrecargo='%s' ",$php_descripcion_cargo,ucwords(strtolower($php_nombre_cargo))
             );
           $res = pg_query(parent::con(),$sql);
        
        return $res;    
     }
     
     /*Gestionamiento de catalogo de departamentos*/
    
    
     public function registrar_departamentos($php_codigo_departamento,$php_nombre_departamento){
            
           $sql =sprintf
              ( " INSERT INTO catalogodepartamento VALUES(%d,'%s')
                   ",$php_codigo_departamento,$php_nombre_departamento
              );
            $conexion=parent::con();
            $res = pg_query($conexion,$sql);
            if($res)
                return "exito";
            else
                return pg_last_error($conexion);
            
   
     
          
        
     }
     
     public function buscar_departamentos($php_codigo_departamento){
            $sql =sprintf
          ( " SELECT * FROM catalogodepartamento WHERE coddepartamento = '%d'",$php_codigo_departamento
             );
          
            $res = pg_query(parent::con(),$sql);
            while($reg = pg_fetch_assoc($res))
            {
                $this->t[]=$reg;
            } 
        
        return $this->t;  
     }
     
     public function modificar_departamentos($php_codigo_departamento,$php_nombre_departamento){
            $sql =sprintf
          ( " UPDATE catalogodepartamento SET nombredepartamento='%s'
                where coddepartamento = '%d' ",$php_codigo_departamento,$php_nombre_departamento
             );
           $res = pg_query(parent::con(),$sql);
        
        return $res;    
     }
     
     /*Gestionamiento de delincuentes*/
    
    
     public function registrar_delincuente($php_cedula_delincuente,$php_nombre_delincuente,$php_apellido_delincuente,$php_alias_delincuente,$php_fechan_delincuente,$php_nrobanda_delincuente){
            
           $sql =sprintf
              ( " INSERT INTO delincuente VALUES(%s,'%s','%s','%s','%s',%d)')
                   ",$php_cedula_delincuente,$php_nombre_delincuente,$php_apellido_delincuente,$php_alias_delincuente,$php_fechan_delincuente,$php_nrobanda_delincuente
              );
            $conexion=parent::con();
            $res = pg_query($conexion,$sql);
            if($res)
                return "exito";
            else
                return pg_last_error($conexion);
              
     }
     
     
      public function buscar_delincuente($php_cedula_delincuente){
            $sql =sprintf
          ( " SELECT * FROM delincuente WHERE cedula = '%s'",$php_cedula_delincuente
             );
          
            $res = pg_query(parent::con(),$sql);
            while($reg = pg_fetch_assoc($res))
            {
                $this->t[]=$reg;
            } 
        
        return $this->t;  
     }
    
     public function modificar_delincuente($php_cedula_delincuente,$php_nombre_delincuente,$php_apellido_delincuente,$php_alias_delincuente,$php_fechan_delincuente,$php_nrobanda_delincuente){
            $sql =sprintf
          ( " UPDATE delincuente SET nombre='%s', apellido='%s',alias='%s',fechan='%s',nrobanda=%d
                where cedula = '%s' ",$php_nombre_delincuente,$php_apellido_delincuente,$php_alias_delincuente,$php_fechan_delincuente,$php_nrobanda_delincuente,$php_cedula_delincuente
             );
           $res = pg_query(parent::con(),$sql);
        
        return $res;    
     }
    
    
     /*Gestionamiento de sucursales*/
     
     public function registrar_sucursal($php_codbanco,$php_codsucursal,$php_domicilio){
            
           $sql =sprintf
              ( " INSERT INTO sucursal VALUES(%d,%d,'%s')')
                   ",$php_codbanco,$php_codsucursal,$php_domicilio
              );
            $conexion=parent::con();
            $res = pg_query($conexion,$sql);
            if($res)
                return "exito";
            else
                return pg_last_error($conexion);
              
     }
     
     
     public function buscar_sucursal($codbanco,$php_codsucursal){
            $sql =sprintf
          ( " SELECT * FROM sucursal WHERE codbanco=%d AND codsucursal = %d ",$codbanco,$php_codsucursal
             );
          
            $res = pg_query(parent::con(),$sql);
            while($reg = pg_fetch_assoc($res))
            {
                $this->t[]=$reg;
            } 
        
        return $this->t;  
     }
     
     public function modificar_sucursal($php_codbanco,$php_codsucursal,$php_domicilio){
            $sql =sprintf
          ( " UPDATE delincuente SET domicilio='%s'
                where codbanco=%d AND codsucursal = %d ",$php_domicilio,$php_codbanco,$php_codsucursal
             );
           $res = pg_query(parent::con(),$sql);
        
        return $res;    
     }
     
     
      /*Gestionamiento de empleados*/
     
     public function registrar_empleado($php_ficha,$php_nombre,$php_cedula,$php_fechan,$php_direccion,$php_edocivil,$php_sexo,$php_estatus,$php_sueldo,$php_fechaing,$php_fechaeg,$php_fichajefe,$php_codbanco,$php_codsucursal,$php_coddepartamento){
            
                echo "FECHA EG: ".$php_fechaeg;
           $sql =sprintf
              ( " INSERT INTO empleado VALUES(%d,'%s','%s','%s','%s','%s','%s','%s',%d,'%s','%s',%d,%d,%d,%d)')
                   ",$php_ficha,$php_nombre,$php_cedula,$php_fechan,$php_direccion,$php_edocivil,$php_sexo,$php_estatus,$php_sueldo,$php_fechaing,$php_fechaeg,$php_fichajefe,$php_codbanco,$php_codsucursal,$php_coddepartamento
              );
            $conexion=parent::con();
            $res = pg_query($conexion,$sql);
            if($res)
                return "exito";
            else
                return pg_last_error($conexion);
              
     }
     
     
     public function buscar_empleado($php_ficha){
            $sql =sprintf
          ( " SELECT * FROM empleado WHERE fichaempleado=%d ",$php_ficha
             );
          
            $res = pg_query(parent::con(),$sql);
            while($reg = pg_fetch_assoc($res))
            {
                $this->t[]=$reg;
            } 
        
        return $this->t;  
     }
     
     public function modificar_empleado($php_ficha,$php_nombre,$php_cedula,$php_fechan,$php_direccion,$php_edocivil,$php_sexo,$php_estatus,$php_sueldo,$php_fechaing,$php_fechaeg,$php_fichajefe,$php_codbanco,$php_codsucursal,$php_coddepartamento){
        
  if(EMPTY($php_fechaeg)){   
              $sql =sprintf
            ( " UPDATE empleado SET nombre='%s',cedula='%s',fechan='%s',direccion='%s',edocivil='%s',sexo='%s',estatus='%s',sueldo=%d,fechaing='%s',fechaeg=NULL,fichajefe=%d,codbanco=%d,codsucursal=%d,coddepartamento=%d
                  where fichaempleado=%d",$php_nombre,$php_cedula,$php_fechan,$php_direccion,$php_edocivil,$php_sexo,$php_estatus,$php_sueldo,$php_fechaing,$php_fichajefe,$php_codbanco,$php_codsucursal,$php_coddepartamento,$php_ficha
               );
            }else{
             $sql =sprintf
            ( " UPDATE empleado SET nombre='%s',cedula='%s',fechan='%s',direccion='%s',edocivil='%s',sexo='%s',estatus='%s',sueldo=%d,fechaing='%s',fechaeg='%s',fichajefe=%d,codbanco=%d,codsucursal=%d,coddepartamento=%d
                  where fichaempleado=%d",$php_nombre,$php_cedula,$php_fechan,$php_direccion,$php_edocivil,$php_sexo,$php_estatus,$php_sueldo,$php_fechaing,$php_fechaeg,$php_fichajefe,$php_codbanco,$php_codsucursal,$php_coddepartamento,$php_ficha
               ); 
            }
 
         echo $php_nombre." ".$php_cedula." ".$php_fechan." ".$php_direccion." ".$php_edocivil." ".$php_sexo." ".$php_estatus." ".$php_sueldo." ".$php_fechaing." ".$php_fechaeg." ".$php_fichajefe." ".$php_codbanco." ".$php_codsucursal." ".$php_coddepartamento." ".$php_ficha
             ;
        
           $res = pg_query(parent::con(),$sql);
        
        return $res;    
     }
     
     /*Gestionamiento de Vigilanes*/
     
     public function registrar_vigilante($php_ficha_vigilante,$php_cedula_vigilante,$php_nombre_vigilante,$php_direccion_vigilante,$php_fechan_vigilante){
            
           $sql =sprintf
              ( " INSERT INTO vigilante VALUES(%d,'%s','%s','%s','%s')
                   ",$php_ficha_vigilante,$php_cedula_vigilante,$php_nombre_vigilante,$php_direccion_vigilante,$php_fechan_vigilante
              );
            $conexion=parent::con();
            $res = pg_query($conexion,$sql);
            if($res)
                return "exito";
            else
                return pg_last_error($conexion);
              
     }
     
     
     public function buscar_vigilante($php_ficha_vigilante){
            $sql =sprintf
          ( " SELECT * FROM vigilante WHERE fichavigilante = %d ",$php_ficha_vigilante
             );
          
            $res = pg_query(parent::con(),$sql);
            while($reg = pg_fetch_assoc($res))
            {
                $this->t[]=$reg;
            } 
        
        return $this->t;  
     }
     
     public function modificar_vigilante($php_ficha_vigilante,$php_cedula_vigilante,$php_nombre_vigilante,$php_direccion_vigilante,$php_fechan_vigilante){
            
       $sql =sprintf
          ( " UPDATE vigilante SET cedula='%s', nombre='%s', direccion='%s', fechan='%s'
                where fichavigilante = %d",$php_cedula_vigilante,$php_nombre_vigilante,$php_direccion_vigilante,$php_fechan_vigilante,$php_ficha_vigilante
             );
           $res = pg_query(parent::con(),$sql);
        
        return $res;    
     }
     
     
      /*Gestionamiento de Juecea*/
     
     public function registrar_juez($php_clave_juez,$php_nombre_juez,$php_servicio_juez){
            
           $sql =sprintf
              ( " INSERT INTO juez VALUES(%d,'%s',%d)
                   ",$php_clave_juez,$php_nombre_juez,$php_servicio_juez
              );
            $conexion=parent::con();
            $res = pg_query($conexion,$sql);
            if($res)
                return "exito";
            else
                return pg_last_error($conexion);
              
     }
     
     
     public function buscar_juez($php_clave_juez){
            $sql =sprintf
          ( " SELECT * FROM juez WHERE clavejuez = %d ",$php_clave_juez
             );
          
            $res = pg_query(parent::con(),$sql);
            while($reg = pg_fetch_assoc($res))
            {
                $this->t[]=$reg;
            } 
        
        return $this->t;  
     }
     
     public function modificar_juez($php_clave_juez,$php_nombre_vigilante,$php_servicio_juez){
            
       $sql =sprintf
          ( " UPDATE juez SET nombre='%s', servicio=%d
                where fichavigilante = %d",$php_nombre_vigilante,$php_servicio_juez,$php_clave_juez
             );
           $res = pg_query(parent::con(),$sql);
        
        return $res;    
     }
     
     
     
     /*Gestionamiento de delito*/
     
     public function registrar_delito($php_nroexpediente,$php_fecha_delito,$php_codbanco_delito,$php_codsucursal_delito,$php_anoscondena_delito,$php_condenado_delito,$php_clavejuez_delito){
            
           $sql =sprintf
              ( " INSERT INTO delito VALUES(%d,'%s',%d,%d,%d,%s,%d)
                   ",$php_nroexpediente,$php_fecha_delito,$php_codbanco_delito,$php_codsucursal_delito,$php_anoscondena_delito,$php_condenado_delito,$php_clavejuez_delito
                   );
            
            $conexion=parent::con();
            $res = pg_query($conexion,$sql);
            if($res)
                return "exito";
            else
                return pg_last_error($conexion);
              
     }
     
     
     public function buscar_delito($php_nroexpediente){
            $sql =sprintf
          ( " SELECT * FROM delito WHERE nroexpediente = %d ",$php_nroexpediente
             );
          
            $res = pg_query(parent::con(),$sql);
            while($reg = pg_fetch_assoc($res))
            {
                $this->t[]=$reg;
            } 
        
        return $this->t;  
     }
     
     public function modificar_delito($php_nroexpediente,$php_fecha_delito,$php_codbanco_delito,$php_codsucursal_delito,$php_anoscondena_delito,$php_condenado_delito,$php_clavejuez_delito){
            
       $sql =sprintf
          ( " UPDATE delito SET fecha='%s', codbanco=%d,codsucursal=%d, anoscondena=%d, condenado=%s, clavejuez=%d
                where nroexpediente = %d",$php_fecha_delito,$php_codbanco_delito,$php_codsucursal_delito,$php_anoscondena_delito,$php_condenado_delito,$php_clavejuez_delito,$php_nroexpediente
            
             );
           $res = pg_query(parent::con(),$sql);
        
        return $res;    
     }
     
     
     
     
     /*Gestionamiento de contratos*/
     
     public function registrar_contrato($php_codbanco_contrato,$php_codsucursal_contrato,$php_fichavigilante_contrato,$php_armado_contrato,$php_fecha_contrato){
            
           $sql =sprintf
              ( " INSERT INTO contrata VALUES(%d,%d,%d,'%s','%s')
                   ",$php_codbanco_contrato,$php_codsucursal_contrato,$php_fichavigilante_contrato,$php_armado_contrato,$php_fecha_contrato
                   
                );
            
            $conexion=parent::con();
            $res = pg_query($conexion,$sql);
            if($res)
                return "exito";
            else
                return pg_last_error($conexion);
              
     }
     
     
     public function buscar_contrato($php_codbanco_contrato,$php_codsucursal_contrato,$php_fichavigilante_contrato,$php_fecha_contrato){
            $sql =sprintf
          ( " SELECT * FROM contrata WHERE codbanco = %d AND codsucursal=%d AND fichavigilante=%d AND fechacontrato='%s' ",$php_codbanco_contrato,$php_codsucursal_contrato,$php_fichavigilante_contrato,$php_fecha_contrato
             );
          
            $res = pg_query(parent::con(),$sql);
            while($reg = pg_fetch_assoc($res))
            {
                $this->t[]=$reg;
            } 
        
        return $this->t;  
     }
     
     public function modificar_contrato($php_codbanco_contrato,$php_codsucursal_contrato,$php_fichavigilante_contrato,$php_armado_contrato,$php_fecha_contrato){
            
       $sql =sprintf
          ( " UPDATE contrata SET armado=%s
                where codbanco=%d AND codsucursal=%d AND fichavigilante=%d AND fecha='%s'= %d",$php_armado_contrato,$php_codbanco_contrato,$php_codsucursal_contrato,$php_fichavigilante_contrato,$php_fecha_contrato
            
             );
           $res = pg_query(parent::con(),$sql);
        
        return $res;    
     }
     
     
     
     /*Gestionamiento de cargos y empleados*/
     
     public function registrar_posesion($php_codbanco_posee,$php_codsucursal_posee,$php_fichaempleado_posee,$php_nombrecargo_posee,$php_fecha_ing, $php_fecha_eg){
            
            if(EMPTY($php_fecha_eg)){   
              $sql =sprintf
              ( " INSERT INTO contrata VALUES(%d,%d,%d,'%s','%s','%s')
                   ",$php_codbanco_posee,$php_codsucursal_posee,$php_fichaempleado_posee,$php_nombrecargo_posee,$php_fecha_ing, $php_fecha_eg
            
                );
            }else{
            $sql =sprintf
              ( " INSERT INTO contrata VALUES(%d,%d,%d,'%s','%s','%s')
                   ",$php_codbanco_posee,$php_codsucursal_posee,$php_fichaempleado_posee,$php_nombrecargo_posee,$php_fecha_ing, $php_fecha_eg
            
                );
            }  
            
            $conexion=parent::con();
            $res = pg_query($conexion,$sql);
            if($res)
                return "exito";
            else
                return pg_last_error($conexion);
              
     }
     
     
     public function buscar_posesion($php_codbanco_posee,$php_codsucursal_posee,$php_fichaempleado_posee,$php_nombrecargo_posee,$php_fecha_ing){
              $sql =sprintf
          ( " SELECT * FROM contrata WHERE codbanco = %d AND codsucursal=%d AND fichaempleado=%d AND nombrecargo='%s' AND fechaing = '%s' ",$php_codbanco_posee,$php_codsucursal_posee,$php_fichaempleado_posee,$php_nombrecargo_posee,$php_fecha_ing
            
             );
          
            $res = pg_query(parent::con(),$sql);
            while($reg = pg_fetch_assoc($res))
            {
                $this->t[]=$reg;
            } 
        
        return $this->t;  
     }
     
     public function modificar_posesion($php_codbanco_posee,$php_codsucursal_posee,$php_fichaempleado_posee,$php_nombrecargo_posee,$php_fecha_ing, $php_fecha_eg){
       if(EMPTY($php_fecha_eg)){   
             $sql =sprintf
          ( " UPDATE contrata SET codbanco=%d ,codsucursal=%d , fichaempleado=%d , nombrecargo='%s' ,fechaing= '%s' ,fechaeg='%s'
                where codbanco=%d AND codsucursal=%d AND fichaempleado=%d AND nombrecargo='%s' fechaing= '%s'",$php_codbanco_posee,$php_codsucursal_posee,$php_fichaempleado_posee,$php_nombrecargo_posee,$php_fecha_ing, $php_fecha_eg,
                $php_codbanco_posee,$php_codsucursal_posee,$php_fichaempleado_posee,$php_nombrecargo_posee,$php_fecha_ing
              
            
             );
            }else{
            $sql =sprintf
          ( " UPDATE contrata SET codbanco=%d ,codsucursal=%d , fichaempleado=%d , nombrecargo='%s' ,fechaing= '%s' ,fechaeg='%s'
                where codbanco=%d AND codsucursal=%d AND fichaempleado=%d AND nombrecargo='%s' fechaing= '%s'",$php_codbanco_posee,$php_codsucursal_posee,$php_fichaempleado_posee,$php_nombrecargo_posee,$php_fecha_ing, $php_fecha_eg,
                $php_codbanco_posee,$php_codsucursal_posee,$php_fichaempleado_posee,$php_nombrecargo_posee,$php_fecha_ing
              
            
             );
            }  
           $res = pg_query(parent::con(),$sql);
        
        return $res;    
     }
     
     
     
     /*Buscar logins*/
      public function validar_usuario($php_pwd,$php_username){
            $sql =sprintf
          ( " SELECT * FROM login WHERE contrasena = '%s' AND username='%s'",$php_pwd,$php_username
             );
          
            $res = pg_query(parent::con(),$sql);
            while($reg = pg_fetch_assoc($res))
            {
                $this->t[]=$reg;
            } 
        if(($this->t[0]['contrasena'] == $php_pwd ) AND ($this->t[0]['username'] == $php_username ) )
            return true;  
        else
            return false;
     }
     
     
     
     /*Incrementar sueldo  Gerentes*/
     public function buscar_gerentes(){
            $sql =sprintf
          ( " SELECT 

                e.fichaempleado,e.nombre,e.cedula,e.sueldo,e.fechaing,banco.denominacion,e.codsucursal,e.coddepartamento, EXTRACT(YEAR FROM age(current_date,date(e.fechaing) ) ) as anoscontratado
                FROM empleado as e,banco,posee 
                WHERE
                banco.codigobanco=e.codbanco AND
                EXTRACT(YEAR FROM age(current_date,date(e.fechaing) ) )>10 AND 
                posee.fichaempleado=e.fichaempleado AND
                (e.estatus='A' OR 
                e.estatus='a'  OR 
                e.estatus='p' OR 
                e.estatus='P') AND 
                posee.fechaeg IS NULL AND 
               posee.nombrecargo='Gerente' "
             );
          
            $res = pg_query(parent::con(),$sql);
            while($reg = pg_fetch_assoc($res))
            {
                $this->t[]=$reg;
            } 
        
        return $this->t;  
     }
     
     public function modificar_gerentes(){
        $datos=$obj->buscar_gerentes();
        
         for($i=0;$i<sizeof($datos);$i++){
                if($datos[0]["sueldo"]+($datos[0]["sueldo"]*0.15)>20000){
                    $sql =sprintf;
                      $sueldo = $datos[0]["sueldo"]+($datos[0]["sueldo"]*0.10);
                    ( "UPDATE empleado SET sueldo=%d  ");
                    
                    
                }else{
                    $sql =sprintf;
                      $sueldo = $datos[0]["sueldo"]+($datos[0]["sueldo"]*0.15);
                    ( "UPDATE empleado SET sueldo=%d  ");
                    
                    
                    
                }
             $res = pg_query(parent::con(),$sql);
        
           }
        
          
            return 1;    
     }
     
     
     
 }
?>