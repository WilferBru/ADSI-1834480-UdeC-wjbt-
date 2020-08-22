<?php
session_start();
if (isset($_SESSION['udec'])) { ?>

<?php 
  include_once('wjbt_contenidoIndex.php');
?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Pagina En Reparacion</h1>
          <p>Esta pagina no esta disponible en estos momentos, por favor intente mas tarde.</p><br>
          <center><img src="img/tools-312334_1280.png" width="300" height="300"></center>
        </div>
        <!-- /.container-fluid -->

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