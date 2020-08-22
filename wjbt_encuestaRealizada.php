<?php
session_start();
if (isset($_SESSION['udec'])) { ?>

<?php 
 
 if ($_SESSION['id_genero_wjbt'] == 1) {
   $welcome = "Bienvenido";
 } else if ($_SESSION['id_genero_wjbt'] == 2) {
   $welcome = "Bienvenida";
 } else {
   $welcome = "Bienvenid@";
 }
 

?>

<?php 

  try { 
     
    include_once('wjbt_conexion.php');

    $sql0 = "SELECT encuesta_wjbt.id_wjbt, encuesta_wjbt.identificacion_wjbt, encuesta_wjbt.nombre_wjbt, encuesta_wjbt.apellido_wjbt, encuesta_wjbt.correo_wjbt, zona_wjbt.zona_wjbt, encuesta_wjbt.direccion_wjbt, genero_wjbt.genero_wjbt, estadocivil_wjbt.estadoCivil_wjbt, encuesta_wjbt.fechaNacimiento_wjbt, encuesta_wjbt.insEducativaProcedente_wjbt, encuesta_wjbt.fechaCulminacion_wjbt, nivelacademicopadres_wjbt.nivel_wjbt, encuesta_wjbt.trabajoPadre_wjbt, encuesta_wjbt.trabajoMadre_wjbt, tipovivienda_wjbt.tipo_wjbt, ingresohogar_wjbt.ingreso_wjbt, encuesta_wjbt.nivelPrograma_wjbt, encuesta_wjbt.asignaturasMatriculadas_wjbt FROM encuesta_wjbt INNER JOIN genero_wjbt ON encuesta_wjbt.id_genero_wjbt = genero_wjbt.id_wjbt INNER JOIN estadocivil_wjbt ON encuesta_wjbt.id_estadoCivil_wjbt = estadocivil_wjbt.id_wjbt INNER JOIN nivelacademicopadres_wjbt ON encuesta_wjbt.id_nivelacademicopadres_wjbt = nivelacademicopadres_wjbt.id_wjbt INNER JOIN tipovivienda_wjbt ON encuesta_wjbt.id_tipoVivienda_wjbt = tipovivienda_wjbt.id_wjbt INNER JOIN zona_wjbt ON encuesta_wjbt.id_zona_wjbt = zona_wjbt.id_wjbt INNER JOIN ingresoHogar_wjbt ON encuesta_wjbt.id_ingresoHogar_wjbt = ingresohogar_wjbt.id_wjbt WHERE identificacion_wjbt = ?";
    $stm0 = $conn->prepare($sql0);
    $stm0->execute(array($_SESSION['identificacion_wjbt']));

    $rows0 = $stm0->fetchAll(PDO::FETCH_OBJ);
    foreach ($rows0 as $row5) {
    $row5->id_wjbt;
    $row5->identificacion_wjbt;
    $row5->nombre_wjbt;
    $row5->apellido_wjbt;  
    $row5->correo_wjbt;
    $row5->zona_wjbt;
    $row5->direccion_wjbt;
    $row5->genero_wjbt;
    $row5->estadoCivil_wjbt;
    $row5->fechaNacimiento_wjbt;
    $row5->insEducativaProcedente_wjbt;
    $row5->fechaCulminacion_wjbt;
    $row5->nivel_wjbt;
    $row5->trabajoPadre_wjbt;
    $row5->trabajoMadre_wjbt;
    $row5->tipo_wjbt;
    $row5->ingreso_wjbt;
    $row5->nivelPrograma_wjbt;
    $row5->asignaturasMatriculadas_wjbt;
    }
    
    $sql = "SELECT * FROM genero_wjbt";
    $stm = $conn->prepare($sql);
    $stm->execute();

    $sql2 = "SELECT * FROM estadocivil_wjbt";
    $stm2 = $conn->prepare($sql2);
    $stm2->execute();

    $sql3 = "SELECT * FROM nivelacademicopadres_wjbt";
    $stm3 = $conn->prepare($sql3);
    $stm3->execute();

    $sql4 = "SELECT * FROM tipovivienda_wjbt";
    $stm4 = $conn->prepare($sql4);
    $stm4->execute();

    $sql5 = "SELECT * FROM zona_wjbt";
    $stm5 = $conn->prepare($sql5);
    $stm5->execute();

    $sql6 = "SELECT * FROM ingresoHogar_wjbt";
    $stm6 = $conn->prepare($sql6);
    $stm6->execute();

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
        <p class="mb-4">Esta es la encuesta que usted realizo, podra actualizar cual quier dato que uste crea que esta erroneo o sea pertinente actualizarlo.</p>
        <?php 
                  if ($msg != null) { ?>
                    <div class="alert alert-primary container" role="alert">
                      <?='Los datos han sido guardado con exito!!!'?>
                    </div><?php
                  }
            ?>
          <hr>
          
    </div>
    <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tu Encuesta</h6>
            </div>

            <div class="card-body">
              <button class="btn btn-outline-dark" data-toggle="modal" data-target=".bd-example-modal-lg">Actualizar</button> <br><br>
              <div class="table-responsive">
              <table class="table table-bordered">
                <thead  class="text-white bg-primary">
                  <tr>
                    <th scope="col">Datos</th>
                    <th scope="col">Registros</th>
                  </tr>
                </thead>

                <tbody>
                  <tr>
                    <th scope="row" class="text-dark">Identificacion</th>
                    <td colspan="2"><?=$row5->identificacion_wjbt?></td>
                  </tr>
                  <tr>
                    <th scope="row" class="text-dark">Nombre</th>
                    <td colspan="2"><?=$row5->nombre_wjbt?></td>
                  </tr>
                 <tr>
                    <th scope="row" class="text-dark">Apellido</th>
                    <td colspan="2"><?=$row5->apellido_wjbt?></td>
                  </tr>
                  <tr>
                    <th scope="row" class="text-dark">Correo</th>
                    <td colspan="2"><?=$row5->correo_wjbt?></td>
                  </tr>
                  <tr>
                    <th scope="row" class="text-dark">Localidad en la que vives</th>
                    <td colspan="2"><?=$row5->zona_wjbt?></td>
                  </tr>
                  <tr>
                    <th scope="row" class="text-dark">Direccion</th>
                    <td colspan="2"><?=$row5->direccion_wjbt?></td>
                  </tr>
                  <tr>
                    <th scope="row" class="text-dark">Genero</th>
                    <td colspan="2"><?=$row5->genero_wjbt?></td>
                  </tr>
                  <tr>
                    <th scope="row" class="text-dark">Institucion Educativa Procedente</th>
                    <td colspan="2"><?=$row5->insEducativaProcedente_wjbt?></td>
                  </tr>
                  <tr>
                    <th scope="row" class="text-dark">Fecha Nacimiento</th>
                    <td colspan="2"><?=$row5->fechaNacimiento_wjbt?></td>
                  </tr>
                  <tr>
                    <th scope="row" class="text-dark">Estado Civil</th>
                    <td colspan="2"><?=$row5->estadoCivil_wjbt?></td>
                  </tr>
                  <tr>
                    <th scope="row" class="text-dark">Fecha Culminacion</th>
                    <td colspan="2"><?=$row5->fechaCulminacion_wjbt?></td>
                  </tr>
                  <tr>
                    <th scope="row" class="text-dark">Nivel Academico Padres</th>
                    <td colspan="2"><?=$row5->nivel_wjbt?></td>
                  </tr>
                  <tr>
                    <th scope="row" class="text-dark">Trabajo Padre</th>
                    <td colspan="2"><?=$row5->trabajoPadre_wjbt?></td>
                  </tr>
                  <tr>
                    <th scope="row" class="text-dark">Trabajo Madre</th>
                    <td colspan="2"><?=$row5->trabajoMadre_wjbt?></td>
                  </tr>
                  <tr>
                    <th scope="row" class="text-dark">Tipo De Vivienda</th>
                    <td colspan="2"><?=$row5->tipo_wjbt?></td>
                  </tr>
                  <tr>
                    <th scope="row" class="text-dark">Nivel De Ingreso Del Hogar</th>
                    <td colspan="2"><?=$row5->ingreso_wjbt?></td>
                  </tr>
                  <tr>
                    <th scope="row" class="text-dark">Nivel de Edacuacion Del ProgramaMAtriculado</th>
                    <td colspan="2"><?=$row5->nivelPrograma_wjbt?></td>
                  </tr>
                  <tr>
                    <th scope="row" class="text-dark">Asignaturas Matriculadas</th>
                    <td colspan="2"><?=$row5->asignaturasMatriculadas_wjbt?></td>
                  </tr>
                </tbody>
              </table>
              </div>
            </div>
          </div>
  </div>
</div>

<!-- Formulario Modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header bg-primary text-white">
         <h4 class="modal-title" id="myModalLabel">Encuesta Univercidad de Cartagena</h4>
            <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true" style="color: white;">×</span>
                 <span class="sr-only">Close</span>
            </button>
                
      </div>

      <!-- Modal Body -->
      <div class="modal-body">
        <form action="wjbt_actualizadoEncuesta.php" method="get">

             <h3>Sus Datos</h3>
             <hr>
                  <div class="row" style="margin-top: 15px;">
                      
                       <div class="form-group col-md-12">
                            <input type="hidden" name="identificacion" class="form-control" id="id" placeholder="Numero de identificacion" value="<?=$row5->identificacion_wjbt?>">
                        </div>  

                      <div class="form-group col-md-6">
                          <label for="Identificacion"><b>Identificación</b></label>
                          <input  type="text"  value="<?=$row5->identificacion_wjbt?>" class="form-control" id="Identificacion" placeholder="Numero de identificacion" autofocus required readonly >
                      </div>

                      <div class="form-group col-md-6">
                          <label for="nombre"><b>Nombre</b></label>
                          <input type="text" name="nombre" value="<?=$row5->nombre_wjbt?>" class="form-control" id="nombre" placeholder="Nombre completo" required >
                      </div>
                      
                      <div class="form-group col-md-6">
                          <label for="apellido"><b>Apellido</b></label>
                          <input type="text" name="apellido" value="<?=$row5->apellido_wjbt?>" class="form-control" id="apellido" placeholder="Apellidos" required>
                      </div>

                      <div class="form-group col-md-6">
                          <label for="email"><b>Correo</b></label>
                          <input type="email" name="email" value="<?=$row5->correo_wjbt?>" class="form-control" id="email" placeholder="Ingrese Correo" required>
                      </div>

                      <div class="form-group col-md-6">
                          <label for="zona"><strong>Loalidad en la que vives</strong></label>  
                          <select name="zona" class="form-control">
                            <!-- Todos los tipos de filas diferentes tienen esos numeros para que pertenescan a el campo en especifico ya que hay muchas tablas las cuales hay que meter como forneas de esta tabla en especifico. -->
                          <option selected value="<?=$row5->zona_wjbt?>"><?=$row5->zona_wjbt?></option>
                            <?php 
                            $filas = $stm5->fetchAll(PDO::FETCH_OBJ);

                                      foreach ($filas as $fila) {
                                         $fila->id_wjbt;
                                         $fila->zona_wjbt;  
                                         echo "
                                            <option value='$fila->zona_wjbt'>$fila->zona_wjbt</option>
        
                                         ";
                                      }
                            ?>
                          </select>
                      </div>

                      <div class="form-group col-md-6">
                          <label for="direccion"><b>Direccion</b></label>
                          <input type="text" name="direccion" value="<?=$row5->direccion_wjbt?>" class="form-control" id="direccion" placeholder="Igrese su direccion..." required>
                      </div>
                       
                      <div class="form-group col-md-6">
                          <label for="nombre"><strong>Genero</strong></label>  
                          <select name="genero" class="form-control">
                          <option  value="<?=$row5->genero_wjbt?>"><?=$row5->genero_wjbt?></option>
                            <?php 
                            $rows = $stm->fetchAll(PDO::FETCH_OBJ);

                                      foreach ($rows as $row) {
                                         $row->id_wjbt;
                                         $row->genero_wjbt;  
                                         echo "
                                            <option value='$row->genero_wjbt'>$row->genero_wjbt</option>
        
                                         ";
                                      }
                            ?>
                          </select>
                      </div>


                      <div class="form-group col-md-6">
                          <label for="Institucion"><b>Institucion Educativa de la cual procede</b></label>
                          <input type="text" name="institucion" class="form-control" id="Institucion" placeholder="Institucion Educativa" value="<?=$row5->insEducativaProcedente_wjbt?>" required>
                      </div>  

                      <div class="form-group col-md-6">
                          <label for="nacido"><b>Fecha de nacimiento</b></label>
                          <input type="date" name="fechaNacimiento" value="<?=$row5->fechaNacimiento_wjbt?>" class="form-control" id="nacido" placeholder="Institucion educativa" required>
                      </div>

                      <div class="form-group col-md-6">
                          <label for="nombre"><strong>Estado Civil</strong></label>  
                          <select name="estadoCivil" class="form-control">
                          <option value="<?=$row5->estadoCivil_wjbt?>"><?=$row5->estadoCivil_wjbt?></option>
                  
                            <?php 
                            $rows2 = $stm2->fetchAll(PDO::FETCH_OBJ);

                                      foreach ($rows2 as $row2) {
                                         $row2->id_wjbt;
                                         $row2->estadoCivil_wjbt;  
                                         echo "
                                            <option value='$row2->estadoCivil_wjbt'>$row2->estadoCivil_wjbt</option>
        
                                         ";
                                      }
                            ?>
                          </select>
                      </div> 

                      <div class="form-group col-md-6">
                          <label for="termino"><b>Fecha en la que que termino el colegio</b></label>
                          <input type="date" name="fechaCulminacion" value="<?=$row5->fechaCulminacion_wjbt?>" class="form-control" id="termino" placeholder="Institucion educativa" required>
                      </div>

                      <div class="form-group col-md-6">
                          <label for="educativa"><b>Nivel academico de los padres</b></label>
                          <select name="nivelPadres" class="form-control">
                          <option value="<?=$row5->nivel_wjbt?>"><?=$row5->nivel_wjbt?></option>
                            <?php 
                            $rows3 = $stm3->fetchAll(PDO::FETCH_OBJ);

                                      foreach ($rows3 as $row3) {
                                         $row3->id_wjbt;
                                         $row3->nivel_wjbt;  
                                         echo "
                                            <option value='$row3->nivel_wjbt'>$row3->nivel_wjbt</option>
        
                                         ";
                                      }
                            ?>
                          </select>
                      </div>  

                      <div class="form-group col-md-6">
                          <label for="trabajoPadre"><b>Trabajo del padre</b></label>
                          <input type="text" name="trabajoPadre" value="<?=$row5->trabajoPadre_wjbt?>" class="form-control" id="trabajoPadre" placeholder="Trabajo del padre..." autofocus required>
                      </div>  

                      <div class="form-group col-md-6">
                          <label for="trabajoMadre"><b>Trabajo de la madre</b></label>
                          <input type="text" name="trabajoMadre" value="<?=$row5->trabajoMadre_wjbt?>" class="form-control" id="trabajoMadre" placeholder="Trabajo de la madre..." autofocus required>
                      </div> 

                      <div class="form-group col-md-6">
                          <label for="educativa"><b>Tipo de vivienda</b></label>
                          <select name="tipoVivienda" class="form-control">
                          <option value="<?=$row5->tipo_wjbt?>"><?=$row5->tipo_wjbt?></option>
                            <?php 
                            $rows4 = $stm4->fetchAll(PDO::FETCH_OBJ);

                                      foreach ($rows4 as $row4) {
                                         $row4->id_wjbt;
                                         $row4->tipo_wjbt;  
                                         echo "
                                            <option value='$row4->tipo_wjbt'>$row4->tipo_wjbt</option>
        
                                         ";
                                      }
                            ?>
                          </select>
                      </div>  

                      <div class="form-group col-md-6">
                          <label for="ingreso"><strong>Nivel de ingreso del hogar</strong></label>  
                          <select name="ingreso" class="form-control">
                          <option  value="<?=$row5->ingreso_wjbt?>"><?=$row5->ingreso_wjbt?></option>
                            <?php 
                            $rows6 = $stm6->fetchAll(PDO::FETCH_OBJ);

                                      foreach ($rows6 as $row6) {
                                         $row6->id_wjbt;
                                         $row6->ingreso_wjbt;  
                                         echo "
                                            <option value='$row6->ingreso_wjbt'>$row6->ingreso_wjbt</option>
        
                                         ";
                                      }
                            ?>
                          </select>
                      </div>

                      <div class="form-group col-md-6">
                          <label for="nivelPrograma"><b>Como califica el nivel de la educación del programa matriculado</b></label>
                          <input type="number" name="nivelPrograma" value="<?=$row5->nivelPrograma_wjbt?>" class="form-control" id="nivelPrograma" placeholder="Califique del 1 al 10 su programa matriculado..." min="1" max="10" required>
                      </div>

                      <div class="form-group col-md-6" style="margin-top: 24px;">
                          <label for="asignaturas"><b>Cuantas asignaturas tiene matriculadas</b></label>
                          <input type="number" name="asignaturas" value="<?=$row5->asignaturasMatriculadas_wjbt?>" class="form-control" id="asignaturas" placeholder="Asignaturas matriculadas..."  max="15" required>
                      </div>              
                      
                  </div>
          
      </div>  
      <!-- Modal Footer -->
      <div class="modal-footer">
           <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cerrar</button>
           <button type="submit" class="btn btn-outline-primary submitBtn" onclick="submitContactForm()">Actualizar</button>
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
}else {
  
  header('location:wjbt_login.php');
}


?>
