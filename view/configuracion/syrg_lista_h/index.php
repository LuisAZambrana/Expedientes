<?php
      require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
      require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/head.php");
     $ruta="/proyecto/view/configuracion/syrg_lista_h/";
     $prueba = new db();
     //$rows = $prueba->fcGetSQL("SELECT * FROM syma_grilla_h  where baja = 0",1,0);
 
?>
<section id="listas" class="about">
<h2 class="text-center"> Administración de Listas </h2>
<div class="container">
<?php
      echo($prueba->configurar_grilla_permisos(9,"baja = 0",$ruta,3,$usuarioid));
?>
</div>
</section>
<?php
 require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/fooder.php");
?>