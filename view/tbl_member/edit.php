<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/head/head.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/controller/tbl_member_controller.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
    $db = new db();
    $obj= new tbl_member_controller();
    $date = $obj->show($_GET['id']);
?>
<section id="usuarios" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Administración de Usuarios</h2>
          <p>Cargar, editar y borrar un usuario</p>
        </div>
        <form action="update.php" method="POST" autocomplete="off"> 
            <h2> Modificación de usuario </h2>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Id</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="id" name="id" value="<?= $date[0] ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Nombre de usuario</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nombre" name="username" value="<?= $date[1] ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nombre" name="name" value="<?= $date[2] ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" name="password">
                </div>
            </div>
           
                <input type="submit" class="btn btn-success" value="Actualizar">
                <a href="show.php?id=<?= $db->codificar_valor($date[0],1) ?>" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
      </div>
    </section><!-- End About Section -->
<?php
      require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/head/fooder.php");
?>
