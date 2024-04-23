<?php
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/seguridad/head/head.php");
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
?> 
<section id="menu" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Permisos</h2>
          <p>Crear un permiso</p>
          
        </div>
        <form action="store.php" method="POST" autocomplet="off">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Objeto</label>
        <?php
         $objecto = new db();
         echo($objecto->configurar_lista(5,null,'objetoid',null));
        ?>
        <div id="emailHelp" class="form-text">Ingrese el objeto</div>
      </div>
      <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Rol</label>
        <?php
         echo($objecto->configurar_lista(6,null,'rolid',null));
        ?>
        <div id="emailHelp" class="form-text">Ingrese el rol</div>
      </div>
      <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Acción</label>
        <?php
         echo($objecto->configurar_lista(7,null,'accionid',null));
        ?>
        <div id="emailHelp" class="form-text">Ingrese la Acción</div>
      </div>
      <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Activo</label>
      <input  class="form-check-input" type="checkbox" role="switch" aria-describedby="emailHelp" name="activo" value="1">
      <div id="emailHelp" class="form-text">Activo</div>
      </div>
      
            <button type="submit" class="btn btn-primary">Guardar Permiso</button>
            <a class="btn btn-danger" href="/proyecto/view/seguridad/serg_permisos_h/index.php"> Cancelar </a>
        </form>
    </div>
    </section><!-- End About Section -->
<?php
      require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/seguridad/head/fooder.php");
?>