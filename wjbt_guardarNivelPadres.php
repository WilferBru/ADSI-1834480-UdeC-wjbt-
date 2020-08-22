<?php
session_start();
if (isset($_SESSION['admin'])) { ?>

<?php 
  
  if ($_POST['id'] == null or $_POST['id'] == '' or $_POST['nivel'] == null or $_POST['nivel'] == '' ) {

     echo '<div class="alert alert-danger" role="alert">Campos vacios verifique informacion</div>';
  } else {

 $id      = $_POST['id'];   
 $nivel   = $_POST['nivel'];
   
 try {

    include_once('wjbt_conexion.php');

    $sql = "INSERT INTO nivelacademicopadres_wjbt (id_wjbt, nivel_wjbt) VALUES (?,?)";
    $stm = $conn->prepare($sql)->execute(array($id, $nivel));
    
    $msg = 'Los datos han sido guardado con exito!!!';
    header('location:wjbt_tablaNivelPadres.php?err=$msg');
    

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