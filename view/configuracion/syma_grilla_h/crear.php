<?php
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/head.php");
?>
<section id="grillas" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Grillas</h2>
          <p>Cargar una Grilla</p>
          <?php echo( $_SERVER['DOCUMENT_ROOT']."/proyecto/view/head/head.php"); ?>
        </div>
        <form action="store.php" method="POST" autocomplet="off">
        <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">GrillaId</label>
        <input type="text" name="grillaid" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">Ingrese el Id de la Grilla</div>
      </div>
      <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Tipo de consulta</label>
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
      <label for="exampleInputEmail1" class="form-label">KeyFieldName</label>
      <input type="text" name="keyfieldname" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">Ingrese la clave de la tabla</div>
      </div>
      <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Tabla</label>
      <input type="text" name="tabla" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">Ingrese nombre de tabla</div>
      </div>
      <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Query</label>
      <input type="text" name="querys" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">Ingrese la consulta</div>
      </div>
      <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">ShowGroupedColumns</label>
      <input  class="form-check-input" type="checkbox" role="switch" aria-describedby="emailHelp" name="showgroupedcolumns" value="1">
      <div id="emailHelp" class="form-text">Ingrese si desea agrupar</div>
      </div>
      <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">ShowGroupPanel</label>
      <input  class="form-check-input" type="checkbox" role="switch" aria-describedby="emailHelp" name="showgrouppanel" value="1">
      <div id="emailHelp" class="form-text">Ingrese si desea activar el panel</div>
      </div>
      <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">ShowAutoFilterRow</label>
      <input  class="form-check-input" type="checkbox" role="switch" aria-describedby="emailHelp" name="showautofilterrow" value="1">
      <div id="emailHelp" class="form-text">Ingrese si desea activar el filtro</div>
      </div>
      <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Grupo</label>
      <input type="text" name="grupo" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">Agrupamiento</div>
      </div>
      <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">ShowSession</label>
      <input  class="form-check-input" type="checkbox" role="switch" aria-describedby="emailHelp" name="showsession" value="1">
      <div id="emailHelp" class="form-text">Mostras por usuarios</div>
      </div>
      <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">ShowSector</label>
      <input  class="form-check-input" type="checkbox" role="switch" aria-describedby="emailHelp" name="showsector" value="1">
      <div id="emailHelp" class="form-text">Mostrar por sector</div>
      </div>

            <button type="submit" class="btn btn-primary">Guardar Grilla</button>
            <a class="btn btn-danger" href="/proyecto/index.php#grillas"> Cancelar </a>
        </form>
    </div>
    </section><!-- End About Section -->
<?php
      require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/fooder.php");
?>