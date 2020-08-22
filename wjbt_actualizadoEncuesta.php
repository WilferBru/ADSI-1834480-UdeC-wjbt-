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

    $sql1 = "SELECT * FROM genero_wjbt WHERE genero_wjbt = ?";
    $stm1 = $conn->prepare($sql1);
    $stm1->execute(array($genero));

    $rows1 = $stm1->fetchAll(PDO::FETCH_OBJ);
    foreach ($rows1 as $row1) {
       $row1->id_wjbt;
       $row1->genero_wjbt;  
                                       
      }

    $sql2 = "SELECT * FROM estadocivil_wjbt WHERE estadoCivil_wjbt = ?";
    $stm2 = $conn->prepare($sql2);
    $stm2->execute(array($estadoCivil));

    $rows2 = $stm2->fetchAll(PDO::FETCH_OBJ);
    foreach ($rows2 as $row2) {
       $row2->id_wjbt;
       $row2->estadoCivil_wjbt;                                         
      }
    
    $sql3 = "SELECT * FROM nivelacademicopadres_wjbt WHERE nivel_wjbt = ?";
    $stm3 = $conn->prepare($sql3);
    $stm3->execute(array($nivelPadres));

    $rows3 = $stm3->fetchAll(PDO::FETCH_OBJ);
    foreach ($rows3 as $row3) {
       $row3->id_wjbt;
       $row3->nivel_wjbt;                                         
      }

    $sql4 = "SELECT * FROM tipovivienda_wjbt WHERE tipo_wjbt = ?";
    $stm4 = $conn->prepare($sql4);
    $stm4->execute(array($tipoVivienda));

    $rows4 = $stm4->fetchAll(PDO::FETCH_OBJ);
    foreach ($rows4 as $row4) {
       $row4->id_wjbt;
       $row4->tipo_wjbt;                                         
      }  

    $sql5 = "SELECT * FROM zona_wjbt WHERE zona_wjbt = ?";
    $stm5 = $conn->prepare($sql5);
    $stm5->execute(array($zona));

    $rows5 = $stm5->fetchAll(PDO::FETCH_OBJ);
    foreach ($rows5 as $row5) {
       $row5->id_wjbt;
       $row5->zona_wjbt;                                         
      } 

    $sql6 = "SELECT * FROM ingresoHogar_wjbt WHERE ingreso_wjbt = ?";
    $stm6 = $conn->prepare($sql6);
    $stm6->execute(array($ingreso));

    $rows6 = $stm6->fetchAll(PDO::FETCH_OBJ);
    foreach ($rows6 as $row6) {
       $row6->id_wjbt;
       $row6->ingreso_wjbt;                                         
      } 

    $sql = "UPDATE encuesta_wjbt SET identificacion_wjbt = ?, nombre_wjbt = ?, apellido_wjbt = ?, correo_wjbt = ?, id_zona_wjbt = ?, direccion_wjbt = ?, id_genero_wjbt = ?, id_estadoCivil_wjbt = ?, fechaNacimiento_wjbt = ?, insEducativaProcedente_wjbt = ?, fechaCulminacion_wjbt = ?, id_nivelacademicopadres_wjbt = ?, trabajoPadre_wjbt = ?, trabajoMadre_wjbt = ?, id_tipoVivienda_wjbt = ?, id_ingresoHogar_wjbt = ?, nivelPrograma_wjbt = ?, asignaturasMatriculadas_wjbt = ? WHERE identificacion_wjbt = ? ";
    $stm = $conn->prepare($sql)->execute(array($identificacion, $nombre, $apellido, $email, $row5->id_wjbt, $direccion, $row1->id_wjbt, $row2->id_wjbt, $fechaNacimiento, $institucion, $fechaCulminacion, $row3->id_wjbt, $trabajoPadre, $trabajoMadre, $row4->id_wjbt, $row6->id_wjbt, $nivelPrograma, $asignaturas, $identificacion));
    
    $msg = 'Los datos han sido guardado con exito!!!';
    header('location:wjbt_encuestaRealizada.php?err=$msg');
    

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
