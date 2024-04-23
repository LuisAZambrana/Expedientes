<?php
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/head.php");
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
        <label for="exampleInputEmail1" class="form-label">CampoId</label>
        <input type="text" name="campoid" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">CampoId</div>
        </div>
        <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Caption</label>
        <input type="text" name="caption" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">Caption</div>
        </div>
        <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Width</label>
        <input type="text" name="width" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">Width</div>
        </div>
        <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">ValueMember</label>
        <input  class="form-check-input" type="checkbox" role="switch" aria-describedby="emailHelp" name="valuemember" value="1">
        <div id="emailHelp" class="form-text">ValueMember</div>
      </div> 
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">DisplayMember</label>
        <input  class="form-check-input" type="checkbox" role="switch" aria-describedby="emailHelp" name="displaymember" value="1">
        <div id="emailHelp" class="form-text">DisplayMember</div>
      </div> 
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Visible </label>
        <input  class="form-check-input" type="checkbox" role="switch" aria-describedby="emailHelp" name="visible" value="1">
        <div id="emailHelp" class="form-text">Ingrese si es visible</div>
      </div> 
            <button type="submit" class="btn btn-primary">Guardar Item de Lista</button>
            <a class="btn btn-danger" href=<? echo("/proyecto/view/configuracion/syrg_lista_i0/index.php?id=".$_GET['id']); ?>> Cancelar </a>
        </form>
    </div>
    </section><!-- End About Section -->
<?php
      require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/fooder.php");
?>