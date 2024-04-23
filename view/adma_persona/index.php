<?php
      require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
      require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/head/head.php");
     $ruta="/proyecto/view/adma_persona/";
     $prueba = new db();  
?>
<section id="persona" class="about">

<div class="container">
<h3 class="text-center"> Maestros de personas </h3>
<?php
  //echo($prueba->configurar_lista_grilla(1,2));
  echo($prueba->configurar_grilla(2,"baja = 0","/proyecto/view/adma_persona/"));
?>
</div>
</section>
<?php
 require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/head/fooder.php");
?>

