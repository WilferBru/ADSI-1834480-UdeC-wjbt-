<?php
  session_start();
if (isset($_SESSION['admin'])) { ?>

<?php
    
    if ($_POST['id'] == null OR $_POST['id'] == '' OR $_POST['passwordOld'] == null OR $_POST['passwordOld'] == '' OR $_POST['passwordNew1'] == null OR $_POST['passwordNew1'] == '' OR $_POST['passwordNew2'] == null OR $_POST['passwordNew2'] == '') {
    include_once('wjbt_contenido.php');
      echo '<div class="card-body">
              <div class="table-responsive">
                        <div class="dataTables_length text-center" id="dataTable_length"><div class="alert alert-danger" role="alert">Campos vacios verifique informacion
                        </div>
                <hr>
                
              </div>

              <div class="dataTables_length" id="dataTable_length"><a href="wjbt_configurarPasswordAdmin.php" class="btn btn-success b">Volver</a></div>
              ';
    include_once('wjbt_footer.php');

    } else {

      include_once('SED.php');
      $id              = $_POST['id'];
      $passwordOld     = $_POST['passwordOld'];
      $passwordNew1    = $_POST['passwordNew1'];
      $passwordNew2    = $_POST['passwordNew2'];
      $claveEOld=SED::encryption($passwordOld);
      $claveE1=SED::encryption($passwordNew1);
      $claveE2=SED::encryption($passwordNew2);

      try {

        include_once('wjbt_conexion.php');
        
        $sql = "SELECT * FROM sesionAdmin_wjbt WHERE id_wjbt = ? AND password_wjbt = ?";
        $stm = $conn->prepare($sql);
        $stm->execute(array($id,$claveEOld));

        if ($stm->rowCount() > 0) {

            if ($claveE1==$claveE2) {

              $sql2 = "UPDATE sesionAdmin_wjbt SET password_wjbt = ? WHERE id_wjbt = ? ";
              $stm2 = $conn->prepare($sql2)->execute(array($claveE2,$id));

              header('location:wjbt_logoutAdmin.php');

            } else {
              
              $msg = 'Las nuevas contraseñas no coinciden por favor verifique';
              header('location:wjbt_configurarPasswordAdmin.php?ar=$msg');

            }
          
        } else {
          $ma = 'Su contraseña Antigua no es correcta';
          header('location:wjbt_configurarPasswordAdmin.php?err=$ma');
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