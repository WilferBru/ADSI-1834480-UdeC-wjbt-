<?php
session_start();
if (isset($_SESSION['admin'])) { ?>


<?php  
  include_once('wjbt_conexion.php');
?>
<?php 
        try {

            //consultas para saber cuantos estudiantes pertenecen a cada zona.
            $sql2 = "SELECT * FROM encuesta_wjbt WHERE id_zona_wjbt = ?";
            $stm2 = $conn->prepare($sql2);
            $stm2->execute(array(1));

            $sql3 = "SELECT * FROM encuesta_wjbt WHERE id_zona_wjbt = ?";
            $stm3 = $conn->prepare($sql3);
            $stm3->execute(array(2));
            
            $sql4 = "SELECT * FROM encuesta_wjbt WHERE id_zona_wjbt = ?";
            $stm4 = $conn->prepare($sql4);
            $stm4->execute(array(3));

            //consultas para saber cuantos estudiantes pertenecen a tipo de genero.
            $sql5 = "SELECT * FROM encuesta_wjbt WHERE id_genero_wjbt = ?";
            $stm5 = $conn->prepare($sql5);
            $stm5->execute(array(1));

            $sql6 = "SELECT * FROM encuesta_wjbt WHERE id_genero_wjbt = ?";
            $stm6 = $conn->prepare($sql6);
            $stm6->execute(array(2));

            $sql7 = "SELECT * FROM encuesta_wjbt WHERE id_genero_wjbt = ?";
            $stm7 = $conn->prepare($sql7);
            $stm7->execute(array(3));

            $sql8 = "SELECT * FROM encuesta_wjbt WHERE id_genero_wjbt = ?";
            $stm8 = $conn->prepare($sql8);
            $stm8->execute(array(4));

            $sql9 = "SELECT * FROM encuesta_wjbt WHERE id_genero_wjbt = ?";
            $stm9 = $conn->prepare($sql9);
            $stm9->execute(array(5));

            $sql10 = "SELECT * FROM encuesta_wjbt WHERE id_genero_wjbt = ?";
            $stm10 = $conn->prepare($sql10);
            $stm10->execute(array(6));

            $sql11 = "SELECT * FROM encuesta_wjbt WHERE id_genero_wjbt = ?";
            $stm11 = $conn->prepare($sql11);
            $stm11->execute(array(7));

            //consultas para saber cuantos padres tuvieron tipo de estudio.
            $sql12 = "SELECT * FROM encuesta_wjbt WHERE id_nivelacademicopadres_wjbt = ?";
            $stm12 = $conn->prepare($sql12);
            $stm12->execute(array(1));

            $sql13 = "SELECT * FROM encuesta_wjbt WHERE id_nivelacademicopadres_wjbt = ?";
            $stm13 = $conn->prepare($sql13);
            $stm13->execute(array(2));

            $sql14 = "SELECT * FROM encuesta_wjbt WHERE id_nivelacademicopadres_wjbt = ?";
            $stm14 = $conn->prepare($sql14);
            $stm14->execute(array(3));

            $sql15 = "SELECT * FROM encuesta_wjbt WHERE id_nivelacademicopadres_wjbt = ?";
            $stm15 = $conn->prepare($sql15);
            $stm15->execute(array(4));

            $sql16 = "SELECT * FROM encuesta_wjbt WHERE id_nivelacademicopadres_wjbt = ?";
            $stm16 = $conn->prepare($sql16);
            $stm16->execute(array(5));

            $sql17 = "SELECT * FROM encuesta_wjbt WHERE id_nivelacademicopadres_wjbt = ?";
            $stm17 = $conn->prepare($sql17);
            $stm17->execute(array(6));


       } catch (Exception $e) {
        echo 'Connected fallida: '.$e->getMessage();
       }
?>


<?php  
  include_once('wjbt_contenido.php');
?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Graficas</h1>
          <p class="mb-4"><?=$_SESSION['nombre_wjbt']?> Estas son las graficas de la encuesta de los estudiantes.</p>

          <!-- Content Row -->
          <div class="row">

            <div class="col-xl-8 col-lg-7">

              <!-- Grafica genero -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Genero</h6>
                </div>
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                  </div>
                  <hr>
                  Podra visualizar cuantos estudiantes pertenecen a cada tipo de genero.
                </div>
              </div>

              <!-- Grafica localidaes -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Localidades</h6>
                </div>
                <div class="card-body">
                  <div class="chart-bar">
                    <canvas id="myBarChart"></canvas>
                  </div>
                  <hr>
                   Podra visualizar cuantos estudiantes hay en cada localidad.
                </div>
              </div>


            </div>

            <!-- Grafica nivel academico padres -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Nivel Academico De Los Padres</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4">
                    <canvas id="myPieChart"></canvas>
                  </div>
                  <hr>
                    Podra visualizar el nivel academico de los padres.
                </div>
              </div>
            </div>

          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Graficas de localidades -->
  <script type="text/javascript">
    
    // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}

// Bar Chart Example
var ctx = document.getElementById("myBarChart");
var myBarChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: [

      <?php 
        try {

            $sql = "SELECT * FROM zona_wjbt";
            $stm = $conn->prepare($sql);
            $stm->execute();
    
          $rows = $stm->fetchAll(PDO::FETCH_OBJ);
            foreach ($rows as $row) {
              $row->id_wjbt;
              $row->zona_wjbt; 
              echo " '$row->zona_wjbt', ";
            }

       } catch (Exception $e) {
        echo 'Connected fallida: '.$e->getMessage();
       }

      ?>

    ],

    datasets: [{
      label: "Tiene",
      backgroundColor: "#4e73df",
      hoverBackgroundColor: "#2e59d9",
      borderColor: "#4e73df",
      data:[<?=$stm2->rowCount()?>,<?=$stm3->rowCount()?>,<?=$stm4->rowCount()?>],
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 6
        },
        maxBarThickness: 25,
      }],
      yAxes: [{
        ticks: {
          min: 0,
          
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return + (value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': ' + number_format(tooltipItem.yLabel) + ' estudiantes';
        }
      }
    },
  }
});


  </script>

  <!-- Grafica de generos -->
  <script type="text/javascript">
    
    // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}

