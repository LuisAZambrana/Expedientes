<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/head.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
    $obj= new db();
    $sql="SELECT * FROM adma_menu_h WHERE  menuhorizontalid =".$_GET['id'];
    $date = $obj->fcGetSQL($sql,true,2);
  
?>
<section id="menu" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Meú</h2>
          <p>Cargar, editar y borrar un menú</p>
        </div>
        <form action="update.php" method="POST" autocomplete="off"> 
            <h2> Modificación de un Menú </h2>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">MenuId</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext fw-bold" id="menuhorizontalid" name="menuhorizontalid" value="<?= $date['menuhorizontalid'] ?>">
                </div>
            </div>
            
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">Nombre del Menú</label>
            <input type="text" name="nombremenuds" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $date['nombremenuds'] ?>">
            <div id="emailHelp" class="form-text">Ingrese el nombre del menú</div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">Nombre General</label>
            <input type="text" name="nombregeneral" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $date['nombregeneral'] ?>">
            <div id="emailHelp" class="form-text">Record Source</div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">Imagen Url</label>
            <input type="text" name="imagenurl" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $date['imagenurl'] ?>">
            <div id="emailHelp" class="form-text">Imagen Url</div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">Formulario</label>
            <?php
                echo($obj->configurar_lista(8,null,'tipomenu',$date['tipomenu']));
            ?>
            <div id="emailHelp" class="form-text">Formulario</div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">Activo</label>
            <input  class="form-check-input" type="checkbox" role="switch" aria-describedby="emailHelp" name="activo" value="1" <?= ($date['activo']== 1)? "checked":"unchecked" ?>>
            <div id="emailHelp" class="form-text">Activo</div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">Menú principal</label>
            <input  class="form-check-input" type="checkbox" role="switch" aria-describedby="emailHelp" name="menuprincipal" value="1" <?= ($date['menuprincipal']== 1)? "checked":"unchecked" ?>>
            <div id="emailHelp" class="form-text">Menú principal</div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">Front End </label>
            <input  class="form-check-input" type="checkbox" role="switch" aria-describedby="emailHelp" name="frontend" value="1" <?= ($date['frontend']== 1)? "checked":"unchecked" ?>>
            <div id="emailHelp" class="form-text">Front End</div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">Back End </label>
            <input  class="form-check-input" type="checkbox" role="switch" aria-describedby="emailHelp" name="backend" value="1" <?= ($date['backend']== 1)? "checked":"unchecked" ?>>
            <div id="emailHelp" class="form-text">Back End</div>
            </div>

                <div>
        <input type="submit" class="btn btn-success" value="Actualizar">
        <a href="show.php?id=<?= $date['menuhorizontalid'] ?>" class="btn btn-danger">Cancelar</a>
    </div>
</form>
      </div>
    </section><!-- End About Section -->

<?php
      require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/fooder.php");
?>