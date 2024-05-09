<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/head.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
    $obj= new db();
    $_GET['id']= $obj->codificar_valor( $_GET['id'],0);
    $sql="SELECT * FROM syrg_lista_h WHERE listaid=".$_GET['id'];
    $date= $obj->fcGetSQL($sql,1,2);
    $ruta="/proyecto/view/configuracion/syrg_lista_h/";
    $ruta_i0="/proyecto/view/configuracion/syrg_lista_i1/";
?>
<section id="columnas">
      <div class="container">
        <div class="section-title">
          <h2>Items de Lista</h2>
          <p>Cargar, editar y borrar items de una lista</p>
        </div>
        <div class="container" data-aos="fade-up">
    
    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">ListaId</label>
        <div class="col-sm-10">
        <input type="text" readonly class="form-control-plaintext fw-bold" id="listaid" name="listaid" value="<?= $_GET['id'] ?>">
        </div>
    </div> 
    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Nombre de Lista</label>
        <div class="col-sm-10">
        <input type="text" readonly class="form-control-plaintext fw-bold" id="listads" name="listads" value="<?= $date['listads']  ?>">
        </div>
    </div>
<div class="pb-3">
    <a href=<? echo($ruta."show.php?id=".$_GET['id']); ?> class="btn btn-primary"> Regresar </a>
</div>
        </div>
<div>
   <?php
   echo($obj->configurar_grilla_param_alta(11," baja = 0 and listaid = ".$_GET['id'],$ruta_i0,$_GET['id']));
   ?>
</div>

    </div>

</div>

<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/fooder.php");
?>