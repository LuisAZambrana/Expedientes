<?php
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/registracion/head/head.php");
      require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
     $ruta="/proyecto/view/registracion/expediente/";
     $ruta_adjunto="/proyecto/view/registracion/adrg_borrador_i0/";
     $ruta_persona="/proyecto/view/registracion/adrg_borrador_i3/";
     $ruta_borrador="/proyecto/view/registracion/adrg_borrador_h/";
     $prueba = new db();
     //$_GET['id']= $prueba->codificar_valor($_GET['id'],0);
     $dato_expediente = $prueba->fcGetSQL("SELECT * FROM adrg_expediente_h where baja = 0 and expedienteid=".$_GET['id'],1,2 );
     $where = "baja = 0 and borradorid =".$dato_expediente['borradorid'];
     $where_exp = "baja = 0 and expedienteid = ".$_GET['id'];
     $vuelta = $_GET['pase'];
     if ($vuelta == 'sector'){
      $index = "index_s.php";
    }
    else
    {if ($vuelta =='exp'){
      $index="index.php";
    }
    else{
      $index="index_u.php";
    }
       
}
  
?>
<section id="borrador_cargado" class="about">
<div class="container" data-aos="fade-up">
<div class="section-title">
          <h2>Visualización Expediente: <?php echo($dato_expediente['nro_expendiente']) ?> </h2>
          <p>Visualización de los datos del expediente.</p>
        </div>
<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-borrador" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Expediente</button>
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
    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-cerrado" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Expediente cerrado</button>
  </li>
  <li class="nav-item" role="presentation">
    <a href="<?php echo("/proyecto/view/registracion/expediente/".$index); ?>" class="nav-link" type="button" aria-selected="false"><i class="bx bx-exit"></i></a>
  </li>
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-borrador" role="tabpanel" aria-labelledby="pills-home-tab">
        <div class="table-responsive">
        <?php
          
          echo($prueba->configurar_grilla_sin_control_junto(26, $where));
        
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
  <div class="tab-pane fade" id="pills-cerrado" role="tabpanel" aria-labelledby="pills-profile-tab">
  <div class="table-responsive">
                <?php
                    $query_1 = "SELECT '".$ruta."respuesta_exp.php?id=' as url, 'bx bx-printer' as icon, 'Visualizar documento de cierre del Expediente.' as text";
                    $control= $prueba->fcGetSQL($query_1,1,0); 
                    echo($prueba->configurar_grilla_personalizado_junto_descipcion(30,$where_exp,$control));
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