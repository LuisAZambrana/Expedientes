<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/registracion/head/head.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
    $obj= new db();
    $sql="SELECT * FROM sema_objeto_h WHERE  objetoid =".$_GET['id'];
    $date = $obj->fcGetSQL($sql,true,2);
  
?>
<section id="objeto" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
        <h2>Destino</h2>
          <p>Modificar o borrar el destino para el Expediente</p>
        </div>
        <form action="update.php" method="POST" autocomplete="off"> 
            <h2> Modificación de un Objeto </h2>
            <div class="mb-3 row" >
        <label for="staticEmail" class="col-sm-2 col-form-label">Id</label>
        <div class="col-sm-10">
        <input type="text" readonly class="form-control-plaintext fw-bold" id="borradorid" name="borradorid" value="<?= $_GET['id'] ?>">
        </div>
      <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Tipo destino</label>
      <?php
        $conexion = new db();
        echo($conexion->configurar_lista(14,null,'tipodestinoid',$date['tipodestinoid']));
      ?>
      <div id="emailHelp" class="form-text">Tipo destino</div>
      </div>
      <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Usuario destino</label>
      <?php
        $conexion = new db();
        echo($conexion->configurar_lista(15,null,'personaid_destino',$date['personaid_destino']));
      ?>
      <div id="emailHelp" class="form-text">Ingrese el usuario</div>
      </div>
      <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Sector destino</label>
      <?php
        $conexion = new db();
        echo($conexion->configurar_lista(10,null,'sectorid_destino',$date['sectorid_destino']));
      ?>
      <div id="emailHelp" class="form-text">Ingrese el sector destino</div>
      </div>
      

    <div>
        <input type="submit" class="btn btn-success" value="Actualizar">
        <a href="show.php?id=<?= $date['destinoid'] ?>" class="btn btn-danger">Cancelar</a>
    </div>
</form>
      </div>
    </section><!-- End About Section -->

<?php
      require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/fooder.php");
?>