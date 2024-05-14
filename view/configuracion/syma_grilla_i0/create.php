<?php
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/head.php");
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
     $db = new db();
?>
<section id="items" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Grillas</h2>
          <p>Cargar una columna de la grilla,</p>
        </div>
        <form action="store.php" method="POST" autocomplet="off">
        <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">GrillaId</label>
        <div class="col-sm-10">
        <input type="text" readonly class="form-control-plaintext fw-bold" id="nombre" name="grillaid" value="<?= $_GET['id'] ?>">
        </div>
        </div>
        <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Caption</label>
        <input type="text" name="caption" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">Ingrese el Caption</div>
        </div>
        <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">ToolTip</label>
        <input type="text" name="tooltip" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">Ingrese el ToolTip</div>
        </div>
        <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Visible</label>
        <input  class="form-check-input" type="checkbox" role="switch" aria-describedby="emailHelp" name="visible" value="1">
        <div id="emailHelp" class="form-text">Ingrese si es visible</div>
        </div>
        <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">VisibleIndex</label>
        <input type="text" name="visibleindex" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">Ingrese la posicion de la columna</div>
        </div>
        <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Width</label>
        <input type="text" name="width" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">Ingrese el ancho de la columna</div>
        </div>
     
      <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">GroupIndex</label>
      <input type="text" name="groupindex" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">Orden de agrupammiento</div>
      </div>
      <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">FieldName</label>
      <input type="text" name="fieldname" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">Ingrese nombre de la columna</div>
      </div>
      <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">ComboListaId</label>
      <input type="text" name="combolistaid" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">Ingrese el numero de la lista</div>
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Html</label>
        <input  class="form-check-input" type="checkbox" role="switch" aria-describedby="emailHelp" name="html" value="1">
        <div id="emailHelp" class="form-text">Ingrese si es visible</div>
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">TieneCondicion</label>
        <input  class="form-check-input" type="checkbox" role="switch" aria-describedby="emailHelp" name="tienecondicion" value="1">
        <div id="emailHelp" class="form-text">Ingrese si tiene condición</div>
      </div>
      <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Condición</label>
      <input type="text" name="condicion" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">Ingrese la condición</div>
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Imagen</label>
        <input  class="form-check-input" type="checkbox" role="switch" aria-describedby="emailHelp" name="imagen" value="1">
        <div id="emailHelp" class="form-text">Ingrese si es imagen</div>
      </div>
      <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Url_Imagen</label>
      <input type="text" name="url_imagen" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">Ingrese la url</div>
      </div>
      <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">CampoImagen</label>
      <input  class="form-check-input" type="checkbox" role="switch" aria-describedby="emailHelp" name="campoimagen" value="1">
      <div id="emailHelp" class="form-text">Ingrese si es imagen</div>
      </div>
      <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">HiperLink</label>
      <input  class="form-check-input" type="checkbox" role="switch" aria-describedby="emailHelp" name="hiperlink" value="1">
      <div id="emailHelp" class="form-text">Ingrese si es Hipervinculo</div>
      </div>
      <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Priority</label>
      <input type="text" name="priority" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">Ingrese prioridad</div>
      </div>
      <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Parametro</label>
      <input  class="form-check-input" type="checkbox" role="switch" aria-describedby="emailHelp" name="parametro" value="1">
      <div id="emailHelp" class="form-text">Ingrese Parametro</div>
      </div>
      <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">NombreSesion</label>
      <input type="text" name="nombresesion" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">Ingrese la session a comparar</div>
      </div>
    
            <button type="submit" class="btn btn-primary">Guardar Columna</button>
            <a class="btn btn-danger" href=<? echo("/proyecto/view/configuracion/syma_grilla_i0/index.php?id=". $db->codificar_valor($_GET['id'],1)); ?>> Cancelar </a>
        </form>
    </div>
    </section><!-- End About Section -->
<?php
      require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/fooder.php");
?>