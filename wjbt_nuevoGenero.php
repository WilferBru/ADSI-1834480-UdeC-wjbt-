<?php
session_start();
if (isset($_SESSION['admin'])) { ?>

<?php 
  
 try {

    include_once('wjbt_conexion.php');

    $sql = "SELECT * FROM genero_wjbt";
    $stm = $conn->prepare($sql);
    $stm->execute();
    
    

 } catch (Exception $e) {
  echo 'Connected fallida: '.$e->getMessage();
 }

?>




<?php 
  include_once('wjbt_contenido.php');
?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-1 text-gray-800">Bienvenido administrador</h1>
          <p class="mb-4">Podra Ingresar nuevos registros a la tabla Genero</p>

          <!-- Content Row -->
           <div class="card-body">
              <div class="form-responsive">
                <div class="dataTables_length" id="dataTable_length"><a href="wjbt_tablaGenero.php" class="btn btn-success b">Volver</a></div>
                <hr>
                <form action="wjbt_guardarGenero.php" method="post">

                    <h1>Agregar Tipo De Genero</h1>
                  <div class="row" style="margin-top: 15px;">
                      <div class="form-group col-md-6">
                          <label for="Id"><b>Id</b></label>
                          <input type="number" name="id" class="form-control" id="Id" placeholder="Numero de identificacion" autofocus required>
                      </div>

                      <div class="form-group col-md-6">
                          <label for="genero"><b>Nombre</b></label>
                          <input type="text" name="genero" class="form-control" id="genero" placeholder="Ingrese el nuevo tipo de genero" autofocus required>
                      </div>
                      
                                      
                     
                      <div class="form-group col-md-12"  >
                          <button type="submit" class="btn btn-danger" style="margin-top: 10px;">Guardar</button>
                      </div>
                      
                  </div>
                </form>
              </div>
            </div>
        <!-- /.container-fluid -->
      </div>

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
<?php 
  include_once('wjbt_footer.php');
?>

<?php
}else {
  
  header('location:wjbt_loginAdmin.php');
}


?>
