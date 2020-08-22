<?php
session_start();
if (isset($_SESSION['udec'])) { ?>

<?php 
 
  if ($_SESSION['id_genero_wjbt'] == 1) {
   $welcome = "Bienvenido";
 } else if ($_SESSION['id_genero_wjbt'] == 1) {
   $welcome = "Bienvenida";
 } else {
   $welcome = "Bienvenid@";
 }
 

?>

<?php 
  
 try {

     
     
    include_once('wjbt_conexion.php');

    $sql0 = "SELECT * FROM genero_wjbt";
    $stm0 = $conn->prepare($sql0);
    $stm0->execute();

    $sql1 = "SELECT * FROM zona_wjbt";
    $stm1 = $conn->prepare($sql1);
    $stm1->execute();
    
    $sql2 = "SELECT * FROM estadocivil_wjbt";
    $stm2 = $conn->prepare($sql2);
    $stm2->execute();

    $sql3 = "SELECT * FROM nivelacademicopadres_wjbt";
    $stm3 = $conn->prepare($sql3);
    $stm3->execute();

    $sql4 = "SELECT * FROM tipovivienda_wjbt";
    $stm4 = $conn->prepare($sql4);
    $stm4->execute();

    $sql6 = "SELECT * FROM ingresoHogar_wjbt";
    $stm6 = $conn->prepare($sql6);
    $stm6->execute();

    $sql5 = "SELECT * FROM encuesta_wjbt WHERE identificacion_wjbt = ? ";
    $stm5 = $conn->prepare($sql5);
    $stm5->execute(array($_SESSION['identificacion_wjbt']));
    
    $rows5 = $stm5->fetchAll(PDO::FETCH_OBJ);

    foreach ($rows5 as $row) {
    $row->id_wjbt;
    $row->identificacion_wjbt;
    $row->nombre_wjbt;
    $row->apellido_wjbt;  
    $row->correo_wjbt;
    $row->id_zona_wjbt;
    $row->direccion_wjbt;
    $row->id_genero_wjbt;
    $row->id_estadoCivil_wjbt;
    $row->fechaNacimiento_wjbt;
    $row->insEducativaProcedente_wjbt;
    $row->fechaCulminacion_wjbt;
    $row->id_nivelacademicopadres_wjbt;
    $row->trabajoPadre_wjbt;
    $row->trabajoMadre_wjbt;
    $row->id_tipoVivienda_wjbt;
    $row->id_ingresoHogar_wjbt;
    $row->nivelPrograma_wjbt;
    $row->asignaturasMatriculadas_wjbt;
    }

  
    if ($stm5->rowCount() > 0 ) {
    
    header('location:wjbt_encuestaRealizada.php');
    
   }else { ?>
        
  <?php 
   include_once('wjbt_contenidoIndex.php');
  ?>
        <!-- End of Topbar -->

  <!-- Begin Page Content -->
  <div class="container-fluid">
    
     <!-- Content Row -->
    <div class="card-body">
      <div class="form-responsive">
        <h1 class="h3 mb-1 text-gray-800"><?=$welcome?> <?=$_SESSION['nombre_wjbt']?></h1>
        <p class="mb-4">Por favor realice la siguiente encuesta.</p>
          <hr>
          <form action="wjbt_guardarEncuesta.php" method="get">

             <h3>Encuesta univercidad de cartagena</h3>
                  <div class="row" style="margin-top: 15px;">
                      <div class="form-group col-md-6">
                          <label for="Identificacion"><b>Identificación</b></label>
                          <input type="number" name="identificacion" class="form-control" id="Identificacion" placeholder="Numero de identificacion" autofocus required>
                      </div>

                      <div class="form-group col-md-6">
                          <label for="nombre"><b>Nombre</b></label>
                          <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre completo"  required>
                      </div>
                      
                      <div class="form-group col-md-6">
                          <label for="apellido"><b>Apellido</b></label>
                          <input type="text" name="apellido" class="form-control" id="apellido" placeholder="Apellidos" required>
                      </div>

                      <div class="form-group col-md-6">
                          <label for="email"><b>Correo</b></label>
                          <input type="email" name="email" class="form-control" id="email" placeholder="Ingrese Correo" required>
                      </div>

                      <div class="form-group col-md-6">
                          <label for="zona"><strong>Localidad En la que vive</strong></label>  
                          <select name="zona" class="form-control">
                            <?php 
                            $rows1 = $stm1->fetchAll(PDO::FETCH_OBJ);

                                      foreach ($rows1 as $row1) {
                                         $row1->id_wjbt;
                                         $row1->zona_wjbt;  
                                         echo "
                                            <option value='$row1->id_wjbt'>$row1->zona_wjbt</option>
        
                                         ";
                                      }
                            ?>
                          </select>
                        </div>
                      <div class="form-group col-md-6">
                          <label for="direccion"><b>Direccion</b></label>
                          <input type="text" name="direccion" class="form-control" id="direccion" placeholder="Igrese su direccion..." required>
                      </div>
                       
                      <div class="form-group col-md-6">
                          <label for="nombre"><strong>Genero</strong></label>  
                          <select name="genero" class="form-control">
                            <?php 
                            $rows0 = $stm0->fetchAll(PDO::FETCH_OBJ);

                                      foreach ($rows0 as $row0) {
                                         $row0->id_wjbt;
                                         $row0->genero_wjbt;  
                                         echo "
                                            <option value='$row0->id_wjbt'>$row0->genero_wjbt</option>
        
                                         ";
                                      }
                            ?>
                          </select>
                      </div>


                      <div class="form-group col-md-6">
                          <label for="educativa"><b>Institucion educativa de la cual procede</b></label>
                          <input type="text" name="institucion" class="form-control" id="educativa" placeholder="Institucion educativa" required>
                      </div>  

                      <div class="form-group col-md-6">
                          <label for="nacido"><b>Fecha de nacimiento</b></label>
                          <input type="date" name="fechaNacimiento" class="form-control" id="nacido" placeholder="Institucion educativa" required>
                      </div>

                      <div class="form-group col-md-6">
                          <label for="nombre"><strong>Estado Civil</strong></label>  
                          <select name="estadoCivil" class="form-control">
                            <?php 
                            $rows2 = $stm2->fetchAll(PDO::FETCH_OBJ);

                                      foreach ($rows2 as $row2) {
                                         $row2->id_wjbt;
                                         $row2->estadoCivil_wjbt;  
                                         echo "
                                            <option value='$row2->id_wjbt'>$row2->estadoCivil_wjbt</option>
        
                                         ";
                                      }
                            ?>
                          </select>
                      </div> 

                      <div class="form-group col-md-6">
                          <label for="termino"><b>Fecha en la que que termino el colegio</b></label>
                          <input type="date" name="fechaCulminacion" class="form-control" id="termino" placeholder="Institucion educativa" required>
                      </div>

                      <div class="form-group col-md-6">
                          <label for="educativa"><b>Nivel academico de los padres</b></label>
                          <select name="nivelPadres" class="form-control">
                            <?php 
                            $rows3 = $stm3->fetchAll(PDO::FETCH_OBJ);

                                      foreach ($rows3 as $row3) {
                                         $row3->id_wjbt;
                                         $row3->nivel_wjbt;  
                                         echo "
                                            <option value='$row3->id_wjbt'>$row3->nivel_wjbt</option>
        
                                         ";
                                      }
                            ?>
                          </select>
                      </div>  

                      <div class="form-group col-md-6">
                          <label for="trabajoPadre"><b>Trabajo del padre</b></label>
                          <input type="text" name="trabajoPadre" class="form-control" id="trabajoPadre" placeholder="Trabajo del padre..." autofocus required>
                      </div>  

                      <div class="form-group col-md-6">
                          <label for="trabajoMadre"><b>Trabajo de la madre</b></label>
                          <input type="text" name="trabajoMadre" class="form-control" id="trabajoMadre" placeholder="Trabajo de la madre..." autofocus required>
                      </div> 

                      <div class="form-group col-md-6">
                          <label for="educativa"><b>Tipo de vivienda</b></label>
                          <select name="tipoVivienda" class="form-control">
                            <?php 
                            $rows4 = $stm4->fetchAll(PDO::FETCH_OBJ);

                                      foreach ($rows4 as $row4) {
                                         $row4->id_wjbt;
                                         $row4->tipo_wjbt;  
                                         echo "
                                            <option value='$row4->id_wjbt'>$row4->tipo_wjbt</option>
        
                                         ";
                                      }
                            ?>
                          </select>
                      </div>  

                      <div class="form-group col-md-6">
                          <label for="ingreso"><strong>Nivel de ingreso del hogar</strong></label>  
                          <select name="ingreso" class="form-control">
                            <?php 
                            $rows6 = $stm6->fetchAll(PDO::FETCH_OBJ);

                                      foreach ($rows6 as $row6) {
                                         $row6->id_wjbt;
                                         $row6->ingreso_wjbt;  
                                         echo "
                                            <option value='$row6->id_wjbt'>$row6->ingreso_wjbt</option>
        
                                         ";
                                      }
                            ?>
                          </select>
                      </div>

                      <div class="form-group col-md-6">
                          <label for="nivelPrograma"><b>Como califica el nivel de la educación del programa matriculado</b></label>
                          <input type="number" name="nivelPrograma" class="form-control" id="nivelPrograma" placeholder="Califique del 1 al 10 su programa matriculado..." min="1" max="10" required>
                      </div>

                      <div class="form-group col-md-6">
                          <label for="asignaturas"><b>Cuantas asignaturas tiene matriculadas</b></label>
                          <input type="number" name="asignaturas" class="form-control" id="asignaturas" placeholder="Asignaturas matriculadas..."  max="15" required>
                      </div>              
                     
                      <div class="form-group col-md-12"  >
                          <button type="submit" class="btn btn-danger" style="margin-top: 10px;">Guardar</button>
                      </div>
                      
                  </div>
          </form>
    </div>
  </div>
</div>
      <!-- End of Main Content -->

      <!-- Footer -->
<?php
 include_once('wjbt_footerIndex.php');
?>

    <?php
  }
    
    
 } catch (Exception $e) {
  echo 'Connected fallida: '.$e->getMessage();
 }

?>



<?php
}else {
  
  header('location:wjbt_login.php');
}


?>
