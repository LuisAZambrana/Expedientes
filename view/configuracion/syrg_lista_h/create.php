<?php
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/head.php");
?>
<section id="listas" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Listas</h2>
          <p>Cargar una Lista</p>
          <?php echo( $_SERVER['DOCUMENT_ROOT']."/proyecto/view/head/head.php"); ?>
        </div>
        <form action="store.php" method="POST" autocomplet="off">
        <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">ListaId</label>
        <input type="text" name="listaid" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">Ingrese el Id de la Lista</div>
       </div>
       <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Nombre de Lista</label>
      <input type="text" name="listads" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">Ingrese el nombre de la lista</div>
      </div>
      <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">RecordSource</label>
      <input type="text" name="recordsource" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">Ingrese RecordSource</div>
      </div>
      <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Lista Fija</label>
      <input  class="form-check-input" type="checkbox" role="switch" aria-describedby="emailHelp" name="listafija" value="1">
      <div id="emailHelp" class="form-text">Ingrese si es Lista fija</div>
      </div>
      <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Tipo Consulta</label>
          <label class="input-group-text" for="inputGroupSelect01">Tipo</label>
            <select class="form-select" id="inputGroupSelect01" name="tipoconsultaid">
              <option selected>Ninguno...</option>
              <option value="1">MySQL</option>
              <option value="2">Oracle</option>
              <option value="3">SQL Server</option>
            </select>
            <div id="emailHelp" class="form-text">Ingrese el tipo de conexión</div>
      </div>
      <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Tipo Dato</label>
          <label class="input-group-text" for="inputGroupSelect01">Tipo</label>
            <select class="form-select" id="inputGroupSelect01" name="tipodatovaluemember">
              <option selected>Ninguno...</option>
              <option value="1">Int</option>
              <option value="2">String</option>
            </select>
            <div id="emailHelp" class="form-text">Ingrese el tipo de dato</div>
      </div>
      <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Imagen</label>
      <input  class="form-check-input" type="checkbox" role="switch" aria-describedby="emailHelp" name="imagen" value="1">
      <div id="emailHelp" class="form-text">Ingrese si tiene imagen</div>
      </div>
      <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Grupo</label>
      <input type="text" name="grupo" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">Ingrese Grupo</div>
      </div>

            <button type="submit" class="btn btn-primary">Guardar Lista</button>
            <a class="btn btn-danger" href="/proyecto/index.php#listas"> Cancelar </a>
        </form>
    </div>
    </section><!-- End About Section -->
<?php
      require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/fooder.php");
?>