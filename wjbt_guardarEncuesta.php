<?php  
session_start();
if (isset($_SESSION['udec'])) { ?>

<?php
	
	if ($_GET['identificacion'] == null or $_GET['identificacion'] == '' or $_GET['nombre'] == null or $_GET['nombre'] == '' or $_GET['apellido'] == null or $_GET['apellido'] == '' or $_GET['email'] == null or $_GET['email'] == '' or $_GET['zona'] == null or $_GET['zona'] == '' or $_GET['direccion'] == null or $_GET['direccion'] == '' or $_GET['genero'] == null or $_GET['genero'] == '' or $_GET['institucion'] == null or $_GET['institucion'] == '' or $_GET['fechaNacimiento'] == null or $_GET['fechaNacimiento'] == '' or $_GET['estadoCivil'] == null or $_GET['estadoCivil'] == '' or $_GET['fechaCulminacion'] == null or $_GET['fechaCulminacion'] == '' or $_GET['nivelPadres'] == null or $_GET['nivelPadres'] == '' or $_GET['trabajoPadre'] == null or $_GET['trabajoPadre'] == '' or $_GET['trabajoMadre'] == null or $_GET['trabajoMadre'] == '' or $_GET['tipoVivienda'] == null or $_GET['tipoVivienda'] == '' or $_GET['ingreso'] == null or $_GET['ingreso'] == '' or $_GET['nivelPrograma'] == null or $_GET['nivelPrograma'] == '' or $_GET['asignaturas'] == null or $_GET['asignaturas'] == '') {

		include_once('wjbt_contenido.php');
      echo '<div class="card-body">
              <div class="table-responsive">
                        <div class="dataTables_length text-center" id="dataTable_length"><div class="alert alert-danger" role="alert">Campos vacios verifique informacion
                        </div>
                <hr>
                
              </div>

              <div class="dataTables_length" id="dataTable_length"><a href="wjbt_encuesta.php" class="btn btn-success b">Volver</a></div>
              ';
    include_once('wjbt_footer.php');

	} else {
	 
	 $identificacion   = $_GET['identificacion'];   
	 $nombre           = $_GET['nombre'];
	 $apellido         = $_GET['apellido'];
	 $email            = $_GET['email'];
	 $zona             = $_GET['zona'];
	 $direccion        = $_GET['direccion'];
	 $genero           = $_GET['genero'];
	 $institucion      = $_GET['institucion'];
	 $fechaNacimiento  = $_GET['fechaNacimiento'];
	 $estadoCivil      = $_GET['estadoCivil'];
	 $fechaCulminacion = $_GET['fechaCulminacion'];
	 $nivelPadres      = $_GET['nivelPadres'];
	 $trabajoPadre     = $_GET['trabajoPadre'];
	 $trabajoMadre     = $_GET['trabajoMadre'];
	 $tipoVivienda     = $_GET['tipoVivienda'];
	 $ingreso          = $_GET['ingreso'];
	 $nivelPrograma    = $_GET['nivelPrograma'];
	 $asignaturas      = $_GET['asignaturas'];

	 try {

    include_once('wjbt_conexion.php');

    $sql = "INSERT INTO encuesta_wjbt (identificacion_wjbt, nombre_wjbt, apellido_wjbt, correo_wjbt, id_zona_wjbt, direccion_wjbt, id_genero_wjbt, id_estadoCivil_wjbt, fechaNacimiento_wjbt, insEducativaProcedente_wjbt, fechaCulminacion_wjbt, id_nivelacademicopadres_wjbt, trabajoPadre_wjbt, trabajoMadre_wjbt, id_tipoVivienda_wjbt, id_ingresoHogar_wjbt, nivelPrograma_wjbt, asignaturasMatriculadas_wjbt) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $stm = $conn->prepare($sql)->execute(array($identificacion, $nombre, $apellido , $email, $zona, $direccion, $genero, $estadoCivil, $fechaNacimiento, $institucion, $fechaCulminacion, $nivelPadres, $trabajoPadre, $trabajoMadre, $tipoVivienda, $ingreso, $nivelPrograma, $asignaturas ));
    
    $msg = 'Su encuesta a sido enviada con exito, si Cree que envio un dato errorneo o incorrecto, verifique y podra editar aquel dato que cree que se equiboco, mucas gracias.';
    header('location:wjbt_index.php?err=$msg');
    

	 } catch (Exception $e) {
	  echo 'Connected fallida: '.$e->getMessage();
	 }

	}


?>

<?php
}else {
  
  header('location:wjbt_login.php');
}


?>
