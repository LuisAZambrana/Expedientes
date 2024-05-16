<?php
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/registracion/head/head.php");
      require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
    
     $ruta="/proyecto/view/registracion/expediente/";
     $ruta_pase="/proyecto/view/registracion/adrg_expediente_i0/";
     $ruta_borrador="/proyecto/view/registracion/adrg_borrador_h/";
     $prueba = new db();
     $sql= "SELECT count(expedienteid) as cantidad from adrg_expediente_h where baja = 0 and usuarioid = ". $_SESSION['usuarioid'];
     $resultado = $prueba->fcGetSQL($sql,1,2);
     $mostrar_nuevo = 1;
     if ($resultado['cantidad'] > 0){
        $mostrar_nuevo = 0;
     }
    
?>
<section id="expedientes" class="about">
<div class="container" data-aos="fade-up">
<div class="section-title">
          <h2>Mis Expedientes</h2>
          <p>Visualización de los Expedientes generados por el usuario.</p>
        </div>
<div class="table-responsive">
<?php 
    if ($mostrar_nuevo == 1) {
        ?>
        <div class="pb-3">
        <a href="<? echo($ruta_borrador."create.php")?>" class="btn btn-primary"> Crear Expediente </a>
        </div>
 <?php   } 


      $query_0 = "SELECT '".$ruta_pase."show.php?pase=exp&id=' as url, 'bx bx-bell' as icon, 'Visualizar pases del expediente' as text, 0 as valor";
      $query_1 = "SELECT '".$ruta_borrador."create.php?pase=exp&id=' as url, 'bx bx-folder-plus' as icon, 'Crear un expediente' as text, 0 as valor";
      $query_2 = "SELECT '".$ruta."reporte.php?id=' as url, 'bx bx-printer' as icon, 'Imprimir comprobante de inicio de Expediente' as text, 0 as valor";
      $query_3 = "SELECT '".$ruta."resultado_expediente.php?pase=exp&id=' as url, 'bx bx-briefcase-alt-2' as icon, 'Contenido del expediente' as text, 0 as valor";
      $query="SELECT * FROM (".$query_0." UNION ALL ".$query_1." UNION ALL ".$query_2." UNION ALL ".$query_3.") AS derived_table_alias";
      $control= $prueba->fcGetSQL($query,1,0);
     

     echo($prueba->configurar_grilla_personalizado_descripcion(26,"baja = 0 and usuarioid = ".$_SESSION['usuarioid'],$control));
   
?>
</div>
</div>
</section>
<?php
 require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/registracion/head/fooder.php");
?>