<?php
        require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/seguridad/head/head.php");
      require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
     $ruta="/proyecto/view/seguridad/serg_permisos_h/";
     $prueba = new db();
?>
<section id="permiso" class="about">
<div class="container" data-aos="fade-up">
      <h2 class="text-center"> Administración de Permisos </h2>
      <div class="table-responsive">

<?php
      echo($prueba->configurar_grilla(18,"baja = 0",$ruta));
?>
 </div>
</div>
</section>
<?php
 require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/seguridad/head/fooder.php");
?>