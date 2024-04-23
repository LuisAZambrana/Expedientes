<?php
      require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/head.php");
      require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
     $ruta="/proyecto/view/configuracion/syma_grilla_h/";
     $prueba = new db();
     //$rows = $prueba->fcGetSQL("SELECT * FROM syma_grilla_h  where baja = 0",1,0);
 
?>
<section id="personas" class="about">
<div class="container" data-aos="fade-up">
      <h2 class="text-center"> Administración de Grillas </h2>
      <div class="table-responsive">

<?php
 echo($prueba->configurar_grilla(7,"baja = 0","/proyecto/view/configuracion/syma_grilla_h/"));
 ?>
    </div>
</div>
</section>
<?php
 require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/fooder.php");
?>
 