<?php
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/head.php");
     $obj= new db();
     $sql="SELECT * FROM tbl_member WHERE id=".$_GET['id'];
     $date= $obj->fcGetSQL($sql,1,2);

?>
<section id="items" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Cargar Roles al Usuario</h2>
          <p>Cargar un Rol</p>
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
          <label for="exampleInputEmail1" class="form-label">Roles</label>
        <?php
         $objecto = new db();
         echo($objecto->configurar_lista(6,null,'rolid',null));
        ?>
        <div id="emailHelp" class="form-text">Ingrese Rol</div>
        </div>
        
            <button type="submit" class="btn btn-primary">Guardar Rol</button>
            <a class="btn btn-danger" href=<? echo("/proyecto/view/seguridad/sema_usuario_i0/index.php?id=".$_GET['id']); ?>> Cancelar </a>
        </form>
    </div>
    </section><!-- End About Section -->
<?php
      require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/fooder.php");
?>