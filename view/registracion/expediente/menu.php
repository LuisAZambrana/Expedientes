<?php
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/maestros/head/head.php");
?>
<section id="expediente" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Crear Nuevo Expediente</h2>
          <p>Generar un nuevo Expediente</p>
        </div>
        <form action="generar_expediente.php" method="POST" autocomplet="off">
        <div class="mb-3 row" >
        <label for="staticEmail" class="col-sm-2 col-form-label">Id</label>
        <div class="col-sm-10">
        <input type="text" readonly class="form-control-plaintext fw-bold" id="borradorid" name="borradorid" value="<?= $_GET['id'] ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Importancia</label>
            <?php
            $conexion = new db();
            echo($conexion->configurar_lista(16,null,'importanciaid',null));
            ?>
      <div id="emailHelp" class="form-text">Importancia</div>
      </div>
        <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Descripcion Expediente</label>
        <input type="text" name="descripcion" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">Ingrese breve descripcion</div>
       </div>
       <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Mensaje</label>
        <textarea  name="asunto" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" rows="3"></textarea>
        <div id="emailHelp" class="form-text">Ingrese el asunto</div>
       </div>
     <div>
     <button type="submit" class="btn btn-primary">Generar Expediente</button>
            <a class="btn btn-danger" href="/proyecto/view/registracion/expediente/index.php"> Cancelar </a>
    </div>
        
        </form>
    </div>
    </section><!-- End About Section -->
<?php
      require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/registracion/head/fooder.php");
?>