<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/registracion/head/head.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
    $obj= new db();
    $ruta="/proyecto/view/registracion/adrg_borrador_h/";
    $ruta_i0="/proyecto/view/registracion/adrg_borrador_i0/";
    $ruta_i3="/proyecto/view/registracion/adrg_borrador_i3/";
    $ruta_i1="/proyecto/view/registracion/adrg_borrador_i1/";
    $ruta_i2="/proyecto/view/registracion/adrg_borrador_i2/";
    $ruta_expediente="/proyecto/view/registracion/expediente/";
    $_valorid = $_SESSION['id'];
    $sql_embebido = "SELECT embebidoid from adrg_borrador_i0 where baja = 0 and borradorid =".$_valorid;
    $row_borrador = $obj->fcGetSQL($sql_embebido,1,2);
    $control_ = "";
    $control_resultado_final = "resultado_final.php?borradorid=";
    if ($row_borrador){
      $control_ = "show.php?id=";
    }
    else{
      $control_="create.php?id=";
    }
    
    $sql_persona = "SELECT adjuntoid from adrg_borrador_i3 where baja = 0 and borradorid =". $_valorid;
    $row_persona = $obj->fcGetSQL($sql_persona,1,2);
    $control_p="";
    if ($row_persona){
      $control_p = "show.php?id=";
    }
    else{
      $control_p="create.php?id=";
    }

    $sql_destino = "SELECT destinoid from adrg_borrador_i1 where baja= 0 and borradorid =". $_valorid;
    $row_destino = $obj->fcGetSQL($sql_destino,1,2);
    $control_d="";
    if ($row_destino){
      $control_d = "show.php?id=";
    }
    else{
      $control_d="create.php?id=";
    }

    $sql_origen = "SELECT origenid from adrg_borrador_i2 where baja= 0 and borradorid =".$_valorid;
    $row_origen = $obj->fcGetSQL($sql_origen,1,2);
    $control_o="";
    if ($row_origen){
      $control_o = "show.php?id=";
    }
    else{
      $control_o="create.php?id=";
    }

?>
<section id="borrador" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Borrador</h2>
          <p>Cargar, editar y borrar un borrador</p>
        </div>
<div class="container" data-aos="fade-up">
   

   
<div class="pb-3">
<a href="<?php echo($ruta_expediente."index.php"); ?>" class="btn btn-primary"> Regresar </a>
<a href="<?php echo($ruta."edit.php?id=".$obj->codificar_valor($_GET['id'],1)); ?>" class="btn btn-success"> Actualizar borrador </a>
<a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal"> Eliminar borrador </a>
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
<div class="responsive">
<?php

    //echo($obj->configurar_grilla_sin_control(22," baja = 0 and borradorid =".$_GET['id']));
   

    $query_0 = "SELECT '".$ruta_i0.$control_."' as url, 'bx bx-archive' as icon, 'Adjuntar archivo' as text, 0 as bandera";
    $query_1 = "SELECT '".$ruta_i3.$control_p."' as url, 'bx bx-user' as icon, 'Cargar persona externa' as text, 0 as bandera";
    $query_2 = "SELECT '".$ruta_i2.$control_o."' as url, 'bx bx-street-view' as icon, 'Cargar origen del expediente' as text, 0 as bandera";
    $query_3 = "SELECT '".$ruta_i1.$control_d."' as url, 'bx bx-run' as icon, 'Cargar destino del expediente' as text, 0 as bandera";
    $query_4 = "SELECT '".$ruta_expediente.$control_resultado_final."' as url, 'bx bx-search-alt' as icon, 'Visualizar los datos del expediente a generar' as text, 0 as bandera";
    $query="SELECT * FROM (".$query_0." UNION ALL ".$query_1." UNION ALL ".$query_2." UNION ALL ".$query_3." UNION ALL ".$query_4.") AS derived_table_alias";
    $control= $prueba->fcGetSQL($query,1,0);

   echo($prueba->configurar_grilla_personalizado_descripcion(22,"baja = 0 and borradorid = ".$_valorid,$control));


?>
</div>

</div>
</div>
<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/registracion/head/fooder.php");
?>