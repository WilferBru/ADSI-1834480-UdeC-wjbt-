<?php
session_start();
if (isset($_SESSION['admin'])) { ?>

<?php 
 
 if ($_POST['id'] == null or $_POST['id'] == '' or $_POST['apellido'] == null or $_POST['apellido'] == '' or $_POST['nombre'] == null or $_POST['nombre'] == '' or  $_POST['programa'] == null or $_POST['programa'] == '' or $_POST['genero'] == null or $_POST['genero'] == '') {

    echo ' <div class="dataTables_length text-center" id="dataTable_length"><div class="alert alert-danger" role="alert">Campos vacios por favor verifique informacion</div>';
 
}else{

     $id          = $_POST['id'];
     $apellido    = $_POST['apellido'];
     $nombre      = $_POST['nombre'];
     $programa    = $_POST['programa'];
     $genero      = $_POST['genero'];

    try {

    include_once('wjbt_conexion.php');

    $sql = "INSERT INTO estudiantes_wjbt (id_wjbt, apellido_wjbt, nombre_wjbt, programaFormacion_wjbt, id_genero_wjbt) VALUES (?,?,?,?,?)";
    $stm = $conn->prepare($sql)->execute(array($id, $apellido , $nombre , $programa, $genero ));
    
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
