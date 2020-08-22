<?php
session_start();
if (isset($_SESSION['admin'])) { ?>

<?php 
  
 try {

    include_once('wjbt_conexion.php');

    $sql = "SELECT * FROM ingresoHogar_wjbt";
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
          <p class="mb-4">Podra visualizar los tipos de Ingreso de Hogar registrado y podra agregar o eliminar un Ingreso de Hogar si lo cree pertinente.</p>
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
              <h6 class="m-0 font-weight-bold text-primary">Tabla Ingreso Del Hogar</h6>
            </div>
            <div class="navbar">

              <div class="dataTables_length" id="dataTable_length"><a href="wjbt_nuevoIngresoHogar.php" class="btn btn-success b">nuevo</a></div>

          </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead class="bg-primary text-white">
                    <tr>
                      <th>Id</th>
                      <th>Tipos De Ingresos</th>
                      <th><i class="fa fa-cog fa-spin" aria-hidden="true"></i> Modificar</th>
                      
                    </tr>
                  </thead>
                  <tfoot class="bg-primary text-white">
                    <tr>
                      <th>Id</th>
                      <th>Tipos De Ingresos</th>
                      <th><i class="fa fa-cog fa-spin" aria-hidden="true"></i> Modificar</th>

                    </tr>
                  </tfoot>
                  <tbody>  
                      <?php 

                          include_once('SED.php');
                            $rows = $stm->fetchAll(PDO::FETCH_OBJ);

                            foreach ($rows as $row) {
                               $row->id_wjbt;
                               $row->ingreso_wjbt;
                               $claveE=SED::encryption($row->id_wjbt);
                               echo "
                                  <tr>
                                  <td>$row->id_wjbt</td>
                                  <td>$row->ingreso_wjbt</td>
                                  <td>
                                        <div class='btn-group'>
                                          <button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                            <i class='fa fa-pencil-square-o' aria-hidden='true'></i>
                                          </button>
                                          <div class='dropdown-menu'>
                                            <a class='dropdown-item text-primary' href='wjbt_modificarIngresoHogar.php?id_wjbt=$claveE'><i class='fa fa-pencil fa-fw'></i> Editar</a>
                                            <a class='dropdown-item text-danger' onclick='return Confirmdelete()' href='wjbt_borrarIngresoHogar.php?id_wjbt=$row->id_wjbt'><i class='fa fa-trash-o fa-fw'></i> Borrar</a>
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

