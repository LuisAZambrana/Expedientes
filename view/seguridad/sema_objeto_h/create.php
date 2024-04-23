<?php
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/seguridad/head/head.php");
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
?> 
<section id="menu" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Objeto</h2>
          <p>Crear un Objecto</p>
          <?php echo( $_SERVER['DOCUMENT_ROOT']."/proyecto/view/head/head.php"); ?>
        </div>
        <form action="store.php" method="POST" autocomplet="off">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Tipo de objeto</label>
        <?php
         $objecto = new db();
         echo($objecto->configurar_lista(4,null,'tipoobjetoid',null));
        ?>
        <div id="emailHelp" class="form-text">Ingrese el tipo de objeto</div>
      </div>
       <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Nombre Objeto</label>
      <input type="text" name="nombreobjetods" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">Nombre Objeto</div>
      </div>
      <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">FormularioId</label>
      <input type="text" name="formularioid" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">FormularioId</div>
      </div>
      <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">MenuId</label>
      <input type="text" name="menuid" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">MenuId</div>
      </div>
            <button type="submit" class="btn btn-primary">Guardar Objeto</button>
            <a class="btn btn-danger" href="/proyecto/view/seguridad/sema_objeto_h/index.php"> Cancelar </a>
        </form>
    </div>
    </section><!-- End About Section -->
<?php
      require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/fooder.php");
?>