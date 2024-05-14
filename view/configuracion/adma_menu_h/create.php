<?php
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/head.php");
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
?> 
<section id="menu" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Menú</h2>
          <p>Cargar un Menú</p>
          <?php echo( $_SERVER['DOCUMENT_ROOT']."/proyecto/view/head/head.php"); ?>
        </div>
        <form action="store.php" method="POST" autocomplet="off">
        <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Menu Nombre</label>
        <input type="text" name="nombremenuds" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">Ingrese el Nombre del Menú</div>
       </div>
       <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Nombre general</label>
      <input type="text" name="nombregeneral" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">Ingrese el nombre general del menú</div>
      </div>
      <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Url Imagen</label>
      <input type="text" name="imagenurl" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">Ingrese la url de la imagen</div>
      </div>
      <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Formulario</label>
      <?php
        $conexion = new db();
        echo($conexion->configurar_lista(8,null,'tipomenu',null));
      ?>
      <div id="emailHelp" class="form-text">Ingrese el tipo menú</div>
      </div>
      <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Activo</label>
      <input  class="form-check-input" type="checkbox" role="switch" aria-describedby="emailHelp" name="activo" value="1">
      <div id="emailHelp" class="form-text">Ingrese si está activo</div>
      </div>
      <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Menú principal</label>
      <input  class="form-check-input" type="checkbox" role="switch" aria-describedby="emailHelp" name="menuprincipal" value="1">
      <div id="emailHelp" class="form-text">Ingrese si es menú principal</div>
      </div>
      <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Front End</label>
      <input  class="form-check-input" type="checkbox" role="switch" aria-describedby="emailHelp" name="frontend" value="1">
      <div id="emailHelp" class="form-text">Ingrese si es: Front End</div>
      </div>
      <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Back End</label>
      <input  class="form-check-input" type="checkbox" role="switch" aria-describedby="emailHelp" name="backend" value="1">
      <div id="emailHelp" class="form-text">Ingrese si es: Back End</div>
      </div>
            <button type="submit" class="btn btn-primary">Guardar Menú</button>
            <a class="btn btn-danger" href="/proyecto/view/configuracion/adma_menu_h/index.php"> Cancelar </a>
        </form>
    </div>
    </section><!-- End About Section -->
<?php
      require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/fooder.php");
?>