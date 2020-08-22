<?php
session_start();
if (isset($_SESSION['admin'])) { ?>

<?php 
	
	if ($_GET['id'] == null or $_GET['id'] == '' or $_GET['tipo'] == null or $_GET['tipo'] == '') {

		include_once('wjbt_contenido.php');
      echo '<div class="card-body">
              <div class="table-responsive">
                        <div class="dataTables_length text-center" id="dataTable_length"><div class="alert alert-danger" role="alert">Campos vacios verifique informacion
                        </div>
                <hr>
                
              </div>

              <div class="dataTables_length" id="dataTable_length"><a href="wjbt_tablaTipoVivienda.php" class="btn btn-success b">Volver</a></div>
              ';
    include_once('wjbt_footer.php');

	} else {
	
	 $id        = $_GET['id'];   
	 $tipo      = $_GET['tipo'];

	 try {

    include_once('wjbt_conexion.php');

    $conn = new PDO($dsn, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


    $sql = "UPDATE tipovivienda_wjbt SET tipo_wjbt = ? WHERE id_wjbt = ? ";
    $stm = $conn->prepare($sql)->execute(array($tipo,$id));
    
    $msg = 'Los datos han sido guardado con exito!!!';
    header('location:wjbt_tablaTipoVivienda.php?err=$msg');
    

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
