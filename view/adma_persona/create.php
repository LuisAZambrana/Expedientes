<?php
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/head/head.php");
?>
<section id="personas" class="about">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
                  <h2>Personas</h2>
                  <p>Cargar, editar y borrar una persona</p>
        </div>
            <form action="store.php" method="POST" autocomplet="off">
                  <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Nombre</label>
                  <input type="text" name="nombre" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  <div id="emailHelp" class="form-text">Ingrese el nombre de pila de la persona</div>
                  </div>
                  <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Apellido</label>
                  <input type="text" name="apellido"  required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                  <div id="emailHelp" class="form-text">Ingrese el apellido de la persona</div>
                  </div>
            
                  <button type="submit" class="btn btn-primary">Guardar persona</button>
                  <a class="btn btn-danger" href="/proyecto/view/adma_persona/index.php"> Cancelar </a>
            </form>
      </div>
    </section><!-- End About Section -->
<?php
      require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/head/fooder.php");
?>

     
