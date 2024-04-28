<?php
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/maestros/head/head.php");
?>

<section id="sector" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Crear Borrador</h2>
          <p>Generar un nuevo borrador</p>
        </div>
        <form action="store.php" method="POST" autocomplet="off">
        <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Asunto</label>
        <input type="text" name="asunto" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">Ingrese el asunto</div>
       </div>
       <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Mensaje</label>
        <textarea  name="cuerpo" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" rows="3"></textarea>
        <div id="emailHelp" class="form-text">Ingrese el asunto</div>
       </div>
     
            <button type="submit" class="btn btn-primary">Guardar borrador</button>
            <a class="btn btn-danger" href="/proyecto/view/registracion/expediente/index.php"> Cancelar </a>
        </form>
    </div>
    </section><!-- End About Section -->
<?php
      require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/registracion/head/fooder.php");
?>