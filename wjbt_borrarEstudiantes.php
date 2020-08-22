<?php
session_start();
if (isset($_SESSION['admin'])) { ?>

<?php 

	$id     =$_GET['id_wjbt'];

	 try {

    include_once('wjbt_conexion.php');

    $sql = "DELETE FROM estudiantes_wjbt WHERE id_wjbt = ? ";
    $stm = $conn->prepare($sql)->execute(array($id));
    include_once('wjbt_contenido.php');
    echo '<div class="alert alert-danger" role="alert">
            El registro a Sido borrado
          </div>
          <div class="dataTables_length" id="dataTable_length"><a href="wjbt_estudiantes.php" class="btn btn-success b">Volver</a></div> <br>
          ';
    include_once('wjbt_footer.php');
    
    

 } catch (Exception $e) {
  echo 'Connected fallida: '.$e->getMessage();
 }


?>

<?php
}else {
  
  header('location:wjbt_loginAdmin.php');
}


?>