<?php
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/registracion/head/header_d.php");
      require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
     $ruta="/proyecto/view/registracion/expediente/";
     $ruta_pase="/proyecto/view/registracion/adrg_expediente_i0/";
     $ruta_borrador="/proyecto/view/registracion/adrg_borrador_h/";
     $prueba = new db();
     $sql= "SELECT sectorid  from sema_usuario_i1 where baja = 0 and personaid = ". $_SESSION['usuarioid']." LIMIT 1";
     $_sector_row= $prueba->fcGetSQL($sql,1,2);
     $_sectorid = $_sector_row['sectorid'];
     $sql_sector_descripcion = "SELECT * FROM v_expedientes_sector ";
     $vista = $prueba->fcGetSQL($sql_sector_descripcion,1,0);

?>
<section id="expedientes" class="about">
  
<div class="container" data-aos="fade-up">
<div class="section-title">
          <h2>Estadísticas de Expedientes</h2>
          <p>Visualización de los Expedientes.</p>
        </div>
<div class="table-responsive">
<div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>150</h3>

                <p>Exepedientes cerrados</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Expedientes abiertos</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                 Cantidad de expedientes.
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Gráfico de Barras</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#sales-chart" data-toggle="tab">Gráfico de Tortas</a>
                    </li>
                  </ul>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
                  <div class="chart tab-pane active" id="revenue-chart"
                       style="position: relative; height: 300px;">
                      <canvas id="prueba" height="300" style="height: 300px;"></canvas>
                   </div>
                  <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                    <canvas id="prueba_1" height="300" style="height: 300px;"></canvas>
                  </div>
                </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">

            <!-- Map card -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                 Seguimos con expedientes.
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <a class="nav-link active" href="#revenue-chart_1" data-toggle="tab">Anillos</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#sales-chart_1" data-toggle="tab">Otros</a>
                    </li>
                  </ul>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
                  <div class="chart tab-pane active" id="revenue-chart_1"
                       style="position: relative; height: 300px;">
                      <canvas id="prueba_2" height="300" style="height: 300px;"></canvas>
                   </div>
                  <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                    <canvas id="prueba_3" height="300" style="height: 300px;"></canvas>
                  </div>
                </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- solid sales graph -->
      
            <!-- /.card -->

       
            
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
</div>
</div>
<script>
        const ctx = document.getElementById('prueba').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    <?php
                    $cadena = "";
                    foreach ($vista as $row){
                        $cadena.= "'" . $row['sector'] . "',";
                    }
                    $cadena = substr($cadena, 0, -1);
                    echo($cadena);
                    ?>    
                ],
                datasets: [{
                    label: 'Cantidad de expedientes',
                    data: [
                        <?php
                       $cadena = "";
                       foreach ($vista as $row){
                           $cadena.= "'" . $row['cantidad'] . "',";
                       }
                       $cadena = substr($cadena, 0, -1);
                       echo($cadena);
                       ?> 
                    ],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top'
                        },
                        tooltip: {
                            enabled: true
                        }
                    }
                }
        });

        

        const ctx_1 = document.getElementById('prueba_1').getContext('2d');
        const myChart_1 = new Chart(ctx_1, {
            type: 'pie',
            data: {
                labels: [
                    <?php
                    $cadena = "";
                    foreach ($vista as $row){
                        $cadena.= "'" . $row['sector'] . "',";
                    }
                    $cadena = substr($cadena, 0, -1);
                    echo($cadena);
                    ?>    
                ],
                datasets: [{
                    label: 'Cantidad de expedientes',
                    data: [
                        <?php
                       $cadena = "";
                       foreach ($vista as $row){
                           $cadena.= "'" . $row['cantidad'] . "',";
                       }
                       $cadena = substr($cadena, 0, -1);
                       echo($cadena);
                       ?> 
                    ],
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56','#1284ff'],
                    hoverBackgroundColor: ['#FF6384', '#36A2EB', '#FFCE56','#1284ff'],
                    borderWidth: 1
                }]
            },
            options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top'
                        },
                        tooltip: {
                            enabled: true
                        }
                    }
                }
        });


        
        const ctx_2 = document.getElementById('prueba_2').getContext('2d');
        const myChart_2 = new Chart(ctx_2, {
            type: 'doughnut',
            data: {
                labels: [
                    <?php
                    $cadena = "";
                    foreach ($vista as $row){
                        $cadena.= "'" . $row['sector'] . "',";
                    }
                    $cadena = substr($cadena, 0, -1);
                    echo($cadena);
                    ?>    
                ],
                datasets: [{
                    label: 'Cantidad de expedientes',
                    data: [
                        <?php
                       $cadena = "";
                       foreach ($vista as $row){
                           $cadena.= "'" . $row['cantidad'] . "',";
                       }
                       $cadena = substr($cadena, 0, -1);
                       echo($cadena);
                       ?> 
                    ],
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56','#1284ff'],
                    hoverBackgroundColor: ['#FF6384', '#36A2EB', '#FFCE56','#1284ff'],
                    borderWidth: 1
                }]
            },
            options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top'
                        },
                        tooltip: {
                            enabled: true
                        }
                    }
                }
        });
</script>
</section>
<?php
 require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/registracion/head/fooder_d.php");
?>