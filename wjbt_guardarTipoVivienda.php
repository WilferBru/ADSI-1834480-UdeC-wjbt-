<?php
session_start();
if (isset($_SESSION['admin'])) { ?>

<?php 
  
  if ($_POST['id'] == null or $_POST['id'] == '' or $_POST['tipo'] == null or $_POST['tipo'] == '' ) {

     echo '<div class="alert alert-danger" role="alert">Campos vacios verifique informacion</div>';
  } else {

 $id      = $_POST['id'];   
 $tipo    = $_POST['tipo'];
   
 try {

    include_once('wjbt_conexion.php');

    $sql = "INSERT INTO tipovivienda_wjbt (id_wjbt, tipo_wjbt) VALUES (?,?)";
    $stm = $conn->prepare($sql)->execute(array($id, $tipo));
    
    $msg = 'Los datos han sido guardado con exito!!!';
    header('location:wjbt_tablaTipoVivienda.php?err=$msg');
    

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