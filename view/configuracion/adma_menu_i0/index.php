<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/head.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
    $obj= new db();
    $sql="SELECT * FROM adma_menu_h WHERE menuhorizontalid =".$_GET['id'];
    $date= $obj->fcGetSQL($sql,1,2);
    $ruta="/proyecto/view/configuracion/adma_menu_h/";
    $ruta_i0="/proyecto/view/configuracion/adma_menu_i0/";
?>
<section id="itemsmenu">
      <div class="container">
        <div class="section-title">
          <h2>Items de Menú</h2>
          <p>Cargar, editar y borrar items de un menú</p>
        </div>
        <div class="container" data-aos="fade-up">
    
    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">MenuHorizontalId </label>
        <div class="col-sm-10">
        <input type="text" readonly class="form-control-plaintext fw-bold" id="listaid" name="menuhorizontalid" value="<?= $_GET['id'] ?>">
        </div>
    </div> 
    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Nombre del Menú</label>
        <div class="col-sm-10">
        <input type="text" readonly class="form-control-plaintext fw-bold" id="nombremenuds" name="nombremenuds" value="<?= $date['nombremenuds']  ?>">
        </div>
    </div>
<div class="pb-3">
    <a href=<? echo($ruta."show.php?id=".$_GET['id']); ?> class="btn btn-primary"> Regresar </a>
</div>
        </div>
<div>
   <?php
   echo($obj->configurar_grilla_param_alta(13," baja = 0 and menuid = ".$_GET['id'],$ruta_i0,$_GET['id']));
   ?>
</div>

    </div>

</div>

<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/fooder.php");
?>