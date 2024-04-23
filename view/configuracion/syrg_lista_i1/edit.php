<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/head.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
    $obj= new db();
    $sql="SELECT * FROM syrg_lista_i1 WHERE  listaitemid =".$_GET['id'];
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
            <label for="exampleInputEmail1" class="form-label">ValueMember</label>
            <input type="text" name="valuemember" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $date['valuemember'] ?>">
            <div id="emailHelp" class="form-text">ValueMember</div>
            </div>    
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">DisplayMember</label>
            <input type="text" name="displaymember" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $date['displaymember'] ?>">
            <div id="emailHelp" class="form-text">DisplayMember</div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">Predeterminado</label>
            <input  class="form-check-input" type="checkbox" role="switch" aria-describedby="emailHelp" name="predeterminado"  <?= ($date['predeterminado']== 1)? "checked":"unchecked" ?>>
            <div id="emailHelp" class="form-text">Predeterminado</div>
            </div>  
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">Imagen</label>
            <input type="text" name="imagen" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $date['imagen'] ?>">
            <div id="emailHelp" class="form-text">Width</div>
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