<?php
session_start();
if (isset($_SESSION['admin'])) { ?>


<?php  
  include_once('wjbt_conexion.php');
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

              <!-- Grafica ingreso hogar -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Ingreso Del Hogar</h6>
                </div>
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="Ingreso"></canvas>
                  </div>
                  <hr>
                  Podra visualizar el ingreso del hogar de los estudiantes.
                </div>
              </div>

              <!-- Grafica localidaes -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Tipo de vivienda</h6>
                </div>
                <div class="card-body">
                  <div class="chart-bar">
                    <canvas id="myBarChart"></canvas>
                  </div>
                  <hr>
                   Podra visualizar el tipo de vivivneda de elos estudiantes.
                </div>
              </div>


            </div>

            <!-- Grafica nivel academico padres -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Estado Civil</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4">
                    <canvas id="myPieChart"></canvas>
                  </div>
                  <hr>
                    Podra visualizar el estado civil de los estudiantes.
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

  <!-- Graficas ingreso del hogar -->
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
var ctx = document.getElementById("Ingreso");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: [ <?php 

            $sql = "SELECT ingresohogar_wjbt.ingreso_wjbt, COUNT(*) AS Cantidad FROM encuesta_wjbt INNER JOIN ingresohogar_wjbt ON encuesta_wjbt.id_ingresoHogar_wjbt = ingresohogar_wjbt.id_wjbt GROUP BY encuesta_wjbt.id_ingresoHogar_wjbt";
            $stm = $conn->prepare($sql);
            $stm->execute();

            $rows = $stm->fetchAll(PDO::FETCH_OBJ);
            foreach ($rows as $row) {
              $row->ingreso_wjbt;
              $row->Cantidad; 
              echo "'$row->ingreso_wjbt',";
            }
    ?>],
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
      data: [ <?php 

            $sql = "SELECT ingresohogar_wjbt.ingreso_wjbt, COUNT(*) AS Cantidad FROM encuesta_wjbt INNER JOIN ingresohogar_wjbt ON encuesta_wjbt.id_ingresoHogar_wjbt = ingresohogar_wjbt.id_wjbt GROUP BY encuesta_wjbt.id_ingresoHogar_wjbt";
            $stm = $conn->prepare($sql);
            $stm->execute();

            $rows = $stm->fetchAll(PDO::FETCH_OBJ);
            foreach ($rows as $row) {
              $row->ingreso_wjbt;
              $row->Cantidad; 
              echo "'$row->Cantidad',";
            }
    ?>],
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
            return + number_format(value);
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

  <!-- Graficas tipo vivienda -->
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
    labels: [ <?php 

            $sql20 = "SELECT tipovivienda_wjbt.tipo_wjbt, COUNT(*) AS Cantidad FROM encuesta_wjbt INNER JOIN tipovivienda_wjbt ON encuesta_wjbt.id_tipoVivienda_wjbt = tipovivienda_wjbt.id_wjbt GROUP BY encuesta_wjbt.id_tipoVivienda_wjbt";
            $stm20 = $conn->prepare($sql20);
            $stm20->execute();

            $rows20 = $stm20->fetchAll(PDO::FETCH_OBJ);
            foreach ($rows20 as $row20) {
              $row20->tipo_wjbt;
              $row20->Cantidad; 
              echo "'$row20->tipo_wjbt',";
            }
    ?>],

    datasets: [{
      label: "Tiene",
      backgroundColor: "#4e73df",
      hoverBackgroundColor: "#2e59d9",
      borderColor: "#4e73df",
      data:[ <?php 

            $sql20 = "SELECT tipovivienda_wjbt.tipo_wjbt, COUNT(*) AS Cantidad FROM encuesta_wjbt INNER JOIN tipovivienda_wjbt ON encuesta_wjbt.id_tipoVivienda_wjbt = tipovivienda_wjbt.id_wjbt GROUP BY encuesta_wjbt.id_tipoVivienda_wjbt";
            $stm20 = $conn->prepare($sql20);
            $stm20->execute();

            $rows20 = $stm20->fetchAll(PDO::FETCH_OBJ);
            foreach ($rows20 as $row20) {
              $row20->tipo_wjbt;
              $row20->Cantidad; 
              echo "'$row20->Cantidad',";
            }
    ?>],
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

  <!-- Grafica estado civil -->

  <script type="text/javascript">
    
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: [ <?php 

            $sql2 = "SELECT estadocivil_wjbt.estadoCivil_wjbt, COUNT(*) AS Cantidad FROM encuesta_wjbt INNER JOIN estadocivil_wjbt ON encuesta_wjbt.id_estadoCivil_wjbt = estadocivil_wjbt.id_wjbt GROUP BY encuesta_wjbt.id_estadoCivil_wjbt";
            $stm2 = $conn->prepare($sql2);
            $stm2->execute();

            $rows2 = $stm2->fetchAll(PDO::FETCH_OBJ);
            foreach ($rows2 as $row2) {
              $row2->estadoCivil_wjbt;
              $row2->Cantidad; 
              echo "'$row2->estadoCivil_wjbt',";
            }
    ?>],
    datasets: [{
      data: [ <?php 

            $sql2 = "SELECT estadocivil_wjbt.estadoCivil_wjbt, COUNT(*) AS Cantidad FROM encuesta_wjbt INNER JOIN estadocivil_wjbt ON encuesta_wjbt.id_estadoCivil_wjbt = estadocivil_wjbt.id_wjbt GROUP BY encuesta_wjbt.id_estadoCivil_wjbt";
            $stm2 = $conn->prepare($sql2);
            $stm2->execute();

            $rows2 = $stm2->fetchAll(PDO::FETCH_OBJ);
            foreach ($rows2 as $row2) {
              $row2->estadoCivil_wjbt;
              $row2->Cantidad; 
              echo "'$row2->Cantidad',";
            }
    ?>],
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