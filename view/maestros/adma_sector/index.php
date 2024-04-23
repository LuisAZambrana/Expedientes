<?php
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/maestros/head/head.php");
      require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
     $ruta="/proyecto/view/maestros/adma_sector/";
     $prueba = new db();
 
 
?>
<section id="sector" class="about">
<div class="container" data-aos="fade-up">
<h2 class="text-center"> Administración de Sectores </h2>
<div class="table-responsive">
<?php
      echo($prueba->configurar_grilla(20,"baja = 0",$ruta));
?>
</div>
</div>
</section>
<?php
 require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/maestros/head/fooder.php");
?>