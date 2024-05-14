<?php
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/head.php");
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
     $db = new db();
?>
<section id="items" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Cargar items dinámicos</h2>
          <p>Cargar un item</p>
        </div>
        <form action="store.php" method="POST" autocomplet="off">
        <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">ListaId</label>
        <div class="col-sm-10">
        <input type="text" readonly class="form-control-plaintext fw-bold" id="nombre" name="listaid" value="<?= $_GET['id'] ?>">
        </div>
        </div>
        <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">ValueMember</label>
        <input type="text" name="valuemember" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">ValueMember</div>
        </div>
        <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">DisplayMember</label>
        <input type="text" name="displaymember" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">DisplayMember</div>
        </div>
        <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Predeterminado</label>
        <input  class="form-check-input" type="checkbox" role="switch" aria-describedby="emailHelp" name="predeterminado" value="1">
        <div id="emailHelp" class="form-text">Predeterminado</div>
        </div> 
        <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Imagen</label>
        <input type="text" name="imagen" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">Imagen</div>
        </div>
      </div> 
      </div> 
            <button type="submit" class="btn btn-primary">Guardar Item de Lista</button>
            <a class="btn btn-danger" href=<? echo("/proyecto/view/configuracion/syrg_lista_i1/index.php?id=".$db->codificar_valor($_GET['id'],1)); ?>> Cancelar </a>
        </form>
    </div>
    </section><!-- End About Section -->
<?php
      require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/fooder.php");
?>