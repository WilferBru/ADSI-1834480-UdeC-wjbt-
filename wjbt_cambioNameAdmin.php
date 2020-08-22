<?php
  session_start();
if (isset($_SESSION['admin'])) { ?>

<?php
    
    if ($_POST['id'] == null OR $_POST['id'] == '' OR $_POST['nombre'] == null OR $_POST['nombre'] == '' OR $_POST['password'] == null OR $_POST['password'] == '') {
    include_once('wjbt_contenido.php');
      echo '<div class="card-body">
              <div class="table-responsive">
                        <div class="dataTables_length text-center" id="dataTable_length"><div class="alert alert-danger" role="alert">Campos vacios verifique informacion
                        </div>
                <hr>
                
              </div>

              <div class="dataTables_length" id="dataTable_length"><a href="wjbt_configurarNameAdmin.php" class="btn btn-success b">Volver</a></div>
              ';
    include_once('wjbt_footer.php');

    } else {

      include_once('SED.php');
      $id          = $_POST['id'];
      $nombre      = $_POST['nombre'];
      $contrasena  = $_POST['password'];
      $claveE=SED::encryption($contrasena);

      try {

        include_once('wjbt_conexion.php');

        $sql = "SELECT * FROM sesionadmin_wjbt WHERE id_wjbt = ? AND password_wjbt = ?";
        $stm = $conn->prepare($sql);
        $stm->execute(array($id,$claveE));

        if ($stm->rowCount() > 0) {

              $sql2 = "UPDATE sesionadmin_wjbt SET nombre_wjbt = ? WHERE id_wjbt = ? ";
              $stm2 = $conn->prepare($sql2)->execute(array($nombre,$id));

              header('location:wjbt_logoutAdmin.php');
          
        } else {
          $msg = 'Su contraseña no es correcta';
          header('location:wjbt_configurarNameAdmin.php?err=$msg');
        }
        
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