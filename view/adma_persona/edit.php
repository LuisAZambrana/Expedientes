<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/head/head.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/controller/adma_persona_controller.php");
    $obj= new adma_persona_controller();
    $date = $obj->show($_GET['id']);
?>
<section id="personas" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Personas</h2>
          <p>Cargar, editar y borrar una persona</p>
        </div>
        <form action="update.php" method="POST" autocomplete="off"> 
            <h2> Modificación de una persona </h2>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Id</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="personaid" name="personaid" value="<?= $date[0] ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $date[1] ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Apellido</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="apellido" name="apellido" value="<?= $date[2] ?>">
                </div>
            </div>
            <div>
                <input type="submit" class="btn btn-success" value="Actualizar">
                <a href="show.php?id=<?= $date[0] ?>" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
      </div>
    </section><!-- End About Section -->
<?php
      require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/head/fooder.php");
?>
