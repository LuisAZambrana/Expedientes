<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/head.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
    $obj= new db();
    $sql="SELECT * FROM syma_grilla_i0 WHERE  itemid =".$_GET['id'];
    $date = $obj->fcGetSQL($sql,true,2);
  
?>
<section id="columnas" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Grillas</h2>
          <p>Cargar, editar y borrar una columna</p>
        </div>
        <form action="update.php" method="POST" autocomplete="off"> 
            <h2> Modificación de una columna </h2>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">ItemId</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext fw-bold" id="nombre" name="itemid" value="<?= $date['itemid'] ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">GrillaId</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext fw-bold" id="nombre" name="grillaid" value="<?= $date['grillaid'] ?>">
                </div>
            </div>  
              
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">Caption</label>
            <input type="text" name="caption" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $date['caption'] ?>">
            <div id="emailHelp" class="form-text">Ingrese el caption</div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">ToolTip</label>
            <input type="text" name="tooltip" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $date['tooltip'] ?>">
            <div id="emailHelp" class="form-text">Ingrese el ToolTip</div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">Visible</label>
            <input  class="form-check-input" type="checkbox" role="switch" aria-describedby="emailHelp" name="visible"  <?= ($date['visible']== 1)? "checked":"unchecked" ?>>
            <div id="emailHelp" class="form-text">Columna visible</div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">VisibleIndex</label>
            <input type="text" name="visibleindex" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $date['visibleindex'] ?>">
            <div id="emailHelp" class="form-text">Visible Index</div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">Width</label>
            <input type="text" name="width" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $date['width'] ?>">
            <div id="emailHelp" class="form-text">Width</div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">GroupIndex</label>
            <input type="text" name="groupindex" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $date['groupindex'] ?>">
            <div id="emailHelp" class="form-text">Mostrar agrupamiento de columnas</div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">FieldName</label>
            <input type="text" name="fieldname" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $date['fieldname'] ?>">
            <div id="emailHelp" class="form-text">Nombre de la de columna en la tabla</div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">ComboListaId</label>
            <input type="text" name="combolistaid" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $date['combolistaid'] ?>">
            <div id="emailHelp" class="form-text">Listado</div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">Html</label>
            <input  class="form-check-input" type="checkbox" role="switch" aria-describedby="emailHelp" name="html" value="1" <?= ($date['html']== 1)? "checked":"unchecked" ?>>
            <div id="emailHelp" class="form-text">Html</div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">TieneCodicion</label>
            <input  class="form-check-input" type="checkbox" role="switch" aria-describedby="emailHelp" name="tienecondicion" value="1" <?= ($date['tienecondicion']== 1)? "checked":"unchecked" ?>>
            <div id="emailHelp" class="form-text">TieneCodicion</div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">Condicion</label>
            <input type="text" name="condicion" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $date['condicion'] ?>">
            <div id="emailHelp" class="form-text">Agrupamento de grilla</div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">Imagen</label>
            <input  class="form-check-input" type="checkbox" role="switch" aria-describedby="emailHelp" name="imagen" value="1" <?= ($date['imagen']== 1)? "checked":"unchecked" ?>>
            <div id="emailHelp" class="form-text">Imagen</div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">Url Imagen</label>
            <input type="text" name="url_imagen" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $date['url_imagen'] ?>">
            <div id="emailHelp" class="form-text">Url Imagen</div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">HiperLink</label>
            <input  class="form-check-input" type="checkbox" role="switch" aria-describedby="emailHelp" name="hiperlink" value="1"  <?= ($date['hiperlink']== 1)? "checked":"unchecked" ?>>
            <div id="emailHelp" class="form-text">Campo Imagen</div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">CampoImagen</label>
            <input  class="form-check-input" type="checkbox" role="switch" aria-describedby="emailHelp" name="campoimagen" value="1"  <?= ($date['campoimagen']== 1)? "checked":"unchecked" ?>>
            <div id="emailHelp" class="form-text">Campo Imagen</div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">Priority</label>
            <input type="text" name="priority" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $date['priority'] ?>">
            <div id="emailHelp" class="form-text">Priority</div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">Parametro</label>
            <input  class="form-check-input" type="checkbox" role="switch" aria-describedby="emailHelp" name="parametro" value="1"  <?= ($date['parametro']== 1)? "checked":"unchecked" ?>>
            <div id="emailHelp" class="form-text">Parametro</div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">Nombre Session</label>
            <input type="text" name="nombresesion" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $date['nombresesion'] ?>">
            <div id="emailHelp" class="form-text">Nombre Session</div>
            </div>
            
    <div>
        <input type="submit" class="btn btn-success" value="Actualizar">
        <a href="show.php?id=<?= $obj->codificar_valor($date['itemid'],1) ?>" class="btn btn-danger">Cancelar</a>
    </div>
</form>
      </div>
    </section><!-- End About Section -->

<?php
      require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/fooder.php");
?>