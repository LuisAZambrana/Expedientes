<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/seguridad/head/head.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
    $obj= new db();
    $sql="SELECT * FROM sema_rol_h WHERE  rolid =".$_GET['id'];
    $date = $obj->fcGetSQL($sql,true,2);
  
?>
<section id="objeto" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Objeto</h2>
          <p>Cargar, editar y borrar un objeto</p>
        </div>
        <form action="update.php" method="POST" autocomplete="off"> 
            <h2> Modificación de un Objeto </h2>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">RolId</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext fw-bold" id="objetoid" name="rolid" value="<?= $date['rolid'] ?>">
                </div>
            </div>
            
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">Nombre del Rol</label>
            <input type="text" name="rolds" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $date['rolds'] ?>">
            <div id="emailHelp" class="form-text">Nombre del Rol</div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">Activo</label>
            <input  class="form-check-input" type="checkbox" role="switch" aria-describedby="emailHelp" name="activo"  <?= ($date['activo']== 1)? "checked":"unchecked" ?>>
            <div id="emailHelp" class="form-text">Mostrar agrupamiento de columnas</div>
            </div>
    <div>
        <input type="submit" class="btn btn-success" value="Actualizar">
        <a href="show.php?id=<?= $date['rolid'] ?>" class="btn btn-danger">Cancelar</a>
    </div>
</form>
      </div>
    </section><!-- End About Section -->

<?php
      require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/seguridad/head/fooder.php");
?>