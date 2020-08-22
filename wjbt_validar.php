<?php 
	session_start();
  include_once('SED.php');
	if ($_POST['users'] == null or $_POST['users'] == '' or $_POST['password'] == null or $_POST['password'] == '') {
    echo "Campos vacios";
  } else {
    try {

  $usuario  = $_POST['users'];
  $password = $_POST['password'];
  $claveE=SED::encryption($password);

  include_once('wjbt_conexion.php');

  //consulta de registro
  $sql = "SELECT * FROM sesion_wjbt WHERE usuario_wjbt = ? AND password_wjbt = ?";
  $stm = $conn->prepare($sql);
  $stm->execute(array($usuario,$claveE));

  if ($stm->rowCount() > 0 ) {
    $_SESSION['udec'] = 'wjbt';
    header('location:wjbt_index.php');
    $rows = $stm->fetchAll(PDO::FETCH_OBJ);
    foreach ($rows as $row) {
      $_SESSION['id_wjbt'] = $row->id_wjbt;
      $_SESSION['identificacion_wjbt'] = $row->identificacion_wjbt;
      $_SESSION['nombre_wjbt'] = $row->nombre_wjbt;
      $_SESSION['id_genero_wjbt'] = $row->id_genero_wjbt;
    }
  } else {
    $msg = 'Su correo o contraseña son incorrectas por favor verifique informacion.';
    header('location:wjbt_login.php?err=$msg');
  }
    

 } catch (Exception $e) {
  echo 'Connected fallida: '.$e->getMessage();
 }

}
   

?>