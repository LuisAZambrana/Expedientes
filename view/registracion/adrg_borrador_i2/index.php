<?php
        require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/registracion/head/head.php");
      require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
     $ruta="/proyecto/view/registracion/adrg_borrador_i0/";
     $prueba = new db();
?>
<section id="objeto" class="about">
<div class="container" data-aos="fade-up">
      <h2 class="text-center"> Administración de Archivos Embebidos del Borrador </h2>
      <div class="table-responsive">

<?php
       $query_0 = "SELECT '".$ruta."show.php?id=' as url, 'bx bx-folder-open' as icon";
       $query_1 = "SELECT '".$ruta."create.php?id=' as url, 'bx bx-folder-plus' as icon";
       $query_2 = "SELECT '".$ruta."reporte.php?id=' as url, 'bx bx-printer' as icon";
       $query="SELECT * FROM (".$query_0." UNION ALL ".$query_1." UNION ALL ".$query_2.") AS derived_table_alias";
       $control= $prueba->fcGetSQL($query,1,0);

      echo($prueba->configurar_grilla_personalizado(23,"baja = 0 and borradorid = ".$prueba->codificar_valor($_GET['id'],1),$control));
?>
 </div>
</div>
</section>
<?php
 require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/seguridad/head/fooder.php");
?>