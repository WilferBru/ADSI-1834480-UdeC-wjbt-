<?php
session_start();
if (isset($_SESSION['admin'])) { ?>

<?php 
  
  if ($_POST['identificacion'] == null or $_POST['identificacion'] == '' or $_POST['nombre'] == null or $_POST['nombre'] == '' or $_POST['usuario'] == null or $_POST['usuario'] == '' or $_POST['password1'] == null or $_POST['password1'] == '' or $_POST['password2'] == null or $_POST['password2'] == '' or $_POST['genero'] == null or $_POST['genero'] == '' ) {

     echo '<div class="alert alert-danger" role="alert">Campos vacios verifique informacion</div>';
  } else {

 include_once('SED.php');
 $identificacion   = $_POST['identificacion'];   
 $nombre           = $_POST['nombre'];
 $usuario          = $_POST['usuario'];
 $password1        = $_POST['password1'];
 $password2        = $_POST['password2'];
 $genero           = $_POST['genero'];
 $claveE1=SED::encryption($password1);
 $claveE2=SED::encryption($password2);

 if ($claveE1 == $claveE2) {
    
 try {

    include_once('wjbt_conexion.php');

    $sql = "INSERT INTO sesion_wjbt (identificacion_wjbt, nombre_wjbt, usuario_wjbt, password_wjbt, id_genero_wjbt) VALUES (?,?,?,?,?)";
    $stm = $conn->prepare($sql)->execute(array($identificacion, $nombre, $usuario , $claveE2 , $genero ));
    
    $msg = 'Los datos han sido guardado con exito!!!';
    header('location:wjbt_usuarios.php?err=$msg');
    

 } catch (Exception $e) {
  echo 'Connected fallida: '.$e->getMessage();
 }
}else{
    
    include_once('wjbt_contenido.php');
      echo '<div class="card-body">
              <div class="table-responsive">
                        <div class="dataTables_length text-center" id="dataTable_length"><div class="alert alert-danger" role="alert"> Las contraseñas no coinciden por favor verifique informacion
                        </div>
                <hr>
                
              </div>

              <div class="dataTables_length" id="dataTable_length"><a href="wjbt_usuarios.php" class="btn btn-success b">Volver</a></div>
              ';
    include_once('wjbt_contenido.php');
    
}
  }

?>

<?php
}else {
  
  header('location:wjbt_loginAdmin.php');
}


?>