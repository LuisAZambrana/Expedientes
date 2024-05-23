<?php
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/head.php");
?>
<section id="formulario" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Parametros</h2>
          <p>Cargar un Parametro</p>
        </div>
        <form action="store.php" method="POST" autocomplet="off">
   
       <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Parametro</label>
      <input type="text" name="parametrods" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">Ingrese Parametro</div>
      </div>
  
      <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Valor</label>
      <input type="text" name="valor" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">Ingrese valor</div>
      </div>
      
    
          <button type="submit" class="btn btn-primary">Guardar Parametro</button>
            <a class="btn btn-danger" href="/proyecto/view/configuracion/syrg_parametro_h/index.php"> Cancelar </a>
        </form>
    </div>
    </section><!-- End About Section -->
<?php
      require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/fooder.php");
?>