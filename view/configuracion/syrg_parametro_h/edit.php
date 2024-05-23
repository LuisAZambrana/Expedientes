<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/head.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
    $obj= new db();
    $sql="SELECT * FROM syrg_parametro_h WHERE  parametroid =".$_GET['id'];
    $date = $obj->fcGetSQL($sql,true,2);
  
?>
<section id="formulario" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Parametros</h2>
          <p>Cargar, editar y borrar un parametro.</p>
        </div>
        <form action="update.php" method="POST" autocomplete="off"> 
            <h2> Modificación de un Parametro </h2>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">ParametroId</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext fw-bold" id="parametroid" name="parametroid" value="<?= $date['parametroid'] ?>">
                </div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">Parametro</label>
            <input type="text" name="parametrods" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $date['parametrods'] ?>">
            <div id="emailHelp" class="form-text">Ingrese nombre parametro</div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">Valor</label>
            <input type="text" name="valor" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $date['valor'] ?>">
            <div id="emailHelp" class="form-text">Valor</div>
            </div>

           

    <div>
        <input type="submit" class="btn btn-success" value="Actualizar">
        <a href="show.php?id=<?= $obj->codificar_valor($date['parametroid'],1) ?>" class="btn btn-danger">Cancelar</a>
    </div>
</form>
      </div>
    </section><!-- End About Section -->

<?php
      require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/fooder.php");
?>