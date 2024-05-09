<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/registracion/head/head.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
    $obj= new db();
    $sql="SELECT * FROM adrg_borrador_h WHERE  borradorid =".$_GET['id'];
    $date = $obj->fcGetSQL($sql,true,2);
  
?>
<section id="sector" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Borrador</h2>
          <p>Editar un borrador</p>
        </div>
        <form action="update.php" method="POST" autocomplete="off"> 
            <h2> Modificación del borrador </h2>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Id</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext fw-bold" id="sectorid" name="borradorid" value="<?= $date['borradorid'] ?>">
                </div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">Asunto</label>
            <input type="text" name="asunto" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $date['asunto'] ?>">
            <div id="emailHelp" class="form-text">Asunto</div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">Cuerpo</label>
            <textarea  name="cuerpo" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" rows="3" ><?= $date['cuerpo'] ?></textarea>
            <div id="emailHelp" class="form-text">Cuerpo</div>
            </div>
         

    <div>
        <input type="submit" class="btn btn-success" value="Actualizar">
        <a href="show.php?id=<?= $obj->codificar_valor($date['borradorid'],1) ?>" class="btn btn-danger">Cancelar</a>
    </div>
</form>
      </div>
    </section><!-- End About Section -->

<?php
      require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/fooder.php");
?>