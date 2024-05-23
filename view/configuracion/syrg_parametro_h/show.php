<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/head.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
    $obj= new db();
    $ruta="/proyecto/view/configuracion/syrg_parametro_h/";
    $ruta_raiz="/proyecto/";
    $ruta_i0 ="/proyecto/view/configuracion/syrg_parametro_h/";
    
?>
<section id="Listas" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Parametro</h2>
          <p>Cargar, editar y borrar un parametro</p>
        </div>
<div class="container" data-aos="fade-up">
   

   
<div class="pb-3">
<a href="<? echo($ruta."index.php") ?>" class="btn btn-primary"> Regresar </a>
<a href="<?= $ruta ?>edit.php?id=<?= $obj->codificar_valor($_GET['id'],1)?>" class="btn btn-success"> Actualizar </a>
<a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal"> Eliminar </a>
<!-- Button trigger modal -->
<!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar registro</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                  Esta seguro que quiere eliminar el registro?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cancelar</button>
                  <a href="<?= $ruta ?>delete.php?id=<?= $obj->codificar_valor($_GET['id'],1)?>" type="button" class="btn btn-danger">Eliminar!</a>
                  </div>
        </div>
      </div>
  </div>
 
</div>
<?php

    $query = "SELECT '".$ruta_i0."index.php?id=' as url, 'bx bx-folder-open' as icon";
    $control= $obj->fcGetSQL($query,1,0);
    echo($obj->configurar_grilla_sin_control(31," baja = 0 and parametroid=".$_GET['id']));
    //echo($obj->configurar_grilla_personalizado(16," baja = 0 and formularioid=".$_GET['id'], $control));
?>
</div>
</div>
<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/fooder.php");
?>