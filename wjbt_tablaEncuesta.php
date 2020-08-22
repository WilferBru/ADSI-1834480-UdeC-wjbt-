<?php
session_start();
if (isset($_SESSION['admin'])) { ?>


<?php 
  include_once('wjbt_contenido.php')
?>

<?php 
  
 try {

    include_once('wjbt_conexion.php');

    $sql = "SELECT encuesta_wjbt.identificacion_wjbt, encuesta_wjbt.nombre_wjbt, encuesta_wjbt.apellido_wjbt, encuesta_wjbt.correo_wjbt, zona_wjbt.zona_wjbt, encuesta_wjbt.direccion_wjbt, genero_wjbt.genero_wjbt, estadocivil_wjbt.estadoCivil_wjbt, encuesta_wjbt.fechaNacimiento_wjbt, encuesta_wjbt.insEducativaProcedente_wjbt, encuesta_wjbt.fechaCulminacion_wjbt, nivelacademicopadres_wjbt.nivel_wjbt, encuesta_wjbt.trabajoPadre_wjbt, encuesta_wjbt.trabajoMadre_wjbt, tipovivienda_wjbt.tipo_wjbt, ingresoHogar_wjbt.ingreso_wjbt, encuesta_wjbt.nivelPrograma_wjbt, encuesta_wjbt.asignaturasMatriculadas_wjbt FROM encuesta_wjbt INNER JOIN genero_wjbt ON encuesta_wjbt.id_genero_wjbt = genero_wjbt.id_wjbt INNER JOIN estadocivil_wjbt ON encuesta_wjbt.id_estadoCivil_wjbt = estadocivil_wjbt.id_wjbt INNER JOIN nivelacademicopadres_wjbt ON encuesta_wjbt.id_nivelacademicopadres_wjbt = nivelacademicopadres_wjbt.id_wjbt INNER JOIN tipovivienda_wjbt ON encuesta_wjbt.id_tipoVivienda_wjbt = tipovivienda_wjbt.id_wjbt INNER JOIN zona_wjbt ON encuesta_wjbt.id_zona_wjbt = zona_wjbt.id_wjbt INNER JOIN ingresoHogar_wjbt ON encuesta_wjbt.id_ingresoHogar_wjbt = ingresohogar_wjbt.id_wjbt";
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

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
         <h1 class="h3 mb-1 text-gray-800">Bienvenido administrador</h1>
          <p class="mb-4">Podra visualizar los datos de la encuesta realizada por los estudiantes Y buscar registros que necesite de la tabla, tenga en cuenta que podra buscar los datos que estan dentro de las columnas, y algunos campos son unicos(dentificacion, correo, genero, estado civil, nivel academicos de los padres y tipo vivienda) por lo que esos datos debera escribirlos correctamente.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tabla Encuesta De Los Estudiantes</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead class="bg-primary text-white">
                    <tr>
                      <th>Idendificacion</th>
                      <th>Nombre</th>
                      <th>Apellido</th>
                      <th>correo</th>
                      <th>Localidad donde vive</th>
                      <th>Direccio</th>
                      <th>Genero</th>
                      <th>Estado Civil</th>
                      <th>Fecha De Nacimiento</th>
                      <th>Ins.Educativa Procedente</th>
                      <th>Fecha Culminacion</th>
                      <th>Nivel Academico Padres</th>
                      <th>Trabajo Padre</th>
                      <th>Trabajo Madre</th>
                      <th>Tipo Viviendo</th>
                      <th>Nivel Ingreso Hogar</th>
                      <th>Nivel Del Programa Matriculado</th>
                      <th>Asignturas Matriculadas</th>
                    </tr>
                  </thead>
                  <tfoot class="bg-primary text-white">
                    <tr>
                      <th>Idendificacion</th>
                      <th>Nombre</th>
                      <th>Apellido</th>
                      <th>correo</th>
                      <th>Localidad donde vive</th>
                      <th>Direccio</th>
                      <th>Genero</th>
                      <th>Estado Civil</th>
                      <th>Fecha De Nacimiento</th>
                      <th>Ins.Educativa Procedente</th>
                      <th>Fecha Culminacion</th>
                      <th>Nivel Academico Padres</th>
                      <th>Trabajo Padre</th>
                      <th>Trabajo Madre</th>
                      <th>Tipo Viviendo</th>
                      <th>Nivel Ingreso Hogar</th>
                      <th>Nivel Del Programa Matriculado</th>
                      <th>Asignturas Matriculadas</th>
                    </tr>
                  </tfoot>
                  <tbody>
                     <?php 
                            $rows = $stm->fetchAll(PDO::FETCH_OBJ);

                            foreach ($rows as $row) {
                               $row->identificacion_wjbt;
                               $row->nombre_wjbt;
                               $row->apellido_wjbt;  
                               $row->correo_wjbt;
                               $row->zona_wjbt;
                               $row->direccion_wjbt;
                               $row->genero_wjbt;
                               $row->estadoCivil_wjbt;
                               $row->fechaNacimiento_wjbt;
                               $row->insEducativaProcedente_wjbt;
                               $row->fechaCulminacion_wjbt;
                               $row->nivel_wjbt;
                               $row->trabajoPadre_wjbt;
                               $row->trabajoMadre_wjbt;
                               $row->tipo_wjbt;
                               $row->ingreso_wjbt;
                               $row->nivelPrograma_wjbt;
                               $row->asignaturasMatriculadas_wjbt;
                               echo "
                                  <tr>
                                  <td>$row->identificacion_wjbt</td>
                                  <td>$row->nombre_wjbt</td>
                                  <td>$row->apellido_wjbt</td>
                                  <td>$row->correo_wjbt</td>
                                  <td>$row->zona_wjbt</td>
                                  <td>$row->direccion_wjbt</td>
                                  <td>$row->genero_wjbt</td>
                                  <td>$row->estadoCivil_wjbt</td>
                                  <td>$row->fechaNacimiento_wjbt</td>
                                  <td>$row->insEducativaProcedente_wjbt</td>
                                  <td>$row->fechaCulminacion_wjbt</td>
                                  <td>$row->nivel_wjbt</td>
                                  <td>$row->trabajoPadre_wjbt</td>
                                  <td>$row->trabajoMadre_wjbt</td>
                                  <td>$row->tipo_wjbt</td>
                                  <td>$row->ingreso_wjbt</td>
                                  <td>$row->nivelPrograma_wjbt</td>
                                  <td>$row->asignaturasMatriculadas_wjbt</td>
                                  </tr>
                               ";
                            }
                     ?>     
                  </tbody>
                </table>
                <br>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
<?php
  // Obteniendo la fecha actual con hora, minutos y segundos en PHP
  $fechaActual = date('Y');
  
?>
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>&copy;Universidad De Cartagena <?=$fechaActual?></span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">¿Preparado para salir?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Seleccione "Cerrar sesión" a continuación si está listo para finalizar su sesión actual.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-primary" href="wjbt_logoutAdmin.php">Cerrar sesión</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>



<?php
}else {
  
  header('location:wjbt_loginAdmin.php');
}


?>
