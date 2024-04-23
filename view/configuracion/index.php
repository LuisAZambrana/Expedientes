<?php
      require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
      require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/head/head.php");
?>
<section id="personas" class="about">
<div class="container" data-aos="fade-up">
      <h2 class="text-center"> Generar procedimientos almacenados.</h2>
<?php
      $control = $prueba->fcGetSQL("SELECT '/proyecto/view/configuracion/generar_procedimiento.php?nombre=' as url, 'bx bxs-down-arrow-circle' as icon ",1,0);
      echo($prueba->configurar_grilla_personalizado(4," table_type= 'BASE TABLE' and TABLE_SCHEMA='myproyecto' ",$control));
?>
</div>
</section>
<?php
 require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/head/fooder.php");
?>