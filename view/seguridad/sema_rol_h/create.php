<?php
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/seguridad/head/head.php");
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
?> 
<section id="menu" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Roles</h2>
          <p>Crear un Rol</p>
          
        </div>
        <form action="store.php" method="POST" autocomplet="off">
       <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Nombre Rol</label>
      <input type="text" name="rolds" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">Nombre Rol</div>
      </div>
      <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Activo</label>
      <input  class="form-check-input" type="checkbox" role="switch" aria-describedby="emailHelp" name="activo" value="1">
      <div id="emailHelp" class="form-text">Activo</div>
      </div>
      
            <button type="submit" class="btn btn-primary">Guardar Rol</button>
            <a class="btn btn-danger" href="/proyecto/view/configuracion/sema_rol_h/index.php"> Cancelar </a>
        </form>
    </div>
    </section><!-- End About Section -->
<?php
      require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/fooder.php");
?>