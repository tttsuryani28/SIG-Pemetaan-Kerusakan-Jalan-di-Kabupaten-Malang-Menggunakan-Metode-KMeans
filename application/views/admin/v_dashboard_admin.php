
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard Admin</h1>
</div>
<!-- METODE KMEANS -->
<?php include_once APPPATH.'views/metode.php'; ?>

<!-- <div class="container"> -->

  <!-- chart -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
  

  <div class="row">
    <div class="col">
      <div class="row">
        <div class="col">
          <!-- cluster1 -->
          <div class="col mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                    Cluster 1</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo(count($hasilSekarang['C1']));?> data</div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-info-circle fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- cluster2 -->
          <div class="col mb-4">
            <div class="card border-left-success shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                    Cluster 2</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo(count($hasilSekarang['C2']));?> data</div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-info-circle fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- cluster3 -->
          <div class="col mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Cluster 3
                    </div>
                    <div class="row no-gutters align-items-center">
                      <div class="col-auto">
                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo(count($hasilSekarang['C3']));?> data</div>
                      </div>
                    </div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-info-circle fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- total -->
          <div class="col mb-4">
            <div class="card border-left-info shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                    Jumlah Data</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo($total_rows);?> data</div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-table fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="col mb-8">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Grafik Clustering</h6>
          </div>
          <div class="card-body">
            <div class="mt-3"></div>
            <div class="chart-bar">
              <canvas id="mychart" width="600px" height="360px">
                <script>
                  var ctx = document.getElementById('mychart').getContext('2d');
                  var mychart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                      labels: ['Ringan', 'Sedang', 'Berat'],
                      datasets: [{  
                        data: [<?php echo(count($hasilSekarang['C1']));?>, <?php echo(count($hasilSekarang['C2']));?>, <?php echo(count($hasilSekarang['C3']));?>],
                        backgroundColor: [
                        'rgb(255, 165, 0)',
                        'rgb(60, 179, 113)',
                        'rgb(255, 0, 0)'
                        ],
                        borderColor: [
                        'rgb(255, 165, 0)',
                        'rgb(60, 179, 113)',
                        'rgb(255, 0, 0)'
                        ],
                        borderWidth: 1
                      }]
                    },
                    options: {
                      scales: {
                        yAxes: [{
                          ticks: {
                            beginAtZero: true
                          }
                        }]
                      },
                      legend: {
                        display: false
                      },
                      tooltips: {
                        callbacks: {
                         label: function(tooltipItem) {
                          return tooltipItem.yLabel;
                        }
                      }
                    }
                  }
                });
              </script>
            </canvas>
          </div>
          <div class="mt-5"></div>

        </div>
      </div>
    </div>
  </div>
</div>



