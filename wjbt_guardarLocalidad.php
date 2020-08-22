<?php
session_start();
if (isset($_SESSION['admin'])) { ?>

<?php 
  
  if ($_POST['id'] == null or $_POST['id'] == '' or $_POST['zona'] == null or $_POST['zona'] == '' ) {

     echo '<div class="alert alert-danger" role="alert">Campos vacios verifique informacion</div>';
  } else {

 $id      = $_POST['id'];   
 $zona    = $_POST['zona'];
   
 try {

    include_once('wjbt_conexion.php');

    $sql = "INSERT INTO zona_wjbt (id_wjbt, zona_wjbt) VALUES (?,?)";
    $stm = $conn->prepare($sql)->execute(array($id, $zona));
    
    $msg = 'Los datos han sido guardado con exito!!!';
    header('location:wjbt_tablaLocalidad.php?err=$msg');
    

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