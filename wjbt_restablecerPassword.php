<?php 
	session_start();

	if ($_POST['user'] == null or $_POST['user'] == '' or $_POST['email'] == null or $_POST['email'] == '') {
    echo "Campos vacios";
  } else {
    try {

  $usuario  = $_POST['user'];
  $email    = $_POST['email'];

  include_once('wjbt_conexion.php');

  //consulta de registro
  $sql = "SELECT * FROM sesion_wjbt WHERE usuario_wjbt = ?";
  $stm = $conn->prepare($sql);
  $stm->execute(array($usuario));

  $sql2 = "SELECT * FROM sesionadmin_wjbt WHERE usuario_wjbt = ?";
  $stm2 = $conn->prepare($sql2);
  $stm2->execute(array($usuario));
 
  include_once('SED.php');

  if ($stm->rowCount() > 0 ) {

      $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
      $password = '';

      for ($i=0; $i < 12 ; $i++) { 
        $password .= substr($str,rand(0,62),1);
      }

      $claveE=SED::encryption($password);

      $sql3 = "UPDATE sesion_wjbt SET password_wjbt = ? WHERE usuario_wjbt = ? ";
      $stm3 = $conn->prepare($sql3)->execute(array($claveE,$usuario));
      mail($email," Restablecimiento de contraseña", "Su nueva contraseña es: " .$password);
      $ma = "Hemos enviado su nueva contraseña a su correo, verifique por favor.";
      header('location:wjbt_olvidarContrasena.php?err=$ma'); 

  } else if ($stm2->rowCount() > 0 ) {
      
      $str2 = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
      $password2 = '';

      for ($i=0; $i < 12 ; $i++) { 
        $password2 .= substr($str2,rand(0,62),1);
      }

      $claveE2=SED::encryption($password2);

      $sql4 = "UPDATE sesionadmin_wjbt SET password_wjbt = ? WHERE usuario_wjbt = ? ";
      $stm4 = $conn->prepare($sql4)->execute(array($claveE2,$usuario));
      mail($email," Restablecimiento de contraseña", "Su nueva contraseña es: " .$password2);
      $ma = "Hemos enviado su nueva contraseña a su correo, verifique por favor.";
      header('location:wjbt_olvidarContrasena.php?err=$ma'); 
  } else {
      $me = "Hemos enviado su nueva contraseña a su correo, verifique por favor.";
      header('location:wjbt_olvidarContrasena.php?arr=$me'); 
  }
    

 } catch (Exception $e) {
  echo 'Connected fallida: '.$e->getMessage();
 }

}
   

?>