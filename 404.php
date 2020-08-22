<?php 

  $fechaActual = date('Y');

?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Univercidad de cartagena</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

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

<body id="page-top" style="background-color: #125d7d;">

<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3  ">
  <h5 class="my-0 mr-md-auto font-weight-normal"><a href="wjbt_login.php"><img src="img/logo.png" width="200" height="100"></a></h5>
  <nav class="my-2 my-md-0 mr-md-3">
    <!--<a class="p-2 text-white" href="">Inicio</a>
    <a class="p-2 text-white" href="wjbt_admin.php">Administrador</a>
    <a class="p-2 text-white" href="#">Support</a>
    <a class="p-2 text-white" href="#">Pricing</a>-->
  </nav>
  <a class="btn btn-outline-success" href="wjbt_login.php">Inicio</a>
</div>
        <!-- Begin Page Content -->
        <div class="container-fluid">


          <!-- 404 Error Text -->
          <div class="text-center" style="margin-top: 10px;">
            <div class="error mx-auto text-white" data-text="404">404</div>
            <p class="lead mb-5 text-white">Pagina no encontrada</p>
            <p class=" mb-0 text-white">Lo Sentimos la ubicacion que buscas no existe :( ...</p><br>
            <a href="wjbt_index.php" class="text-warning">&larr; Regresar a pagina de inicio</a>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer" style="margin-top: 20px;">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span class="text-white"> &copy; Univercidad de Cartagena <?=$fechaActual?></span>
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
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
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

</body>

</html>
