<?php
    //require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/head/head.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/head/head.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
     $obj= new db();
     $ruta="/proyecto/view/tbl_member/";
?>
<section id="usuario" class="about">
<h2 class="text-center"> Administrador de usuarios </h2>
<div class="container">
<?php
      echo($obj->configurar_grilla(3,' 1 = 1',$ruta));
?>
</div>
</section>
<?php
 require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/head/fooder.php");
?>
