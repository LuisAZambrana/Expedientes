<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/head.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
    $obj= new db();
    $sql="SELECT * FROM adma_menu_i0 WHERE  itemmenuid =".$_GET['id'];
    $date = $obj->fcGetSQL($sql,true,2);
  
?>
<section id="itemsmenu" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Items de Lista</h2>
          <p>Cargar, editar y borrar un item del Menú</p>
        </div>
        <form action="update.php" method="POST" autocomplete="off"> 
            <h2> Modificación de un item </h2>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">ItemMenuId</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext fw-bold" id="nombre" name="itemmenuid" value="<?= $date['itemmenuid'] ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">MenuId</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext fw-bold" id="nombre" name="menuid" value="<?= $date['menuid'] ?>">
                </div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">FormularioId</label>
            <input type="text" name="formularioid" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $date['formularioid'] ?>">
            <div id="emailHelp" class="form-text">FormularioId</div>
            </div>
              
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">Text</label>
            <input type="text" name="text" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $date['text'] ?>">
            <div id="emailHelp" class="form-text">Text</div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">NavigateUrl</label>
            <input type="text" name="navigateurl" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $date['navigateurl'] ?>">
            <div id="emailHelp" class="form-text">NavigateUrl</div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">Imagen</label>
            <input  class="form-check-input" type="checkbox" role="switch" aria-describedby="emailHelp" name="imagen" value="1"  <?= ($date['imagen']== 1)? "checked":"unchecked" ?>>
            <div id="emailHelp" class="form-text">Imagen</div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">ImageUrl</label>
            <input type="text" name="imageurl" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $date['imageurl'] ?>">
            <div id="emailHelp" class="form-text">ImageUrl</div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">PermiteGif </label>
            <input  class="form-check-input" type="checkbox" role="switch" aria-describedby="emailHelp" name="permitegif" value="1" <?= ($date['permitegif']== 1)? "checked":"unchecked" ?>>
            <div id="emailHelp" class="form-text">PermiteGif</div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">ImagenGif</label>
            <input type="text" name="imagengif" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $date['imagengif'] ?>">
            <div id="emailHelp" class="form-text">ImagenGif</div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">TipoFuncion</label>
            <input type="text" name="tipofuncion" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $date['tipofuncion'] ?>">
            <div id="emailHelp" class="form-text">TipoFuncion</div>
            </div>
          
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">FuncionAsociadaGif</label>
            <input type="text" name="funcionasociadagif" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $date['funcionasociadagif'] ?>">
            <div id="emailHelp" class="form-text">FuncionAsociadaGif</div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">Grupo</label>
            <input type="text" name="grupo" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $date['grupo'] ?>">
            <div id="emailHelp" class="form-text">Grupo</div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">Orden</label>
            <input type="text" name="orden" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $date['orden'] ?>">
            <div id="emailHelp" class="form-text">Orden</div>
            </div>
    <div>
        <input type="submit" class="btn btn-success" value="Actualizar">
        <a href="show.php?id=<?= $date['menuid'] ?>" class="btn btn-danger">Cancelar</a>
    </div>
</form>
      </div>
    </section><!-- End About Section -->

<?php
      require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/fooder.php");
?>