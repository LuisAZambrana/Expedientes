<?php
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/head.php");
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
     $db = new db();
?>
<section id="items" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Cargar items de Menú</h2>
          <p>Cargar un item</p>
        </div>
        <form action="store.php" method="POST" autocomplet="off">
        <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">MenuId</label>
        <div class="col-sm-10">
        <input type="text" readonly class="form-control-plaintext fw-bold" id="nombre" name="menuid" value="<?= $_GET['id'] ?>">
        </div>
        </div>
        <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">FormularioId</label>
        <input type="text" name="formularioid" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">FormularioId</div>
        </div>
        <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Text</label>
        <input type="text" name="text" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">Text</div>
        </div>
        <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">NavigateUrl</label>
        <input type="text" name="navigateurl" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">NavigateUrl</div>
        </div>
        <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Imagen</label>
        <input  class="form-check-input" type="checkbox" role="switch" aria-describedby="emailHelp" name="imagen" value="1">
        <div id="emailHelp" class="form-text">Imagen</div>
      </div> 
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">ImageUrl</label>
        <input type="text" name="imageurl" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">ImageUrl</div>
        </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">PermiteGif </label>
        <input  class="form-check-input" type="checkbox" role="switch" aria-describedby="emailHelp" name="permitegif" value="1">
        <div id="emailHelp" class="form-text">PermiteGif</div>
      </div> 
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">ImageGif</label>
        <input type="text" name="imagengif" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">ImageGif</div>
        </div>
        <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Tipo Función</label>
        <input type="text" name="tipofuncion" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">Tipo Función</div>
        </div>
        <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Función Asociada Gif </label>
        <input type="text" name="funcionasociadagif" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">Función Asociada Gif</div>
        </div>
        <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Grupo</label>
        <input type="text" name="grupo" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">Grupo</div>
        </div>
        <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Orden</label>
        <input type="text" name="orden" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">Orden</div>
        </div>
            <button type="submit" class="btn btn-primary">Guardar Item de Menú</button>
            <a class="btn btn-danger" href=<? echo("/proyecto/view/configuracion/adma_menu_i0/index.php?id=".$db->codificar_valor($_GET['id'],1)); ?>> Cancelar </a>
        </form>
    </div>
    </section><!-- End About Section -->
<?php
      require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/fooder.php");
?>