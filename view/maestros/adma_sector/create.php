<?php
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/maestros/head/head.php");
?>
<section id="sector" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Sectores</h2>
          <p>Cargar un Sector</p>
        </div>
        <form action="store.php" method="POST" autocomplet="off">
        <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nombre Sector</label>
        <input type="text" name="sectords" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">Nombre del Sector</div>
       </div>
       <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Tipo de Sector</label>
        <?php
         $objecto = new db();
         echo($objecto->configurar_lista(9,null,'tiposectorid',null));
        ?>
        <div id="emailHelp" class="form-text">Ingrese el tipo sector</div>
      </div>
      <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Activo</label>
      <input  class="form-check-input" type="checkbox" role="switch" aria-describedby="emailHelp" name="activo" value="1">
      <div id="emailHelp" class="form-text">Ingrese si está activo</div>
      </div>
            <button type="submit" class="btn btn-primary">Guardar Formulario</button>
            <a class="btn btn-danger" href="/proyecto/view/maestros/adma_sector/index.php"> Cancelar </a>
        </form>
    </div>
    </section><!-- End About Section -->
<?php
      require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/maestros/head/fooder.php");
?>