<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/seguridad/head/head.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
    $obj= new db();
    $sql="SELECT * FROM serg_permisos_h WHERE  permisoid =".$_GET['id'];
    $date = $obj->fcGetSQL($sql,true,2);
  
?>
<section id="objeto" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Permisos</h2>
          <p>Cargar, editar y borrar un permiso</p>
        </div>
        <form action="update.php" method="POST" autocomplete="off"> 
            <h2> Modificación de un permiso </h2>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">PermisoId</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext fw-bold" id="permisoid" name="permisoid" value="<?= $date['permisoid'] ?>">
                </div>
            </div>  
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Objeto</label>
                <?php
                $objecto = new db();
                echo($objecto->configurar_lista(5,null,'objetoid',$date['objetoid']));
                ?>
            <div id="emailHelp" class="form-text">Ingrese el objeto</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Rol</label>
                <?php
                $objecto = new db();
                echo($objecto->configurar_lista(6,null,'rolid',$date['rolid']));
                ?>
            <div id="emailHelp" class="form-text">Ingrese el Objeto</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Acción</label>
                <?php
                $objecto = new db();
                echo($objecto->configurar_lista(7,null,'accionid',$date['accionid']));
                ?>
            <div id="emailHelp" class="form-text">Ingrese el Acción</div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">Activo</label>
            <input  class="form-check-input" type="checkbox" role="switch" aria-describedby="emailHelp" name="activo"  <?= ($date['activo']== 1)? "checked":"unchecked" ?>>
            <div id="emailHelp" class="form-text">Activo</div>
            </div>
    <div>
        <input type="submit" class="btn btn-success" value="Actualizar">
        <a href="show.php?id=<?= $date['permisoid'] ?>" class="btn btn-danger">Cancelar</a>
    </div>
</form>
      </div>
    </section><!-- End About Section -->

<?php
      require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/seguridad/head/fooder.php");
?>