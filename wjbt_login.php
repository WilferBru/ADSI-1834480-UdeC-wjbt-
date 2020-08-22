<?php
session_start();
if (isset($_SESSION['admin'])) { header('location:wjbt_admin.php'); }?>


<?php
if (isset($_SESSION['udec'])) { header('location:wjbt_index.php'); }?>


<?php 
 $msg = null;
 if (isset($_GET['err'])) {
   $msg = $_GET['err'];
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

  <title>Iniciar sesión</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="css/css.css" rel="stylesheet">
  <!--font-awesome core CSS-->
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
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

<body class="bg-gradient-light">

  <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">
        <br>
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div style="background-color: ;" class="text-white">
                <img class="d-none d-lg-block" src="img/user-2160923_1280.png" width="465" height="677">
              </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <img class="col-lg-12" src="img/logotipo-lineal-oficial-unicartagena.png"  height="150" ><br><br>
                    
                    <h1 class="h4 text-gray-900 mb-4">Bienvenidos</h1>
                  </div>
                  <?php 
                      if ($msg != null) { ?>
                        <div class="container text-danger" role="alert">
                          <?='Su correo o contraseña son incorrectas por favor verifique informacion.'?>
                        </div><br><?php
                      }
                  ?>
                  <form class="user" action="wjbt_validar.php" method="post">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" name="users" placeholder="Ingrese su usuario..." required>
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Contraseña" required>
                    </div>
                    <!--<div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>-->
                    <button class="btn btn-primary btn-user btn-block">
                      Iniciar Sesión
                    </button>
                    <!--<hr>
                    <a href="index.html" class="btn btn-google btn-user btn-block">
                      <i class="fab fa-google fa-fw"></i> Login with Google
                    </a>
                    <a href="index.html" class="btn btn-facebook btn-user btn-block">
                      <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                    </a>-->
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="wjbt_olvidarContrasena.php">¿Se te olvidó tu contraseña?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="wjbt_loginAdmin.php">Entrar como administrador</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
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
