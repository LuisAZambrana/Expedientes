<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/registracion/head/head.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
    $obj= new db();
    $ruta="/proyecto/view/registracion/adrg_borrador_i3/";
    $ruta_padre="/proyecto/view/registracion/adrg_borrador_h/";
    $ruta_raiz="/proyecto/";

    $rows = $obj->fcGetSQL("SELECT * FROM adrg_borrador_i3  where borradorid =".$_GET['id'],1,2);
?>
<section id="embebido" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Persona cargada</h2>
          <p>Editar o borrar la persona que presenta la documentación.</p>
        </div>
<div class="container" data-aos="fade-up">
   

   
<div class="pb-3">
<a href="<? echo($ruta_padre."show.php?id=".$obj->codificar_valor($_GET['id'],1)) ?>" class="btn btn-primary"> Regresar </a>
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


$query_1 = "SELECT '".$ruta."reporte.php?id=' as url, 'bx bx-printer' as icon";

$control= $prueba->fcGetSQL($query_1,1,0);

echo($prueba->configurar_grilla_personalizado(27,"baja = 0 and borradorid = ".$_GET['id'],$control));
?>
</div>
</div>
<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/fooder.php");
?>