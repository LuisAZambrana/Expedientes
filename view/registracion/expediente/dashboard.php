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
     $sql_sector_descripcion = "SELECT sector , sum(cantidad) as cantidad from v_expedientes_sector group by sector ";
     $vista = $prueba->fcGetSQL($sql_sector_descripcion,1,0);

     $sql_sector_descripcion_1 = "SELECT * from v_expedientes_sector";
     $vista_1 = $prueba->fcGetSQL($sql_sector_descripcion_1,1,0);

     $sql_sector_descripcion = "SELECT anio , sum(cantidad) as cantidad from v_expedientes_sector group by anio ";
     $vista_2 = $prueba->fcGetSQL($sql_sector_descripcion,1,0);

     $sql_sector_descripcion = "SELECT * from v_expedientes_estado ";
     $estados = $prueba->fcGetSQL($sql_sector_descripcion,1,0);
     $cantidad_iniciado = 0;
     $cantidad_pases = 0;
     $cantidad_finalizado= 0;

     $sql_externos = "select * from v_expedientes_externos";
     $dato_externos = $prueba->fcGetSQL($sql_externos,1,2);


     foreach ($estados as $row){

      if ($row['estado'] == 'Expediente con Pase') {
        $cantidad_pases = $row['cantidad'];
      }
      if ($row['estado'] == 'Expediente Iniciado') {
        $cantidad_iniciado =  $row['cantidad'];
      
      }
      if ($row['estado'] == 'Expediente Finalizado') {
        $cantidad_finalizado =  $row['cantidad'];
      
      }

      $expedientes_abiertos = ($cantidad_pases +  $cantidad_iniciado)/( $cantidad_pases +  $cantidad_iniciado +  $cantidad_finalizado) * 100;
      
     }
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
                <h3><?php echo($cantidad_finalizado); ?></h3>

                <p>Expedientes cerrados</p>
              </div>
              <div class="icon">
                <i class="ion ion-paperclip"></i>
              </div>
             
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo(number_format($expedientes_abiertos,2)); ?><sup style="font-size: 20px">%</sup></h3>

                <p>Expedientes abiertos</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
             
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo($dato_externos['cantidad']); ?></h3>

                <p>Expedientes de personas externas.</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo( $cantidad_pases); ?></h3>

                <p>Expedientes con Pases.</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              
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
                 Expedientes.
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Por mes y año</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#sales-chart" data-toggle="tab">Por sector</a>
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
                 Expedientes por año.
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    
                   
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
            document.addEventListener('DOMContentLoaded', (event) => {
        // Datos fijos con múltiples variables
        const datos = [
            <?php
            $cadena = "";
            foreach ($vista_1 as $row){
                $cadena.= "{sector:'" . $row['sector'] . "', anio:".$row['anio'].", mes:".$row['mes'].", cantidad:".$row['cantidad']."},";
             }
            $cadena = substr($cadena, 0, -1);
            echo($cadena);
            ?>  
        ];

        const sectores = [];
        const cantidadesPorSector = {};
       
        datos.forEach(row => {
            if (!sectores.includes(row.sector)) {
                sectores.push(row.sector);
            }
            const key = `${row.anio}-${('0' + row.mes).slice(-2)}`; // YYYY-MM format
            if (!cantidadesPorSector[row.sector]) {
                cantidadesPorSector[row.sector] = {};
            }
            
            if (!cantidadesPorSector[row.sector][key]) {
                cantidadesPorSector[row.sector][key] = 0;
            }
            
            cantidadesPorSector[row.sector][key] += row.cantidad;
            
        });

        const labels = Object.keys(cantidadesPorSector[sectores[0]]);
        const datasets = [];

        sectores.forEach(sector => {
            datasets.push({
                label: `${sector} - Cantidad`,
                data: labels.map(label => {
                    return cantidadesPorSector[sector][label] || 0;
                }),
                backgroundColor: getRandomColor()
            });
           
        });

        const ctx = document.getElementById('prueba').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: datasets
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        stacked: true
                    }
                   
                }
            }
        });
    });

    function getRandomColor() {
        const letters = '0123456789ABCDEF'.split('');
        let color = '#';
        for (let i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }
        

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
          type: 'bar',
            data: {
                labels: [
                    <?php
                    $cadena = "";
                    foreach ($vista_2 as $row){
                        $cadena.= "'" . $row['anio'] . "',";
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
                       foreach ($vista_2 as $row){
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
</script>
</section>
<?php
 require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/registracion/head/fooder_d.php");
?>