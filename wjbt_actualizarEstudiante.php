<?php
session_start();
if (isset($_SESSION['admin'])) { ?>

<?php 
 
 if ($_GET['id'] == null or $_GET['id'] == '' or $_GET['apellido'] == null or $_GET['apellido'] == '' or $_GET['nombre'] == null or $_GET['nombre'] == '' or  $_GET['programa'] == null or $_GET['programa'] == '' or $_GET['genero'] == null or $_GET['genero'] == '') {

    echo ' <div class="dataTables_length text-center" id="dataTable_length"><div class="alert alert-danger" role="alert">Campos vacios por favor verifique informacion</div>';
 
}else{

     $id          = $_GET['id'];
     $apellido    = $_GET['apellido'];
     $nombre      = $_GET['nombre'];
     $programa    = $_GET['programa'];
     $genero      = $_GET['genero'];

    try {

    include_once('wjbt_conexion.php');

    $sql = "UPDATE estudiantes_wjbt SET apellido_wjbt = ?, nombre_wjbt= ?, programaFormacion_wjbt = ?, id_genero_wjbt = ? WHERE id_wjbt = ? ";
    $stm = $conn->prepare($sql)->execute(array($apellido , $nombre , $programa, $genero, $id));
    
    $msg = 'Los datos han sido guardado con exito!!!';
    header('location:wjbt_estudiantes.php?err=$msg');
    

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
