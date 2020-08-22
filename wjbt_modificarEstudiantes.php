<?php
session_start();
if (isset($_SESSION['admin'])) { ?>

<?php 
  
 $id     = $_GET['id_wjbt'];

 try {

    include_once('wjbt_conexion.php');

    $sql2 = "SELECT * FROM estudiantes_wjbt WHERE id_wjbt = ? ";
    $stm = $conn->prepare($sql2);
    $stm->execute(array($id));

    $rows = $stm->fetchAll(PDO::FETCH_OBJ);
    foreach ($rows as $row) {
    	  $row->id_wjbt;
        $row->apellido_wjbt;  
        $row->nombre_wjbt;
        $row->programaFormacion_wjbt;
        $row->id_genero_wjbt;
    }

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
          <p class="mb-4">Podra Editar El registro que selecciono</p>
          <div class="alert alert-primary" role="alert">
			  <strong>¡ATENCION!</strong> El numero que aparece en el campo genero correponde al id de genero, si desea cambiarlo solo seleccione la otra opcion dentro del campo genero. 
		  </div>
          <!-- Content Row -->
           <div class="card-body">
              <div class="form-responsive">
                <div class="dataTables_length" id="dataTable_length"><a href="wjbt_estudiantes.php" class="btn btn-success b">Volver</a></div>
                <hr>
                <form action="wjbt_actualizarEstudiante.php" method="get">

                  <h1>Guardar Estudiates</h1>
                  <div class="row" style="margin-top: 15px;">
                        <div class="form-group col-md-12">
                            <input type="hidden" name="id" class="form-control" id="id" placeholder="Numero de identificacion" value="<?=$row->id_wjbt?>">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="id"><b>id</b></label>
                            <input type="number" class="form-control" id="id" placeholder="Numero de identificacion" readonly value="<?=$row->id_wjbt?>" autofocus required>
                        </div>
                          
                          
                        <div class="form-group col-md-6">
                            <label for="Apellidos"><strong>Apellidos</strong></label>
                            <input type="text" value="<?=$row->apellido_wjbt?>" name="apellido" class="form-control" placeholder="Apellidos" id="Apellidos" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="nombre"><strong>Nombres</strong></label>
                            <input type="text" value="<?=$row->nombre_wjbt?>" name="nombre" class="form-control" placeholder="Nombre Completo" id="nombre" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="Programa"><strong>Programa de formacion</strong></label>
                            <input type="text" name="programa" value="<?=$row->programaFormacion_wjbt?>" class="form-control" placeholder="Programa de formacion al cual pertenece" id="programa" required>
                        </div>
                          
                        <div class="form-group col-md-6">
                            <label for="nombre"><strong>Genero</strong></label>  
                            <select name="genero" class="form-control">
                            	<option value="<?=$row->id_genero_wjbt?>"><?=$row->id_genero_wjbt?></option>
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
	

