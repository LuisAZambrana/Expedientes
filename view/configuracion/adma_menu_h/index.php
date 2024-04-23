<?php
      require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
      require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/head.php");
     $ruta="/proyecto/view/configuracion/adma_menu_h/";
     $prueba = new db();
?>
<section id="menu" class="about">
<h2 class="text-center"> Administración de Menú </h2>
<div class="container">
<?php
      echo($prueba->configurar_grilla(12,"baja = 0",$ruta));
?>
</div>
</section>
<?php
 require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/fooder.php");
?>