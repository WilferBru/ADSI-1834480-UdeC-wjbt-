<?php
session_start();
if (isset($_SESSION['admin'])) { header('location:wjbt_admin.php'); }?>


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

  <title>Administrador</title>

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

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
         <div style="background-color: ;" class="text-white">
            <img class="d-none d-lg-block" src="img/user-2935373_1280.png" width="465" height="680">
         </div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <img class="col-lg-9" src="img/logotipo-lineal-oficial-unicartagena.png"><br><br>
                <h1 class="h4 text-gray-900 mb-4">Bienvenido inicie sesión</h1>
              </div>
              <?php 
                      if ($msg != null) { ?>
                        <div class="alert alert-danger container" role="alert">
                          <?='Su correo o contraseña son incorrectas por favor verifique informacion.'?>
                        </div><?php
                      }
              ?>
              <form class="user" action="wjbt_validarAdmin.php" method="post">
                <div class="form-group row">
                  <div class="col-sm-12 mb-3 mb-sm-0">
                    <input type="text" name="usuario" class="form-control form-control-user" id="exampleFirstName" placeholder="Ingrese usuario..." required >
                  </div>
                  <!--<div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Last Name">
                  </div>-->
                </div>
                <!--<div class="form-group">
                  <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address">
                </div>-->
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" name="passwordOne" class="form-control form-control-user" id="exampleInputPassword"  placeholder="Ingrese contraseña" required >
                  </div>
                  <div class="col-sm-6">
                    <input type="password" name="passwordTwo" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repita la contraseña" required >
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Iniciar Sesión
                </button>
                <!--<hr>
                <a href="index.html" class="btn btn-google btn-user btn-block">
                  <i class="fab fa-google fa-fw"></i> Register with Google
                </a>
                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                  <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                </a>-->
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="wjbt_olvidarContrasena.php">¿Se te olvidó tu contraseña?</a>
              </div>
              <div class="text-center">
                <a class="small" href="wjbt_login.php">Entrar como estudiante</a>
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
