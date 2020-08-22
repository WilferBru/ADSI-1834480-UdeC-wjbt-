<?php
  session_start();
if (isset($_SESSION['udec'])) { ?>

<?php
    
    if ($_POST['id'] == null OR $_POST['id'] == '' OR $_POST['genero'] == null OR $_POST['genero'] == '' OR $_POST['password'] == null OR $_POST['password'] == '') {
    include_once('wjbt_contenidoIndex.php');
      echo '<div class="card-body">
              <div class="table-responsive">
                        <div class="dataTables_length text-center" id="dataTable_length"><div class="alert alert-danger" role="alert">Campos vacios verifique informacion
                        </div>
                <hr>
                
              </div>

              <div class="dataTables_length" id="dataTable_length"><a href="wjbt_configurarSex.php" class="btn btn-success b">Volver</a></div>
              ';
    include_once('wjbt_footerIndex.php');

    } else {

      include_once('SED.php');
      $id          = $_POST['id'];
      $genero      = $_POST['genero'];
      $contrasena  = $_POST['password'];
      $claveE=SED::encryption($contrasena);
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

        $sql = "SELECT * FROM sesion_wjbt WHERE id_wjbt = ? AND password_wjbt = ?";
        $stm = $conn->prepare($sql);
        $stm->execute(array($id,$claveE));

        if ($stm->rowCount() > 0) {

              $sql2 = "UPDATE sesion_wjbt SET id_genero_wjbt = ? WHERE id_wjbt = ? ";
              $stm2 = $conn->prepare($sql2)->execute(array($row1->id_wjbt,$id));

              header('location:wjbt_logout.php');
          
        } else {
          $msg = 'Su contraseña no es correcta';
          header('location:wjbt_configurarSex.php?err=$msg');
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