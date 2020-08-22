<?php
session_start();
if (isset($_SESSION['admin'])) { ?>

<?php 
  include_once('wjbt_contenido.php');
?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?=$welcome?> <?=$_SESSION['nombre_wjbt']?></h1>
            <a href="wjbt_tablaEncuesta.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Ver Encuesta</a>
          </div>
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                          <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                          <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                          <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <img src="img/bandera-unicartagena.png" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                              <h3 style="color: #0101DF;">Pagina oficial</h3>
                              <a href="https://www.unicartagena.edu.co/" target="_blank">Visita nuesta pagina oficial aqui</a>
                            </div>
                          </div>
                          <div class="carousel-item">
                            <img src="img/brian-mcgowan--9_6ymUJvPU-unsplash.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                              <h3 style="color: #0101DF;">Informacion sobre el covid</h><br>
                              <a href="http://www.unicartagena.edu.co/covid-19" target="_blank">Click aqui</a>
                            </div>
                          </div>
                          <div class="carousel-item">
                            <img src="img/canales-atencion-al-ciudadano-editado.png" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                              <h5><a href="http://www.unicartagena.edu.co/inicio/atencion-al-ciudadano/canales-de-atencion" target="_blank">Click aqui</a></h5>
                              
                            </div>
                          </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a>
                      </div>
          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Esquema de Publicación Web</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="https://www.unicartagena.edu.co/inicio/transparencia-y-acceso-a-la-informacion/esquema-de-publicacion-web" target="_blank">Informacion</a></div>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-globe fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Presupuesto</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="https://www.unicartagena.edu.co/inicio/transparencia-y-acceso-a-la-informacion/presupuesto/presupuesto-general" target="_blank">Informacion</a></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Lineamientos y Procedimientos</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="https://www.unicartagena.edu.co/inicio/transparencia-y-acceso-a-la-informacion/lineamientos-y-procedimientos/siguc" target="_blank">Informacion</a></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Formulación Participativa</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="https://www.unicartagena.edu.co/inicio/transparencia-y-acceso-a-la-informacion/formulacion-participativa/rendicion-de-cuentas" target="_blank">Informacion</a></div>
                    </div>
                    <div class="col-auto">
                      <i class="fa fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
             <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Educacion Continua</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Servicios</div>
                      <a class="dropdown-item" href="https://www.unicartagena.edu.co/servicios/educacion-continua/diplomados" target="_blank">Diplomados</a>
                      <a class="dropdown-item" href="https://www.unicartagena.edu.co/servicios/educacion-continua/diplomados/congresos-simposios-y-seminarios" target="_blank">Congresos y Seminarios</a>
                      <!--<div class="dropdown-divider"></div>-->
                      <a class="dropdown-item" href="https://www.unicartagena.edu.co/servicios/educacion-continua/diplomados/cursos-y-talleres" target="_blank">Cursos y Talleres</a>
                      <a class="dropdown-item" href="http://eventos.unicartagena.edu.co/" target="_blank">Eventos</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"  src="img/educacion.PNG" >
                    <p>El mundo esta en pasusa, asi como las clases pero en la Univercidad de cartagena seguimos brindando nuestros servicios educativos</p> 
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="https://www.unicartagena.edu.co/servicios/educacion-continua" target="_blank">Informacion</a></div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Sapiens Research</h6>
                </div>
                <!-- Card Body -->
                <br>
                <center ><img style="background-color: blue;" src="img/logosa.png"></center><br>
                <center><p>El Boletín Científico Sapiens Research es una revista semestral (enero-junio y julio-diciembre), que edita Sapiens Research Group y que inició en enero de 2010. Se presenta en dos versiones: electrónica y digital (a través del portal de revistas Issuu).</p></center>
                <a href="https://www.srg.com.co/universidad/unicartagena" target="_blank" style="margin-top: 100px;">Ver informacion oficial.</a>
              </div>
            </div>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-6 mb-4">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Prevencion Covid 19</h6>
                </div>
                <div class="card-body">
                  <center><img class="img-fluid px-3 px-sm-4 mt-3 mb-4" src="img/covid.png" width="500" height=""></center> <br> <br>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="http://www.unicartagena.edu.co/covid-19" target="_blank">Informacion</a></div>
                </div>
              </div>

              <!-- Color System -->
              <div class="row">
                <div class="col-lg-6 mb-4">
                  <div>
                    <div class="card-body">
                      <a href="http://oferta.senasofiaplus.edu.co/sofia-oferta/" target="_blank"><img class="img-fluid" src="img/sena-sofia-plus.png" ></a>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 mb-4">
                  <div>
                    <div class="card-body"><br>
                      <a href="https://portal.icetex.gov.co/Portal/" target="_blank"><img class="img-fluid" src="img/icetex.png"></a>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 mb-4">
                  <div>
                    <div class="card-body"><br>
                      <a href="https://www.telecaribe.co/" target="_blank"><img class="img-fluid" src="img/logo-telecaribe.png" width="150"></a>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 mb-4">
                  <div>
                    <div class="card-body"><br>
                      <a href="https://snies.mineducacion.gov.co/portal/" target="_blank"><img class="img-fluid" src="img/snies.png" ></a>
                    </div>
                  </div>
                </div>
                
              </div>

            </div>

            <div class="col-lg-6 mb-4">

              <!-- Illustrations -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">UNIVERCIDAD DE CARTAGENA</h6>
                </div>
                <div class="card-body">
                  <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="img/bandera-unicartagena.png" width="500" height="300" alt="">
                  </div><br>
                  <p>Visita nuestra pagian ofical para que conoscas mas sobre la Univercidad de Cartagena</p>
                  <a target="_blank" rel="nofollow" href="https://www.unicartagena.edu.co/">Pagina oficial &rarr;</a>
                </div>
              </div>

              <!-- Approach -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Historia de la universidad</h6>
                </div>
                <div class="card-body">
                  <p>La Universidad de Cartagena ha sido el espacio de formación de los jóvenes del Caribe colombiano desde el siglo XIX. Su historia e importancia se expresan desde los albores de la independencia y en el sueño de los libertadores Simón Bolívar y Francisco de Paula Santander, organizadores del novel Estado colombiano. Ellos visionaron la educación como el medio ideal para la formación de las nuevas generaciones que conducirían los destinos de la República.</p>
                  <p class="mb-0"><a href="http://www.unicartagena.edu.co/universidad/historia" target="_blank">Seguir leyendo</a></p>
                </div>
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

