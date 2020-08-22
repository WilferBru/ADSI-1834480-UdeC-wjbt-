<?php
session_start();
if (isset($_SESSION['admin'])) { ?>

<?php 

 include_once('SED.php');
 $id     = $_GET['id_wjbt'];
 $claveD=SED::decryption($id);  
 
 try {

    include_once('wjbt_conexion.php');

    $sql = "SELECT * FROM estadocivil_wjbt WHERE id_wjbt = ? ";
    $stm = $conn->prepare($sql);
    $stm->execute(array($claveD));

    $rows = $stm->fetchAll(PDO::FETCH_OBJ);
    foreach ($rows as $row) {
    	  $row->id_wjbt;
        $row->estadoCivil_wjbt;
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
                <div class="dataTables_length" id="dataTable_length"><a href="wjbt_tablaEstadoCivil.php" class="btn btn-success b">Volver</a></div>
                <hr>
                <form action="wjbt_actualizadoEstadoCivil.php" method="get">

                  <h1>Guardar Estado Civil</h1>
                  <div class="row">
                        
                            <input type="hidden" name="id" class="form-control" id="id" placeholder="Numero de identificacion" value="<?=$row->id_wjbt?>">
                        

                        <div class="form-group col-md-6">
                            <label for="id"><b>id</b></label>
                            <input type="number" class="form-control" id="id" placeholder="Numero de identificacion" readonly value="<?=$row->id_wjbt?>" autofocus required>
                        </div>
                          
                          
                        <div class="form-group col-md-6">
                            <label for="Estado"><strong>Estado Civil</strong></label>
                            <input type="text" value="<?=$row->estadoCivil_wjbt?>" name="estado" class="form-control" placeholder="Tipo de Estado Civil" id="Estado" required>
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
	

