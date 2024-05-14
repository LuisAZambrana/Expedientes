<?php
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/seguridad/head/head.php");
     $obj= new db();
     $sql="SELECT * FROM tbl_member WHERE id=".$_GET['id'];
     $date= $obj->fcGetSQL($sql,1,2);

?>
<section id="sectores" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Cargar Sectores al Usuario</h2>
          <p>Cargar un sector</p>
        </div>
        <form action="store.php" method="POST" autocomplet="off">
        <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">UsuarioId</label>
        <div class="col-sm-10">
        <input type="text" readonly class="form-control-plaintext fw-bold" id="nombre" name="personaid" value="<?= $_GET['id'] ?>">
        </div>
        </div>
        <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Nombre Usuario</label>
        <div class="col-sm-10">
        <input type="text" readonly class="form-control-plaintext fw-bold" id="username" name="id" value="<?= $date['username'] ?>">
        </div>
        </div> 
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Sectores</label>
        <?php
         $objecto = new db();
         echo($objecto->configurar_lista(10,null,'sectorid',null));
        ?>
        <div id="emailHelp" class="form-text">Ingrese Sector</div>
        </div>
        <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Activo</label>
        <input  class="form-check-input" type="checkbox" role="switch" aria-describedby="emailHelp" name="activo" value="1">
        <div id="emailHelp" class="form-text">Activo</div>
        </div> 
            <button type="submit" class="btn btn-primary">Guardar Sector</button>
            <a class="btn btn-danger" href=<? echo("/proyecto/view/seguridad/sema_usuario_i1/index.php?id=".$objecto->codificar_valor($_GET['id'],1)); ?>> Cancelar </a>
        </form>
    </div>
    </section><!-- End About Section -->
<?php
      require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/seguridad/head/fooder.php");
?>