
<?php 
 
 if ($_SESSION['id_genero_wjbt'] == 1) {
   $welcome = "Bienvenido";
 } else if ($_SESSION['id_genero_wjbt'] == 2) {
   $welcome = "Bienvenida";
 } else {
   $welcome = "Bienvenid@";
 }
?>

<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Univercidad de cartagena</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/fontawesome-free/css/font.css" rel="stylesheet">
  <link href="css/css.css" rel="stylesheet">
  <!--font-awesome core CSS-->
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <!-- Carrusel -->
  <link href="css/carousel.css" rel="stylesheet">
  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <!-- Favicons -->
  <link rel="apple-touch-icon" sizes="180x180" href="wjbt_favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="wjbt_favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="wjbt_favicon/favicon-16x16.png">
  <link rel="manifest" href="wjbt_favicon/site.webmanifest">
  <link rel="shortcut icon" href="wjbt_favicon/favicon.ico">
  <meta name="msapplication-TileColor" content="#e3e8ee">
  <meta name="msapplication-config" content="wjbt_favicon/browserconfig.xml">
  <meta name="theme-color" content="#ffffff">
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="wjbt_admin.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fa fa-lock"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Administrador <?=$_SESSION['nombre_wjbt']?></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="wjbt_admin.php">
          <i class="fa fa-home" aria-hidden="true"></i>
          <span>Inicio</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <li class="nav-item">
        <a class="nav-link" href="wjbt_tablaEncuesta.php">
          <i class="fas fa-poll text-white"></i>
          <span class="text-white">Encuesta</span></a>
      </li>

      <!-- 
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Components</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Components:</h6>
            <a class="collapse-item" href="buttons.html">Buttons</a>
            <a class="collapse-item" href="cards.html">Cards</a>
          </div>
        </div>
      </li>
      -->
      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fa fa-id-card text-white" aria-hidden="true"></i>
          <span class="text-white">Tablas</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">TODAS LAS TABLAS :</h6>
            <a class="collapse-item" href="blankAdmin.php"><i class="fas fa-user-graduate"></i> Estudiante</a>
            <a class="collapse-item" href="wjbt_usuarios.php"><i class="fas fa-user"></i> Sesión Usuarios</a>
            <a class="collapse-item" href="wjbt_tablaGenero.php"><i class="fas fa-venus-mars"></i> Genero</a>
            <a class="collapse-item" href="wjbt_tablaEstadoCivil.php"><i class="fas fa-ring"></i> Estado Civil</a>
            <a class="collapse-item" href="wjbt_tablaNivelPadres.php"><i class="fas fa-graduation-cap"></i> Nivel Academico Padres</a>
            <a class="collapse-item" href="wjbt_tablaTipoVivienda.php"><i class="fas fa-home"></i> Tipo Vivienda</a>
            <a class="collapse-item" href="wjbt_tablaIngresoHogar.php"><i class="fas fa-hand-holding-usd"></i> Ingreso Del Hogar</a>
            <a class="collapse-item" href="wjbt_tablaLocalidad.php"><i class="fas fa-map-marker-alt"></i> Localidad</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Complementos
      </div>

      <!-- 
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Login Screens:</h6>
            <a class="collapse-item" href="login.html">Login</a>
            <a class="collapse-item" href="register.html">Register</a>
            <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other Pages:</h6>
            <a class="collapse-item" href="404.html">404 Page</a>
            <a class="collapse-item" href="blank.html">Blank Page</a>
          </div>
        </div>
      </li>
      -->
      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link text-white" href="charts.php">
          <i class="fas fa-chart-line text-white"></i>
          <span>Estadisticas 1</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-white" href="charts2.php">
          <i class="fas fa-chart-line text-white"></i>
          <span>Estadisticas 2</span></a>
      </li>

      <!-- Nav Item - Tables -->
      

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column" style="background-color: ;">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow" style="background-color: black; height: 110px;" >

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
             <a href="wjbt_admin.php"><img src="img/logo.png" width="200" height="100"></a>
              <!--<div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>-->
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Alerts -->
            <li class="nav-item no-arrow mx-1">
              <a class="nav-link" href="https://www.facebook.com/UniCartagenaCol" title="Siguenos en Facebook" target="_blank"  role="button">
                <i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i>
                <!-- Counter - Alerts -->
                <!--<span class="badge badge-danger badge-counter">3+</span>-->
              </a>
              <!-- Dropdown - Alerts -->
              <!--<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Alerts Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 12, 2019</div>
                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-donate text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 7, 2019</div>
                    $290.29 has been deposited into your account!
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 2, 2019</div>
                    Spending Alert: We've noticed unusually high spending for your account.
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
              </div>-->
            </li>

            <!-- Nav Item - Messages -->
            <li class="nav-item no-arrow mx-1 mr-2 d-none d-lg-inline">
              <a class="nav-link" href="https://twitter.com/uni_cartagena" target="_blank" title="Siguenos en Twitter">
                <i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i>
                <!-- Counter - Messages -->
                <!--<span class="badge badge-danger badge-counter">7</span>-->
              </a>
              <!-- Dropdown - Messages -->
              <!--<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Message Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
                    <div class="small text-gray-500">Emily Fowler · 58m</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60" alt="">
                    <div class="status-indicator"></div>
                  </div>
                  <div>
                    <div class="text-truncate">I have the photos that you ordered last month, how would you like them sent to you?</div>
                    <div class="small text-gray-500">Jae Chun · 1d</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60" alt="">
                    <div class="status-indicator bg-warning"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Last month's report looks great, I am very happy with the progress so far, keep up the good work!</div>
                    <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</div>
                    <div class="small text-gray-500">Chicken the Dog · 2w</div>
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
              </div>-->
            </li>

            <li class="nav-item no-arrow mx-1">
              <a class="nav-link" href="http://instagram.com/unicartagena" target="_blank" title="Siguenos en Instagram">
                <i class="fa fa-instagram fa-2x" aria-hidden="true"></i>
              </a>
            </li>

             <li class="nav-item no-arrow mx-1 mr-2 d-none d-lg-inline">
                <a class="nav-link" href="https://co.pinterest.com/unicartagena/" target="_blank" title="Siguenos en Pinterest">
                  <i class="fa fa-pinterest fa-2x" aria-hidden="true"></i>
                </a>
             </li>

             <li class="nav-item no-arrow mx-1 mr-2 d-none d-lg-inline">
                <a class="nav-link" href="https://www.linkedin.com/school/unicartagena/" target="_blank" title="Siguenos en Linkedin">
                  <i class="fa fa-linkedin-square fa-2x" aria-hidden="true"></i>
                </a>
             </li>

             <li class="nav-item  no-arrow mx-1 mr-2 d-none d-lg-inline">
                <a class="nav-link" href="https://www.youtube.com/c/unicartagenaoficial" target="_blank" title="Siguenos en Youtube">
                  <i class="fa fa-youtube-square fa-2x" aria-hidden="true"></i>
                </a>
             </li>

             <li class="nav-item  no-arrow mx-1">
                <a class="nav-link" href="https://mail.google.com/a/unicartagena.edu.co" target="_blank" title="Ingreso al Correo Institucional">
                  <i class="fa fa-envelope fa-2x" aria-hidden="true"></i>
                </a>
             </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-warning small"><?=$_SESSION['nombre_wjbt']?></span>
                <div class="nav-item no-arrow mx-1"><i class="far fa-user-circle fa-2x"></i></div>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <!--<a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Perfil
                </a>-->
                <a class="dropdown-item" href="wjbt_configurarNameAdmin.php">
                  <i class="fas fa-user-cog"></i>
                  Configuración
                </a>
                <!--<a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>-->
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-door-open text-dark"></i>
                  Cerrar cesión
                </a>
              </div>
            </li>

          </ul>

        </nav>