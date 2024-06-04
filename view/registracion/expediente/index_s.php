<?php
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/registracion/head/head.php");
      require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
      require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/mail.php");
      $elmail = new mail();
     $ruta="/proyecto/view/registracion/expediente/";
     $ruta_pase="/proyecto/view/registracion/adrg_expediente_i0/";
     $ruta_borrador="/proyecto/view/registracion/adrg_borrador_h/";
     $prueba = new db();
     $sql= "SELECT sectorid  from sema_usuario_i1 where baja = 0 and personaid = ". $_SESSION['usuarioid']." LIMIT 1";
     $_sector_row= $prueba->fcGetSQL($sql,1,2);
     $_sectorid = $_sector_row['sectorid'];
     $sql_sector_descripcion = "SELECT * FROM adma_sector where baja = 0 and sectorid = ". $_sectorid;
     $sector_decripcion = $prueba->fcGetSQL($sql_sector_descripcion,1,2);

?>
<section id="expedientes" class="about">
<div class="container" data-aos="fade-up">
<div class="section-title">
          <h2>Expedientes de tu sector: <?php echo($sector_decripcion['sectords']); ?></h2>
          <p>Visualización de los Expedientes enviados a tu sector pendientes a darle respuesta.</p>
        </div>
<div class="table-responsive">
 <?php   
  $bandera_exito_mail = 0;
  if (isset($_GET['el_mail'])){
      $valor_mail = $prueba->codificar_valor($_GET['el_mail'],0);
    
      $sql_mail="SELECT * FROM adrg_expediente_j0 WHERE mailid =". $valor_mail ;
      $dato_mail = $prueba->fcGetSQL($sql_mail,1,2);
      

      $bandera_exito_mail= $elmail->enviar_mail($dato_mail['servidorsmtp'],
      $dato_mail['usuario_nombre'],
      $dato_mail['contrasenia'],
      $dato_mail['puerto'] ,
      $dato_mail['remplazo_origen'],
      $dato_mail['destinatario'],
      $dato_mail['remplazo_destino'],
      $dato_mail['asunto'],
      $dato_mail['mensaje']);


  }
   
  if ($bandera_exito_mail)
  { ?>
    <div class="alert alert-primary" role="alert">
                    <strong>Envio de mail</strong><br>
                         Se envio mail a la persona externa para notificación del pase!
                   </div>

 
  <?php }

      $query_0 = "SELECT '".$ruta_pase."show.php?pase=sector&id=' as url, 'bx bx-bell' as icon, 'Visualizar pases del expediente' as text, 0 as valor";
      $query_1 = "SELECT '".$ruta_pase."create.php?pase=sector&id=' as url, 'bx bx-folder-plus' as icon, 'Crear un pase' as text, 0 as valor";
      $query_2 = "SELECT '".$ruta."resultado_expediente.php?pase=sector&id=' as url, 'bx bx-briefcase-alt-2' as icon, 'Contenido del expediente' as text, 0 as valor";
      $query_3 = "SELECT '".$ruta."finalizar_expediente.php?pase=sector&id=' as url, 'bx bx-archive-out' as icon, 'Finalizar y dar respuesta a un Expediente' as text, 0 as valor";
      $query="SELECT * FROM (".$query_0." UNION ALL ".$query_1." UNION ALL ".$query_2." UNION ALL ".$query_3.") AS derived_table_alias";
      $control= $prueba->fcGetSQL($query,1,0);
     

     echo($prueba->configurar_grilla_personalizado_descripcion(29,"tipo_destinoid = 2 and not(estadoid = 3) and sectorid_destino = ".$_sectorid,$control));
    
?>
</div>
</div>
</section>
<?php
 require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/registracion/head/fooder.php");
?>