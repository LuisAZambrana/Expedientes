<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/maestros/head/head.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
    $obj= new db();
    $sql="SELECT * FROM adma_sector WHERE  sectorid =".$_GET['id'];
    $date = $obj->fcGetSQL($sql,true,2);
  
?>
<section id="sector" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Sectores</h2>
          <p>Cargar, editar y borrar un sector</p>
        </div>
        <form action="update.php" method="POST" autocomplete="off"> 
            <h2> Modificación de un Sector </h2>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">SectorId</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext fw-bold" id="sectorid" name="sectorid" value="<?= $date['sectorid'] ?>">
                </div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">Nombre del Sector</label>
            <input type="text" name="sectords" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $date['sectords'] ?>">
            <div id="emailHelp" class="form-text">Nombre del Sector</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tipo de Sector</label>
                <?php
                        $objecto = new db();
                        echo($objecto->configurar_lista(9,null,'tiposectorid',$date['tiposectorid']));
                ?>
                <div id="emailHelp" class="form-text">Ingrese el tipo de sector</div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">Activo</label>
            <input  class="form-check-input" type="checkbox" role="switch" aria-describedby="emailHelp" name="activo"  <?= ($date['activo']== 1)? "checked":"unchecked" ?>>
            <div id="emailHelp" class="form-text">Sector Activo</div>
            </div>

    <div>
        <input type="submit" class="btn btn-success" value="Actualizar">
        <a href="show.php?id=<?= $date['sectorid'] ?>" class="btn btn-danger">Cancelar</a>
    </div>
</form>
      </div>
    </section><!-- End About Section -->

<?php
      require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/fooder.php");
?>