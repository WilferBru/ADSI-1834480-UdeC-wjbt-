<?php
session_start();
if (isset($_SESSION['admin'])) { ?>

<?php 
	
	if ($_GET['id'] == null or $_GET['id'] == '' or $_GET['zona'] == null or $_GET['zona'] == '') {

		include_once('wjbt_contenido.php');
      echo '<div class="card-body">
              <div class="table-responsive">
                        <div class="dataTables_length text-center" id="dataTable_length"><div class="alert alert-danger" role="alert">Campos vacios verifique informacion
                        </div>
                <hr>
                
              </div>

              <div class="dataTables_length" id="dataTable_length"><a href="wjbt_tablaLocalidad.php" class="btn btn-success b">Volver</a></div>
              ';
    include_once('wjbt_footer.php');

	} else {
	
	 $id        = $_GET['id'];   
	 $zona      = $_GET['zona'];

	 try {

    include_once('wjbt_conexion.php');

    $sql = "UPDATE zona_wjbt SET zona_wjbt = ? WHERE id_wjbt = ? ";
    $stm = $conn->prepare($sql)->execute(array($zona,$id));
    
    $msg = 'Los datos han sido guardado con exito!!!';
    header('location:wjbt_tablaLocalidad.php?err=$msg');
    

 } catch (Exception $e) {
  echo 'Connected fallida: '.$e->getMessage();
 }
	
}
	

?>


<?php
}else {
  header('location:wjbt_loginAdmin.php');
}


?>
