<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/registracion/head/head.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
    $obj= new db();
    $ruta="/proyecto/view/registracion/adrg_expediente_i0/";
    $ruta_padre="/proyecto/view/registracion/expediente/";
    $ruta_raiz="/proyecto/";
    $vuelta = $_GET['pase'];
  
    $rows = $obj->fcGetSQL("SELECT * FROM adrg_expediente_i0  where baja = 0 and expedienteid =".$_GET['id'],1,2);
    $rows_expediente =  $obj->fcGetSQL("SELECT * FROM adrg_expediente_h  where baja = 0 and expedienteid =".$_GET['id'],1,2);
    if ($vuelta == 'sector'){
          $index = "index_s.php";
    }
    else
    {if ($vuelta =='exp'){
      $index="index.php";
    }
    else{
      $index="index_u.php";
    }
           
    }
?>
<section id="destino" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Pase de Expediente</h2>
          <p>Cargar pase de Expediente asignado.</p>
        </div>
<div class="container" data-aos="fade-up">
<div class="mb-3 row" >
        <label for="staticEmail" class="col-sm-2 col-form-label">N° de Expediente:</label>
        <div class="col-sm-10">
        <input type="text" readonly class="form-control-plaintext fw-bold" id="expedienteid" name="nro_expediente" value="<?= $rows_expediente['nro_expendiente'] ?>">
        </div>   

   
<div class="pb-3">
<a href="<? echo($ruta_padre.$index) ?>" class="btn btn-primary"> Regresar </a>

</div>
<?php


$query_1 = "SELECT '".$ruta."reporte.php?id=' as url, 'bx bx-printer' as icon";



echo($prueba->configurar_grilla_sin_control(28,"baja = 0 and expedienteid = ".$_GET['id']));
?>
</div>
</div>
<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/registracion/head/fooder.php");
?>