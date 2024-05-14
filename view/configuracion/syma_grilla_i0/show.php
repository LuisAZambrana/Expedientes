<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/head.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
    $obj= new db();
    $sql="SELECT * FROM syma_grilla_i0 WHERE itemid=".$_GET['id'];
    $date = $obj->fcGetSQL($sql,true,2);
    $sql="SELECT * FROM syma_grilla_h WHERE grillaid =".$date['grillaid'];
    $extra = $obj->fcGetSQL($sql,true,2);
    $ruta="/proyecto/view/adma_persona_i0/";
    $ruta_i0="/proyecto/view/configuracion/syma_grilla_i0/";
?>
<section id="columnas" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Columnas</h2>
          <p>Cargar, editar y borrar columnas de una grilla</p>
        </div>
<div class="container" data-aos="fade-up">
   
  
    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">GrillaId</label>
        <div class="col-sm-10">
        <input type="text" readonly class="form-control-plaintext fw-bold" id="nombre" name="grilllaid" value="<?= $date['grillaid']  ?>">
        </div>
    </div> 
    <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Tipo de consulta</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext fw-bold" id="nombre" name="grilllaid" value="<?php
                switch ($extra['tipoconsultaid']) {
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
        <input type="text" readonly class="form-control-plaintext fw-bold" id="nombre" name="keyfieldname" value="<?= $extra[3]  ?>">
        </div>
    </div> 
    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Tabla</label>
        <div class="col-sm-10">
        <input type="text" readonly class="form-control-plaintext fw-bold" id="nombre" name="tabla" value="<?= $extra[4]  ?>">
        </div>
    </div> 

<div class="pb-3">
<a href="<? echo($ruta_i0."index.php?id=". $obj->codificar_valor($date['grillaid'],1)) ?>" class="btn btn-primary"> Regresar </a>
<a href="<?= $ruta ?>edit.php?id=<?= $obj->codificar_valor($date[0],1)?>" class="btn btn-success"> Actualizar </a>
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
                  <a href="<?= $ruta ?>delete.php?id=<?= $obj->codificar_valor($date[0],1)?>" type="button" class="btn btn-danger">Eliminar!</a>
                  </div>
        </div>
      </div>
  </div>
 
</div>


<table class="table container-fluid">
    <thead>
        <tr>
                <th scope="col">Caption</th>
                <th scope="col">ToolTip </th>
                <th scope="col">Visible</th>
                <th scope="col">VisibleIndex</th>
                <th scope="col">Width</th>
                <th scope="col">GroupIndex</th>
                <th scope="col">FieldName</th>
                <th scope="col">ComboListaId</th>
                <th scope="col">Html</th>
                <th scope="col">TieneCondicion</th>    
        </tr>
    </thead>
    <tbody>
        <tr>
                        <th><?= $date[2] ?></th>
                        <th><?= $date[3] ?></th>
                        <th><?= $date[4] ?></th>
                        <th><?= $date[5] ?></th>
                        <th><?= $date[6] ?></th>
                        <th><?= $date[7] ?></th>
                        <th><?= $date[8] ?></th>
                        <th><?= $date[9] ?></th>
                        <th><?= $date[10] ?></th>
                        <th><?= $date[11] ?></th>
                        
        </tr>
    
    </tbody>

</table>

</div>
</div>
<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/fooder.php");
?>