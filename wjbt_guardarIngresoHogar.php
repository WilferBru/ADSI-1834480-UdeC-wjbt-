<?php
session_start();
if (isset($_SESSION['admin'])) { ?>

<?php 
  
  if ($_POST['id'] == null or $_POST['id'] == '' or $_POST['ingreso'] == null or $_POST['ingreso'] == '' ) {

     echo '<div class="alert alert-danger" role="alert">Campos vacios verifique informacion</div>';
  } else {

 $id      = $_POST['id'];   
 $ingreso = $_POST['ingreso'];
   
 try {

    include_once('wjbt_conexion.php');

    $sql = "INSERT INTO ingresoHogar_wjbt (id_wjbt, ingreso_wjbt) VALUES (?,?)";
    $stm = $conn->prepare($sql)->execute(array($id, $ingreso));
    
    $msg = 'Los datos han sido guardado con exito!!!';
    header('location:wjbt_tablaIngresoHogar.php?err=$msg');
    

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