<?php
session_start();
if (isset($_SESSION['admin'])) { ?>

<?php 
  
  if ($_GET['id_wjbt'] == null or $_GET['id_wjbt'] == '') {
    include_once('wjbt_contenido.php');
      echo '<div class="card-body">
              <div class="table-responsive">
                        <div class="dataTables_length text-center" id="dataTable_length"><div class="alert alert-danger" role="alert">Campos vacios verifique informacion
                        </div>
                <hr>
                
              </div>

              <div class="dataTables_length" id="dataTable_length"><a href="wjbt_usuarios.php" class="btn btn-success b">Volver</a></div>
              ';
    include_once('wjbt_footer.php');
  } else {
    
    $id = $_GET['id_wjbt'];

   try {

    include_once('wjbt_conexion.php');

    $sql = "DELETE FROM sesion_wjbt WHERE id_wjbt = ? ";
    $stm = $conn->prepare($sql)->execute(array($id));
    include_once('wjbt_contenido.php');
    echo '<div class="alert alert-danger" role="alert">
            El registro a Sido borrado.
          </div>
          <div class="dataTables_length" id="dataTable_length"><a href="wjbt_usuarios.php" class="btn btn-success b">Volver</a></div> <br>
          ';
    
    
    

 } catch (Exception $e) {
  echo 'Connected fallida: '.$e->getMessage();
 }

  }

?>

<?php

} else {
  
  header('location:wjbt_loginAdmin.php');
}


?>
