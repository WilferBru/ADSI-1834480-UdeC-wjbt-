<?php
session_start();
if (isset($_SESSION['udec'])) { ?>


<?php 
  include_once('wjbt_contenidoIndex.php');
 ?>
 
 <?php 
 $ma = null;
 if (isset($_GET['err'])) {
   $ma = $_GET['err'];
 }
?>

<?php 
 $msg = null;
 if (isset($_GET['ar'])) {
   $msg = $_GET['ar'];
 }
?>
 
</div>
<script type="text/javascript">
function mostrarPassword(){
    var cambio = document.getElementById("txtPassword");
    if(cambio.type == "password"){
      cambio.type = "text";
      $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
    }else{
      cambio.type = "password";
      $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
    }
  } 
  
  $(document).ready(function () {
  //CheckBox mostrar contraseña
  $('#ShowPassword').click(function () {
    $('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
  });
});
</script>

<script type="text/javascript">
    function Confirmdelete(){
      var respuesta = confirm('<?=$_SESSION['nombre_wjbt']?> Si ingresaste los datos correctamente Tendras que volver a iniciar sesion, sino volveras a Ingresar los datos de nuevo.');
      if (respuesta == true){
          return true;
      }else{
        return false;
      }
    }
</script>  

  <div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
               
            <a class="nav-link active text-danger" href="#">
              <span data-feather="home"></span>
             <h5 clas=""><i class="fa fa-cog fa-spin text-success" aria-hidden="true"></i> General </h5><span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="wjbt_configurarName.php">
              <span data-feather="file"></span>
              <i class="fa fa-user-o" aria-hidden="true"></i> Nombre
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="wjbt_configurarPassword.php">
              <span data-feather="shopping-cart"></span>
              <i class="fa fa-lock" aria-hidden="true"></i> Contraseña
            </a>
          </li>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span><i class="fa fa-wrench" aria-hidden="true"></i> Modificar Registros Secundarios</span>
          <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="wjbt_configurarSex.php">
              <span data-feather="file-text"></span>
              <i class="fa fa-venus-mars" aria-hidden="true"></i> Genero
            </a>
          </li>
          
        </ul>
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2 text-primary"><i class="fa fa-user-o" aria-hidden="true"></i> Modificar Cuenta</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="nav-item dropdown">
            <a class="nav-link dropdown-toggle btn btn-secondary" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog fa-spin" aria-hidden="true"></i> Cambiar</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="wjbt_configurarName.php">Nombre</a>
              <a class="dropdown-item" href="wjbt_configurarPassword.php">Contraseña</a>
              <a class="dropdown-item" href="wjbt_configurarSex.php">Genero</a>
             </div> 
          </div>
          
        </div>
      </div>

     
      <div class="form-group col-md-9">
      <h2>Cambiar Contraseña</h2>
      </div>
      <div class="form-responsive">
        <form action="wjbt_cambioPassword.php" method="post">
        <input type="hidden" name="id" value ="<?=$_SESSION['id_wjbt']?>">
        
        <?php 
            if ($msg != null) { ?>
              <div class="alert alert-dark text-danger container" role="alert">
                <?='Las nuevas contraseñas no coinciden por favor verifique'?>
              </div><?php
            }
          ?> 
        <div class="row" style="margin-top: 15px;">
            
        <div class="form-group col-md-12">
        <?php 
            if ($ma != null) { ?>
              <div class="container text-danger">
                <?='Su contraseña antigua no es correcta'?>
              </div><?php
            }
          ?>    
        <div class="form-group col-md-7">
          <input type="password" name="passwordOld" class="form-control" placeholder="Contraseña Antigua" required="">
        </div>
        </div>
        
        <div class="form-group col-md-12">
        <div class="form-group col-md-7">
          <input type="password" name="passwordNew1" class="form-control" placeholder="Contraseña Nueva" required="">
        </div>
        </div>
        
        <div class="form-group col-md-12">
        <div class="input-group col-md-7" >
          <input type="password" name="passwordNew2" ID="txtPassword"  class="form-control" placeholder="Repita la Contraseña Nueva" required=""><a id="show_password" class="btn btn-primary text-white form-group"  onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </a>
        </div>
        </div>
        
       <div class="form-group col-md-12">
       <div class="form-group col-md-4">
         <button type="submit" class="btn btn-dark form-control" onclick="return Confirmdelete()" style="margin-top: 10px;">Cambiar</button>
       </div>
       </div>
      
      </form>
      </div>
    </main>
  </div>
</div>
   <div class="container-lg">  
<?php 
  include_once('wjbt_footerIndex.php');
 ?>
<?php
}else {
  header('location:wjbt_login.php');
}


?>


