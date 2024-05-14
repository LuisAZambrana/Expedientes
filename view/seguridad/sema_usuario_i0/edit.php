<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/seguridad/head/head.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
    $obj= new db();
    $sql="SELECT * FROM sema_usuario_i0 WHERE  asociacionid =".$_GET['id'];
    $date = $obj->fcGetSQL($sql,true,2);
  
?>
<section id="roles" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Roles de usuarios</h2>
          <p>Cargar, editar y borrar un rol de usuario</p>
        </div>
        <form action="update.php" method="POST" autocomplete="off"> 
            <h2> Modificación de un item </h2>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">AsociacionId</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext fw-bold" id="nombre" name="asociacionid" value="<?= $date['asociacionid'] ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">PersonaId</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext fw-bold" id="nombre" name="personaid" value="<?= $date['personaid'] ?>">
                </div>
            </div>
            <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Roles</label>
            <?php
             $objecto = new db();
             echo($objecto->configurar_lista(6,null,'rolid',$date['rolid']));
            ?>
            <div id="emailHelp" class="form-text">Ingrese Rol</div>
            </div>
    <div>
        <input type="submit" class="btn btn-success" value="Actualizar">
        <a href="show.php?id=<?= $objecto->codificar_valor($date['asociacionid'],1) ?>" class="btn btn-danger">Cancelar</a>
    </div>
</form>
      </div>
    </section><!-- End About Section -->

<?php
      require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/fooder.php");
?>