<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/head.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
    $obj= new db();
    $sql="SELECT * FROM syrg_lista_i0 WHERE  listaitemid =".$_GET['id'];
    $date = $obj->fcGetSQL($sql,true,2);
  
?>
<section id="columnas" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Items de Lista</h2>
          <p>Cargar, editar y borrar un item de lista</p>
        </div>
        <form action="update.php" method="POST" autocomplete="off"> 
            <h2> Modificación de un item </h2>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">ListaItemId</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext fw-bold" id="nombre" name="listaitemid" value="<?= $date['listaitemid'] ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">ListaId</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext fw-bold" id="nombre" name="listaid" value="<?= $date['listaid'] ?>">
                </div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">CampoId</label>
            <input type="text" name="campoid" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $date['campoid'] ?>">
            <div id="emailHelp" class="form-text">Ingrese el caption</div>
            </div>
              
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">Caption</label>
            <input type="text" name="caption" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $date['caption'] ?>">
            <div id="emailHelp" class="form-text">Ingrese el caption</div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">Width</label>
            <input type="text" name="width" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $date['width'] ?>">
            <div id="emailHelp" class="form-text">Width</div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">ValueMember</label>
            <input  class="form-check-input" type="checkbox" role="switch" aria-describedby="emailHelp" name="valuemember"  <?= ($date['valuemember']== 1)? "checked":"unchecked" ?>>
            <div id="emailHelp" class="form-text">ValueMember</div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">DisplayMember</label>
            <input  class="form-check-input" type="checkbox" role="switch" aria-describedby="emailHelp" name="displaymember"  <?= ($date['displaymember']== 1)? "checked":"unchecked" ?>>
            <div id="emailHelp" class="form-text">DisplayMember</div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">Visible</label>
            <input  class="form-check-input" type="checkbox" role="switch" aria-describedby="emailHelp" name="visible"  <?= ($date['visible']== 1)? "checked":"unchecked" ?>>
            <div id="emailHelp" class="form-text">Columna visible</div>
            </div>   
    <div>
        <input type="submit" class="btn btn-success" value="Actualizar">
        <a href="show.php?id=<?= $date['listaitemid'] ?>" class="btn btn-danger">Cancelar</a>
    </div>
</form>
      </div>
    </section><!-- End About Section -->

<?php
      require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/fooder.php");
?>