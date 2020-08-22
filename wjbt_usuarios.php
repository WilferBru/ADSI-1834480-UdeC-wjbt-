<?php
session_start();
if (isset($_SESSION['admin'])) { ?>

<?php 
  
 try {

    include_once('wjbt_conexion.php');

    $sql = "SELECT sesion_wjbt.id_wjbt, sesion_wjbt.identificacion_wjbt, sesion_wjbt.nombre_wjbt, sesion_wjbt.usuario_wjbt, sesion_wjbt.password_wjbt, genero_wjbt.genero_wjbt FROM sesion_wjbt INNER JOIN  genero_wjbt ON sesion_wjbt.id_genero_wjbt = genero_wjbt.id_wjbt";
    $stm = $conn->prepare($sql);
    $stm->execute();
    
    

 } catch (Exception $e) {
  echo 'Connected fallida: '.$e->getMessage();
 }

?>


<?php 
 $msg = null;
 if (isset($_GET['err'])) {
   $msg = $_GET['err'];
 }
?>

<script type="text/javascript">
    function Confirmdelete(){
      var respuesta = confirm('¿Estas seguro de que quieres eliminar el registro?');
      if (respuesta == true){
          return true;
      }else{
        return false;
      }
    }
</script>

<?php 
  include_once('wjbt_contenido.php');
?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-1 text-gray-800">Bienvenido administrador</h1>
          <p class="mb-4">Podra visualizar los usuarios registrados en la base de daos Y podra agregar nuevos Usuarios</p>
            <?php 
                  if ($msg != null) { ?>
                    <div class="alert alert-primary container" role="alert">
                      <?='Los datos han sido guardado con exito!!!'?>
                    </div><?php
                  }
            ?>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tabla de Los usuarios</h6>
            </div>
            <div class="navbar">

              <div class="dataTables_length" id="dataTable_length"><a href="wjbt_nuevoUsuario.php" class="btn btn-success b">nuevo</a></div>

          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="wjbt_buscarUsuario.php" method="get">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" name="palabra" placeholder="Buscar Usuario" aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>
          
          </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead class="bg-primary text-white">
                    <tr>
                      <th>Id</th>
                      <th>Identificaión</th>
                      <th>Nombre</th>
                      <th>Usuario</th>
                      <th>Contraseña</th>
                      <th>Genero</th>
                      <th><i class="fa fa-cog fa-spin" aria-hidden="true"></i> Modificar</th>
                    </tr>
                  </thead>
                  <tfoot class="bg-primary text-white">
                    <tr>
                      <th>Id</th>
                      <th>Identificaión</th>
                      <th>Nombre</th>
                      <th>Usuario</th>
                      <th>Contraseña</th>
                      <th>Genero</th>
                      <th><i class="fa fa-cog fa-spin" aria-hidden="true"></i> Modificar</th>
                    </tr>
                  </tfoot>
                  <tbody>  
                      <?php 
                            $rows = $stm->fetchAll(PDO::FETCH_OBJ);

                            foreach ($rows as $row) {
                               $row->id_wjbt;
                               $row->identificacion_wjbt;
                               $row->nombre_wjbt;  
                               $row->usuario_wjbt;
                               $row->password_wjbt;
                               $row->genero_wjbt;
                               echo "
                                  <tr>
                                  <td>$row->id_wjbt</td>
                                  <td>$row->identificacion_wjbt</td>
                                  <td>$row->nombre_wjbt</td> 
                                  <td>$row->usuario_wjbt</td>
                                  <td>$row->password_wjbt</td>
                                  <td>$row->genero_wjbt</td>
                                  <td>
                                        <div class='btn-group'>
                                          <button type='button' class='btn btn-danger'>
                                            <a class='text-white' onclick='return Confirmdelete()' href='wjbt_borrarUsuario.php?id_wjbt=$row->id_wjbt'><i class='fa fa-trash-o fa-fw'></i> Borrar</a>
                                          </button>
                                        </div>
                                  </td>
                                  </tr>
                               ";
                            }
                     ?>        
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

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

