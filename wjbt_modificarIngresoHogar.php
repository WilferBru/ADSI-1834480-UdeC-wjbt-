<?php
session_start();
if (isset($_SESSION['admin'])) { ?>

<?php 
  
 include_once('SED.php');
 $id     = $_GET['id_wjbt'];
 $claveD=SED::decryption($id);

 try {

    include_once('wjbt_conexion.php');

    $sql = "SELECT * FROM ingresoHogar_wjbt WHERE id_wjbt = ? ";
    $stm = $conn->prepare($sql);
    $stm->execute(array($claveD));

    $rows = $stm->fetchAll(PDO::FETCH_OBJ);
    foreach ($rows as $row) {
    	  $row->id_wjbt;
        $row->ingreso_wjbt;
    }
  

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
          <p class="mb-4">Podra Editar El registro que selecciono</p>
          <!-- Content Row -->
           <div class="card-body">
              <div class="form-responsive">
                <div class="dataTables_length" id="dataTable_length"><a href="wjbt_tablaIngresoHogar.php" class="btn btn-success b">Volver</a></div>
                <hr>
                <form action="wjbt_actualizadoIngresoHogar.php" method="get">

                  <h1>Guardar Tipo De Ingreso Economico</h1>
                  <div class="row">
                        
                            <input type="hidden" name="id" class="form-control" id="id" placeholder="Numero de identificacion" value="<?=$row->id_wjbt?>">
                        

                        <div class="form-group col-md-6">
                            <label for="id"><b>id</b></label>
                            <input type="number" class="form-control" id="id" placeholder="Numero de identificacion" readonly value="<?=$row->id_wjbt?>" autofocus required>
                        </div>
                          
                          
                        <div class="form-group col-md-6">
                            <label for="ingreso"><strong>Tipo Ingreso Economico</strong></label>
                            <input type="text" value="<?=$row->ingreso_wjbt?>" name="ingreso" class="form-control" placeholder="Ingreso Economico" id="ingreso" required>
                        </div>

                          
                          <div class="form-group col-md-6" style="margin-top: 24px;" >
                          <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Actualizar</button>
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
	

