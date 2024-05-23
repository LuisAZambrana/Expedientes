<?php
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/head.php");
      require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
     $ruta="/proyecto/view/configuracion/syrg_parametro_h/";
     $prueba = new db();
     //$rows = $prueba->fcGetSQL("SELECT * FROM syma_grilla_h  where baja = 0",1,0);
 
?>
<section id="personas" class="about">
<div class="container" data-aos="fade-up">
<h2 class="text-center"> Administración de Parametros </h2>
<div class="table-responsive">
<?php
      echo($prueba->configurar_grilla(31,"baja = 0",$ruta));
?>
</div>
</div>
</section>
<?php
 require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/fooder.php");
?>