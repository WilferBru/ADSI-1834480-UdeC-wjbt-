<?php
session_start();
if (isset($_SESSION['admin'])) { ?>

<?php 
  
 try {

    include_once('wjbt_conexion.php');

    $sql = "SELECT estudiantes_wjbt.id_wjbt, estudiantes_wjbt.apellido_wjbt, estudiantes_wjbt.nombre_wjbt, estudiantes_wjbt.programaFormacion_wjbt, genero_wjbt.genero_wjbt FROM estudiantes_wjbt INNER JOIN genero_wjbt ON estudiantes_wjbt.id_genero_wjbt = genero_wjbt.id_wjbt";
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
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-1 text-gray-800">Bienvenido administrador</h1>
          <p class="mb-4">Podra visualizar los estudiantes y podra agregar nuevos estudiantes</p>
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
              <h6 class="m-0 font-weight-bold text-primary">Tabla De Los Estudiantes</h6>
            </div>
            <div class="navbar">

              <div class="dataTables_length" id="dataTable_length"><a href="wjbt_nuevoEstudiante.php" class="btn btn-success b">nuevo</a></div>

            <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="wjbt_bucarEstudiante.php" method="get">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Buscar estudiate" aria-label="Search" name="palabra" aria-describedby="basic-addon2" required>
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
                      <th>Apellido</th>
                      <th>Nombre</th>
                      <th>Programa de Formacion</th>
                      <th>Genero</th>
                      <th><i class="fa fa-cog fa-spin" aria-hidden="true"></i> Modificar</th>
                      
                    </tr>
                  </thead>
                  <tfoot class="bg-primary text-white">
                    <tr>
                      <th>Id</th>
                      <th>Apellido</th>
                      <th>Nombre</th>
                      <th>Programa de Formacion</th>
                      <th>Genero</th>
                      <th><i class="fa fa-cog fa-spin" aria-hidden="true"></i> Modificar</th>

                    </tr>
                  </tfoot>
                  <tbody>  
                      <?php 
                            $rows = $stm->fetchAll(PDO::FETCH_OBJ);

                            foreach ($rows as $row) {
                               $row->id_wjbt;
                               $row->apellido_wjbt;  
                               $row->nombre_wjbt;
                               $row->programaFormacion_wjbt;
                               $row->genero_wjbt;
                               echo "
                                  <tr>
                                  <td>$row->id_wjbt</td>
                                  <td>$row->apellido_wjbt</td> 
                                  <td>$row->nombre_wjbt</td>
                                  <td>$row->programaFormacion_wjbt</td>
                                  <td>$row->genero_wjbt</td>
                                  <td>
                                        <div class='btn-group'>
                                          <button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                            <i class='fa fa-pencil-square-o' aria-hidden='true'></i>
                                          </button>
                                          <div class='dropdown-menu'>
                                            <a class='dropdown-item text-primary' href='wjbt_modificarEstudiantes.php?id_wjbt=$row->id_wjbt'><i class='fa fa-pencil fa-fw'></i> Editar</a>
                                            <a class='dropdown-item text-danger' onclick='return Confirmdelete()' href='wjbt_borrarEstudiantes.php?id_wjbt=$row->id_wjbt'><i class='fa fa-trash-o fa-fw'></i> Borrar</a>
                                          </div>
                                        </div>
                                  </td>
                                  </tr>
                               ";
                            }
                     ?>     
                  </tbody>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>

<?php
  include_once('wjbt_footer.php');
?>

<?php
}else {
  
  header('location:wjbt_loginAdmin.php');
}


?>

