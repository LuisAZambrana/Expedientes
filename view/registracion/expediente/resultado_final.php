<?php
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/registracion/head/head.php");
      require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
     $ruta="/proyecto/view/registracion/expediente/";
     $ruta_adjunto="/proyecto/view/registracion/adrg_borrador_i0/";
     $ruta_persona="/proyecto/view/registracion/adrg_borrador_i3/";
     $ruta_borrador="/proyecto/view/registracion/adrg_borrador_h/";
     $prueba = new db();
     $_GET['borradorid']= $prueba->codificar_valor($_GET['borradorid'],0);
     $where = "baja = 0 and borradorid =".$_GET['borradorid'];

?>
<section id="borrador_cargado" class="about">
<div class="container" data-aos="fade-up">
<div class="section-title">
          <h2>Resultado Final del Borrador</h2>
          <p>Visualización previa para generar el Expediente.</p>
        </div>
<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-borrador" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Borrador</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-origen" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Origen</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-destino" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Destino</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-ajunto" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Archivo Adjunto</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-persona" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Persona Externa</button>
  </li>
  <li class="nav-item" role="presentation">
    <a href=<?php echo("/proyecto/view/registracion/adrg_borrador_h/show.php?id=".$prueba->codificar_valor($_GET['borradorid'],1)); ?>" class="nav-link" type="button" aria-selected="false"><i class="bx bx-exit"></i></a>
  </li>
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-borrador" role="tabpanel" aria-labelledby="pills-home-tab">
        <div class="table-responsive">
        <?php
           $query = "SELECT '".$ruta."validacion_expediente.php?id="."' as url, 'bx bx-archive' as icon, 'Generar el expediente.' as text";
           $control= $prueba->fcGetSQL($query,1,0);
          echo($prueba->configurar_grilla_personalizado_junto_descipcion(22, $where,$control));
        ?>
        </div>

  </div>
  <div class="tab-pane fade" id="pills-origen" role="tabpanel" aria-labelledby="pills-profile-tab">
     
            <div class="table-responsive">
                <?php
                    echo($prueba->configurar_grilla_sin_control_junto(25, $where));
                ?>
                </div>

  </div>
  <div class="tab-pane fade" id="pills-destino" role="tabpanel" aria-labelledby="pills-profile-tab">
    <div class="table-responsive">
                        <?php
                            echo($prueba->configurar_grilla_sin_control_junto(24, $where));
                        ?>
     </div>
       
  </div>
  <div class="tab-pane fade" id="pills-ajunto" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="table-responsive">
                <?php
                    $query_1 = "SELECT '".$ruta_adjunto."reporte.php?id=' as url, 'bx bx-printer' as icon, 'Visualizar archivo embebido' as text";
                    $control= $prueba->fcGetSQL($query_1,1,0);
                    echo($prueba->configurar_grilla_personalizado_junto_descipcion(23,$where,$control));
                ?>
                </div>

  </div>
  <div class="tab-pane fade" id="pills-persona" role="tabpanel" aria-labelledby="pills-profile-tab">
  <div class="table-responsive">
                <?php
                    $query_1 = "SELECT '".$ruta_persona."reporte.php?id=' as url, 'bx bx-printer' as icon, 'Visualizar documento adjuntado de la persona externa.' as text";
                    $control= $prueba->fcGetSQL($query_1,1,0); 
                    echo($prueba->configurar_grilla_personalizado_junto_descipcion(27,$where,$control));
                ?>
                
              

              </div>            
            </div>
</div>
<div>
<?php
                    if (isset($_GET["mess"])){
                      $mensaje_externo = $_GET["mess"];
                      $el_mensaje =  $mensaje_externo ;
                        ?>
                          <div class="alert alert-danger" role="alert">
                                           <strong>Para generar su Expediente!</strong><br>
                                           <?php
                                            echo($el_mensaje);
                                           ?>
                                          </div>
<?php
                    }?>
</div>
</div>
</section>
<?php
 require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/registracion/head/fooder.php");
?>