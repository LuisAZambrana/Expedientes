<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/seguridad/head/head.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
    $obj= new db();
    $sql="SELECT * FROM sema_usuario_i1 WHERE  perteneceid =".$_GET['id'];
    $date = $obj->fcGetSQL($sql,true,2);
  
?>
<section id="sectores" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Sectores de usuarios</h2>
          <p>Cargar, editar y borrar un sector de usuario</p>
        </div>
        <form action="update.php" method="POST" autocomplete="off"> 
            <h2> Modificación de un item </h2>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">PertenceId</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext fw-bold" id="nombre" name="perteneceid" value="<?= $date['perteneceid'] ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">PersonaId</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext fw-bold" id="nombre" name="personaid" value="<?= $date['personaid'] ?>">
                </div>
            </div>
            <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Sectores</label>
            <?php
             $objecto = new db();
             echo($objecto->configurar_lista(10,null,'sectorid',$date['sectorid']));
            ?>
            <div id="emailHelp" class="form-text">Ingrese Sector</div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">Activo</label>
            <input  class="form-check-input" type="checkbox" role="switch" aria-describedby="emailHelp" name="activo"  <?= ($date['activo']== 1)? "checked":"unchecked" ?>>
            <div id="emailHelp" class="form-text">Activo</div>
            </div>
    <div>
        <input type="submit" class="btn btn-success" value="Actualizar">
        <a href="show.php?id=<?= $date['perteneceid'] ?>" class="btn btn-danger">Cancelar</a>
    </div>
</form>
      </div>
    </section><!-- End About Section -->

<?php
      require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/fooder.php");
?>