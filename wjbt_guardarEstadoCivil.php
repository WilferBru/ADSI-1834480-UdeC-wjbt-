<?php
session_start();
if (isset($_SESSION['admin'])) { ?>

<?php 
  
  if ($_POST['id'] == null or $_POST['id'] == '' or $_POST['estado'] == null or $_POST['estado'] == '' ) {

     echo '<div class="alert alert-danger" role="alert">Campos vacios verifique informacion</div>';
  } else {

 $id      = $_POST['id'];   
 $estado  = $_POST['estado'];
   
 try {

    include_once('wjbt_conexion.php');

    $sql = "INSERT INTO estadocivil_wjbt (id_wjbt, estadoCivil_wjbt) VALUES (?,?)";
    $stm = $conn->prepare($sql)->execute(array($id, $estado));
    
    $msg = 'Los datos han sido guardado con exito!!!';
    header('location:wjbt_tablaEstadoCivil.php?err=$msg');
    

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