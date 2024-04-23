<?php
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/head/head.php");
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/controller/adma_persona_i0_controller.php");
     $obj= new adma_persona_i0_controller();
     $date = $obj->show($_GET['id']);
?>
<section id="personas" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Personas</h2>
          <p>Cargar información de una persona</p>
        </div>
<form action="store.php" method="POST" autocomplet="off">
  <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Id</label>
        <div class="col-sm-10">
        <input type="text" readonly class="form-control-plaintext fw-bold" id="nombre" name="personaid" value="<?= $date[0] ?>">
        </div>
    </div>  
    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Apellido y Nombre</label>
        <div class="col-sm-10">
        <input type="text" readonly class="form-control-plaintext fw-bold" id="nombre" name="nombre" value="<?= $date[2] .", ".$date[1]  ?>">
        </div>
    </div>  
      <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Fecha de Nacimiento</label>
      <input type="date" name="fecha_nacimiento" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">Ingrese fecha de nacimiento de la persona</div>
      </div>
      <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Tipo de Identificación</label>
          <label class="input-group-text" for="inputGroupSelect01">Tipo</label>
            <select class="form-select" id="inputGroupSelect01" name="tipo_identificacionid">
              <option selected>Ninguno...</option>
              <option value="1">DNI</option>
              <option value="2">LE</option>
              <option value="3">PS</option>
            </select>
            <div id="emailHelp" class="form-text">Ingrese el tipo de identificacion de la persona</div>
      </div>
      <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">N° de identificación</label>
      <input type="text" name="identificacionid" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">Ingrese número de indentificación</div>
      </div>
      <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Genero</label>
      <label class="input-group-text" for="inputGroupSelect02">Tipo</label>
            <select class="form-select" id="inputGroupSelect02" name="sexoid">
              <option selected>Ninguno...</option>
              <option value="1">Masculino</option>
              <option value="2">Femenino</option>
              <option value="3">X</option>
            </select>
      <div id="emailHelp" class="form-text">Ingrese el Género</div>
      </div>
      <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Cuil</label>
      <input type="text" name="cuil" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">Ingrese el C.U.I.L de la persona</div>
      </div>
      <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Estado civil</label>
      <label class="input-group-text" for="inputGroupSelect01">Tipo</label>
            <select class="form-select" id="inputGroupSelect01" name="estado_civil">
              <option selected>Ninguno...</option>
              <option value="1">Soltero</option>
              <option value="2">Casado</option>
              <option value="3">Divorsiado</option>
              <option value="4">Viudo</option>
            </select>
      <div id="emailHelp" class="form-text">Ingrese el estado civil de la persona</div>
      </div>
      <button type="submit" class="btn btn-primary">Guardar datos de la persona</button>
      <a class="btn btn-danger" href="/proyecto/index.php#personas"> Cancelar </a>
</form>
</div>
    </section><!-- End About Section -->
<?php
      require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/head/fooder.php");
?>