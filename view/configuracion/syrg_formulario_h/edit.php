<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/head.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
    $obj= new db();
    $sql="SELECT * FROM syrg_formulario_h WHERE  formularioid =".$_GET['id'];
    $date = $obj->fcGetSQL($sql,true,2);
  
?>
<section id="formulario" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Grillas</h2>
          <p>Cargar, editar y borrar un formulario</p>
        </div>
        <form action="update.php" method="POST" autocomplete="off"> 
            <h2> Modificación de un Formulario </h2>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">FormularioId</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext fw-bold" id="formularioid" name="formularioid" value="<?= $date['formularioid'] ?>">
                </div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">DtSetId</label>
            <input type="text" name="dtsetid" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $date['dtsetid'] ?>">
            <div id="emailHelp" class="form-text">DtSetId</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tipo de formulario</label>
                <?php
                        $objecto = new db();
                        echo($objecto->configurar_lista(4,null,'tipoformulario',$date['tipoformulario']));
                ?>
                <div id="emailHelp" class="form-text">Ingrese el tipo de formulario</div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">NameFormulario</label>
            <input type="text" name="nameformulario" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $date['nameformulario'] ?>">
            <div id="emailHelp" class="form-text">NameFormulario</div>
            </div>

            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">Alto</label>
            <input type="text" name="alto" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $date['alto'] ?>">
            <div id="emailHelp" class="form-text">Alto</div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">Ancho</label>
            <input type="text" name="ancho" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $date['ancho'] ?>">
            <div id="emailHelp" class="form-text">Ancho</div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">Unidad Alto</label>
            <input type="text" name="unidad_alto" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $date['unidad_alto'] ?>">
            <div id="emailHelp" class="form-text">Unidad Alto</div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">Unidad Ancho</label>
            <input type="text" name="unidad_ancho" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $date['unidad_ancho'] ?>">
            <div id="emailHelp" class="form-text">Unidad Ancho</div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">ReporteId</label>
            <input type="text" name="reporteid" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $date['reporteid'] ?>">
            <div id="emailHelp" class="form-text">ReporteId</div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">BusquedaId</label>
            <input type="text" name="busquedaid" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $date['busquedaid'] ?>">
            <div id="emailHelp" class="form-text">BusquedaId</div>
            </div>

    <div>
        <input type="submit" class="btn btn-success" value="Actualizar">
        <a href="show.php?id=<?= $date['formularioid'] ?>" class="btn btn-danger">Cancelar</a>
    </div>
</form>
      </div>
    </section><!-- End About Section -->

<?php
      require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/fooder.php");
?>