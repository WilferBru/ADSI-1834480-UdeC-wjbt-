<?php
  session_start();
if (isset($_SESSION['udec'])) { ?>

<?php
    
    if ($_POST['id'] == null OR $_POST['id'] == '' OR $_POST['nombre'] == null OR $_POST['nombre'] == '' OR $_POST['password'] == null OR $_POST['password'] == '') {
    include_once('wjbt_contenidoIndex.php');
      echo '<div class="card-body">
              <div class="table-responsive">
                        <div class="dataTables_length text-center" id="dataTable_length"><div class="alert alert-danger" role="alert">Campos vacios verifique informacion
                        </div>
                <hr>
                
              </div>

              <div class="dataTables_length" id="dataTable_length"><a href="wjbt_configurarName.php" class="btn btn-success b">Volver</a></div>
              ';
    include_once('wjbt_footerIndex.php');

    } else {
      include_once('SED.php');
      $id          = $_POST['id'];
      $nombre      = $_POST['nombre'];
      $contrasena  = $_POST['password'];
      $claveE=SED::encryption($contrasena);

      try {

       include_once('wjbt_conexion.php');

        $sql = "SELECT * FROM sesion_wjbt WHERE id_wjbt = ? AND password_wjbt = ?";
        $stm = $conn->prepare($sql);
        $stm->execute(array($id,$claveE));

        if ($stm->rowCount() > 0) {

              $sql2 = "UPDATE sesion_wjbt SET nombre_wjbt = ? WHERE id_wjbt = ? ";
              $stm2 = $conn->prepare($sql2)->execute(array($nombre,$id));

              header('location:wjbt_logout.php');
          
        } else {
          $msg = 'Su contraseña no es correcta';
          header('location:wjbt_configurarName.php?err=$msg');
        }
        
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