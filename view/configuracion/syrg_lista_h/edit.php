<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/head.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
    $obj= new db();
    $sql="SELECT * FROM syrg_lista_h WHERE  listaid =".$_GET['id'];
    $date = $obj->fcGetSQL($sql,true,2);
  
?>
<section id="Listas" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Grillas</h2>
          <p>Cargar, editar y borrar una lista</p>
        </div>
        <form action="update.php" method="POST" autocomplete="off"> 
            <h2> Modificación de una columna </h2>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Registro Id</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext fw-bold" id="registroid_h" name="registroid_h" value="<?= $date['registroid_h'] ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">ListaId</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext fw-bold" id="nombre" name="listaid" value="<?= $date['listaid'] ?>">
                </div>
            </div>  
              
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">Lista Nombre</label>
            <input type="text" name="listads" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $date['listads'] ?>">
            <div id="emailHelp" class="form-text">Ingrese el nombre de la lista</div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">Record Source</label>
            <input type="text" name="recordsource" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $date['recordsource'] ?>">
            <div id="emailHelp" class="form-text">Record Source</div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">Lista Fija </label>
            <input  class="form-check-input" type="checkbox" role="switch" aria-describedby="emailHelp" name="listafija" value="1" <?= ($date['listafija']== 1)? "checked":"unchecked" ?>>
            <div id="emailHelp" class="form-text">Lista Fija </div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">Tipo Consulta</label>
            <input type="text" name="tipoconsultaid" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $date['tipoconsultaid'] ?>">
            <div id="emailHelp" class="form-text">Tipo de consulta</div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">Tipo dato</label>
            <input type="text" name="tipodatovaluemember" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $date['tipodatovaluemember'] ?>">
            <div id="emailHelp" class="form-text">Tipo dato</div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">Imagen </label>
            <input  class="form-check-input" type="checkbox" role="switch" aria-describedby="emailHelp" name="imagen" value="1" <?= ($date['imagen']== 1)? "checked":"unchecked" ?>>
            <div id="emailHelp" class="form-text">Imagen </div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">Grupo</label>
            <input type="text" name="grupo" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $date['grupo'] ?>">
            <div id="emailHelp" class="form-text">Grupo</div>
            </div>
    <div>
        <input type="submit" class="btn btn-success" value="Actualizar">
        <a href="show.php?id=<?= $date['listaid'] ?>" class="btn btn-danger">Cancelar</a>
    </div>
</form>
      </div>
    </section><!-- End About Section -->

<?php
      require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/fooder.php");
?>