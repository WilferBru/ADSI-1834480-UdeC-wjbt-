<?php 
	session_start();
  include_once('SED.php');
	if ($_POST['usuario'] == null or $_POST['usuario'] == '' or $_POST['passwordOne'] == null or $_POST['passwordOne'] == '' or $_POST['passwordTwo'] == null or $_POST['passwordTwo'] == '') {
    echo "Campos vacios";
  } else {
  
  $usuario        = $_POST['usuario'];
  $passwordOne    = $_POST['passwordOne'];
  $passwordTwo    = $_POST['passwordTwo'];
  $claveE1=SED::encryption($passwordOne);
  $claveE2=SED::encryption($passwordTwo);
  if ($claveE1 == $claveE2) {
    try {
  
  include_once('wjbt_conexion.php');

  //consulta de registro
  $sql = "SELECT * FROM sesionAdmin_wjbt WHERE usuario_wjbt = ? AND password_wjbt = ?";
  $stm = $conn->prepare($sql);
  $stm->execute(array($usuario,$claveE2));

  if ($stm->rowCount() > 0 ) {
    $_SESSION['admin'] = 'wjbt';
    header('location:wjbt_admin.php');
    $rows = $stm->fetchAll(PDO::FETCH_OBJ);
    foreach ($rows as $row) {
      $_SESSION['id_wjbt'] = $row->id_wjbt;
      $_SESSION['nombre_wjbt'] = $row->nombre_wjbt;
      $_SESSION['id_genero_wjbt'] = $row->id_genero_wjbt;
    }
    
  } else {
    $msg = 'Su correo o contraseña son incorrectas por favor verifique informacion.';
    header('location:wjbt_loginAdmin.php?err=$msg');
  }
    

 } catch (Exception $e) {
  echo 'Connected fallida: '.$e->getMessage();
 }
  } else {
    $msg = 'Su correo o contraseña son incorrectas por favor verifique informacion.';
    header('location:wjbt_loginAdmin.php?err=$msg');
  }
    

}
   
?>