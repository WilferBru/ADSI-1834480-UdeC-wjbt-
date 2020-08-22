<?php
session_start();
if (isset($_SESSION['admin'])) { ?>

<?php 
  
  if ($_POST['id'] == null or $_POST['id'] == '' or $_POST['genero'] == null or $_POST['genero'] == '' ) {

     echo '<div class="alert alert-danger" role="alert">Campos vacios verifique informacion</div>';
  } else {

 $id      = $_POST['id'];   
 $genero  = $_POST['genero'];
   
 try {

    include_once('wjbt_conexion.php');

    $sql = "INSERT INTO genero_wjbt (id_wjbt, genero_wjbt) VALUES (?,?)";
    $stm = $conn->prepare($sql)->execute(array($id, $genero));
    
    $msg = 'Los datos han sido guardado con exito!!!';
    header('location:wjbt_tablaGenero.php?err=$msg');
    

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