// Area Chart Example
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: [

      <?php 
        try {

            $sql0 = "SELECT * FROM genero_wjbt";
            $stm0 = $conn->prepare($sql0);
            $stm0->execute();
    
          $rows0 = $stm0->fetchAll(PDO::FETCH_OBJ);
            foreach ($rows0 as $row0) {
              $row0->id_wjbt;
              $row0->genero_wjbt; 
              echo " '$row0->genero_wjbt', ";
            }

       } catch (Exception $e) {
        echo 'Connected fallida: '.$e->getMessage();
       }

      ?>

    ],
    datasets: [{
      label: "Tiene",
      lineTension: 0.3,
      backgroundColor: "rgba(78, 115, 223, 0.05)",
      borderColor: "rgba(78, 115, 223, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",
      pointBorderColor: "rgba(78, 115, 223, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: [<?=$stm5->rowCount()?>,<?=$stm6->rowCount()?>,<?=$stm7->rowCount()?>,<?=$stm8->rowCount()?>,<?=$stm9->rowCount()?>,<?=$stm10->rowCount()?>,<?=$stm11->rowCount()?>],
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return  + number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': ' + number_format(tooltipItem.yLabel) + ' estudiantes';
        }
      }
    }
  }
});


  </script>

  <!-- Grafica nivel academico padres -->

  <script type="text/javascript">
    
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: [

      <?php 
        try {

            $sql00 = "SELECT * FROM nivelacademicopadres_wjbt";
            $stm00 = $conn->prepare($sql00);
            $stm00->execute();
    
          $rows00 = $stm00->fetchAll(PDO::FETCH_OBJ);
            foreach ($rows00 as $row00) {
              $row00->id_wjbt;
              $row00->nivel_wjbt; 
              echo " '$row00->nivel_wjbt', ";
            }

       } catch (Exception $e) {
        echo 'Connected fallida: '.$e->getMessage();
       }

      ?>

    ],
    datasets: [{
      data: [<?=$stm12->rowCount()?>,<?=$stm13->rowCount()?>,<?=$stm14->rowCount()?>,<?=$stm15->rowCount()?>,<?=$stm16->rowCount()?>,<?=$stm17->rowCount()?>],
      backgroundColor: ['#2e59d9', '#17a673', '#F6F601','#a20100','#3b015a', '#B95EF6'],
      hoverBackgroundColor: ['#F303CA', '#F303CA', '#F303CA','#F303CA','#F303CA', '#F303CA'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});



  </script>

  

 


<!-- Page level custom scripts -->
  
  
  <!--
  <script src="js/demo/chart-pie-demo.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-bar-demo.js"></script>
  -->


<?php
  include_once('wjbt_footer.php');
?>

<?php
}else {
  
  header('location:wjbt_loginAdmin.php');
}


?>