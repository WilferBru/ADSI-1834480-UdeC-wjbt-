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
          <p class="mb-4">Podra Ingresar nuevos usuarios para iniciar sesión</p>

          <!-- Content Row -->
           <div class="card-body">
              <div class="form-responsive">
                <div class="dataTables_length" id="dataTable_length"><a href="wjbt_usuarios.php" class="btn btn-success b">Volver</a></div>
                <hr>
                <form action="wjbt_guardarusuario.php" method="post">

                    <h1>Agregar Usuario</h1>
                  <div class="row" style="margin-top: 15px;">
                      <div class="form-group col-md-12">
                          <label for="Identificacion"><b>Identificación</b></label>
                          <input type="number" name="identificacion" class="form-control" id="Identificacion" placeholder="Numero de identificacion" autofocus required>
                      </div>

                      <div class="form-group col-md-6">
                          <label for="nombre"><b>Nombre</b></label>
                          <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre completo" autofocus required>
                      </div>
                      
                      <div class="form-group col-md-6">
                          <label for="usuario"><b>Usuario</b></label>
                          <input type="text" name="usuario" class="form-control" id="usuario" placeholder="Ingrese Usuario No existente" required>
                      </div>

                      <div class="form-group col-md-6">
                          <label for="password"><b>Contraseña</b></label>
                          <input type="password" name="password1" class="form-control" id="password" placeholder="Ingrese Contraseña" required>
                      </div>

                      <div class="form-group col-md-6" style="margin-top: 32px;">
                          <input type="password" name="password2" class="form-control" id="password" placeholder="Repita la Contraseña" required>
                      </div>
                       
                       <div class="form-group col-md-6">
                          <label for="nombre"><strong>Genero</strong></label>  
                          <select name="genero" class="form-control">
                            <?php 
                            $rows = $stm->fetchAll(PDO::FETCH_OBJ);

                                      foreach ($rows as $row) {
                                         $row->id_wjbt;
                                         $row->genero_wjbt;  
                                         echo "
                                            <option value='$row->id_wjbt'>$row->genero_wjbt</option>
        
                                         ";
                                      }
                            ?>
                          </select>
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
