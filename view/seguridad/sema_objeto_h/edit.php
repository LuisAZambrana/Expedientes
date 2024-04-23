<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/head.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
    $obj= new db();
    $sql="SELECT * FROM sema_objeto_h WHERE  objetoid =".$_GET['id'];
    $date = $obj->fcGetSQL($sql,true,2);
  
?>
<section id="objeto" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Objeto</h2>
          <p>Cargar, editar y borrar un objeto</p>
        </div>
        <form action="update.php" method="POST" autocomplete="off"> 
            <h2> Modificación de un Objeto </h2>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">MenuId</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext fw-bold" id="objetoid" name="objetoid" value="<?= $date['objetoid'] ?>">
                </div>
            </div>
            <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Tipo de objeto</label>
            <?php
                $objecto = new db();
                echo($objecto->configurar_lista(4,null,'tipoobjetoid',$date['tipoobjetoid']));
            ?>
        <div id="emailHelp" class="form-text">Ingrese el tipo de objeto</div>
        </div>
            
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">Nombre de Objeto</label>
            <input type="text" name="nombreobjetods" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $date['nombreobjetods'] ?>">
            <div id="emailHelp" class="form-text">Ingrese el nombre del menú</div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">FormularioId</label>
            <input type="text" name="formularioid" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $date['formularioid'] ?>">
            <div id="emailHelp" class="form-text">Imagen Url</div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">MenuId</label>
            <input type="text" name="menuid" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $date['menuid'] ?>">
            <div id="emailHelp" class="form-text">Record Source</div>
            </div>
            
      

    <div>
        <input type="submit" class="btn btn-success" value="Actualizar">
        <a href="show.php?id=<?= $date['objetoid'] ?>" class="btn btn-danger">Cancelar</a>
    </div>
</form>
      </div>
    </section><!-- End About Section -->

<?php
      require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/fooder.php");
?>