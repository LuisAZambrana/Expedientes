<?php
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/registracion/head/head.php");
      require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
     $ruta="/proyecto/view/registracion/adrg_borrador_h/";
     $prueba = new db();
 
 
?>
<section id="sector" class="about">
<div class="container" data-aos="fade-up">
<div class="section-title">
<h2 class="text-center"> Tus borradores </h2>
<p>Listador de borradores que aún no tienen expediente asociado.</p>
</div>

<div class="table-responsive">
<?php
      $where = " and borradorid not in (select borradorid from adrg_expediente_h where baja = 0)";
      echo($prueba->configurar_grilla_permisos(22,"baja = 0 and usuarioid=".$_SESSION['usuarioid']. $where,$ruta,13,$_SESSION['usuarioid']));
     
?>
</div>
</div>
</section>
<?php
 require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/registracion/head/fooder.php");
?>