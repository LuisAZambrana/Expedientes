<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/head.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
    $obj= new db();
    $sql="SELECT * FROM syma_grilla_h WHERE grillaid=".$_GET['id'];
    $date = $obj->fcGetSQL($sql,true,2);
    $sql="SELECT * FROM syma_grilla_i0 WHERE baja = 0 and grillaid =".$_GET['id'];
    $extra = $obj->fcGetSQL($sql,true,0);
    $ruta="/proyecto/view/configuracion/syma_grilla_h/";
    $ruta_i0="/proyecto/view/configuracion/syma_grilla_i0/";
?>
<section id="columnas">
      <div class="container">
        <div class="section-title">
          <h2>Columnas</h2>
          <p>Cargar, editar y borrar columnas de una grilla</p>
        </div>
        <div class="container" data-aos="fade-up">
    
    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">GrillaId</label>
        <div class="col-sm-10">
        <input type="text" readonly class="form-control-plaintext fw-bold" id="nombre" name="grilllaid" value="<?= $date[1]  ?>">
        </div>
    </div> 
    <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Tipo de consulta</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext fw-bold" id="nombre" name="grilllaid" value="<?php
                switch ($date[2]) {
                    case 1:
                        echo "MySQL";
                        break;
                    case 2:
                        echo "Oracle";
                        break;
                    case 3:
                        echo "SQL Server";
                        break;
                } 
                ?>">             
                </div>
    </div>
    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">KeyFieldName</label>
        <div class="col-sm-10">
        <input type="text" readonly class="form-control-plaintext fw-bold" id="nombre" name="keyfieldname" value="<?= $date[3]  ?>">
        </div>
    </div> 
    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Tabla</label>
        <div class="col-sm-10">
        <input type="text" readonly class="form-control-plaintext fw-bold" id="nombre" name="tabla" value="<?= $date[4]  ?>">
        </div>
    </div> 

<div class="pb-3">
   
    <a href=<? echo($ruta."show.php?id=".$obj->codificar_valor($_GET['id'],1)); ?> class="btn btn-primary"> Regresar </a>
</div>
        </div>
<div>
   <?php
   echo($obj->configurar_grilla_param_alta(8," baja = 0 and grillaid = ".$_GET['id'],$ruta_i0,$obj->codificar_valor($_GET['id'],1)));
    ?>
</div>

    </div>

</div>

<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/fooder.php");
?>