<?php
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/head.php");
?>
<section id="formulario" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Formulario</h2>
          <p>Cargar un Formulario</p>
        </div>
        <form action="store.php" method="POST" autocomplet="off">
        <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">FormularioId</label>
        <input type="text" name="formularioid" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">FormularioId</div>
       </div>
       <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">DtSetId</label>
      <input type="text" name="dtsetid" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">DtSetId</div>
      </div>
      <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Tipo de formulario</label>
        <?php
         $objecto = new db();
         echo($objecto->configurar_lista(4,null,'tipoformulario',null));
        ?>
        <div id="emailHelp" class="form-text">Ingrese el tipo de formulario</div>
      </div>
      <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">NameFormulario</label>
      <input type="text" name="nameformulario" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">NameFormulario</div>
      </div>
      <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Alto</label>
      <input type="text" name="alto" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">Alto</div>
      </div>
      <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Ancho</label>
      <input type="text" name="ancho" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">Ancho</div>
      </div>
      <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Unidad Alto</label>
      <input type="text" name="unidad_alto" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">Ancho</div>
      </div>
      <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Unidad Ancho</label>
      <input type="text" name="unidad_ancho" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">Ancho</div>
      </div>
      <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">ReporteId</label>
      <input type="text" name="reporteid" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">ReporteId</div>
      </div>
      <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">BusquedaId</label>
      <input type="text" name="busquedaid" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">BusquedaId</div>
      </div>

            <button type="submit" class="btn btn-primary">Guardar Formulario</button>
            <a class="btn btn-danger" href="/proyecto/view/configuracion/syrg_formulario_h/index.php"> Cancelar </a>
        </form>
    </div>
    </section><!-- End About Section -->
<?php
      require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/fooder.php");
?>