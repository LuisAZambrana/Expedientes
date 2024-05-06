<?php
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/registracion/head/head.php");
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
     $db = new db();
     // archivo temporal (ruta y nombre).  
?> 
<section id="menu" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Persona asociada al Borrador</h2>
          <p>Cargar datos de la persona</p>
          
        </div>
        <form action="store.php" method="POST" autocomplet="off" enctype="multipart/form-data">
        
        <div class="mb-3 row" >
        <label for="staticEmail" class="col-sm-2 col-form-label">Borrador: </label>
        <div class="col-sm-10">
        <input type="text" readonly class="form-control-plaintext fw-bold" id="borradorid" name="borradorid" value="<?= $_GET['id'] ?>">
        </div>
       
       <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Nombre</label>
      <input type="text" name="nombre" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">Nombre</div>
      </div>
      <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Apellido</label>
      <input type="text" name="apellido" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">Nombre</div>
      </div>
      <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Tipo Identificación</label>
      <?php
        $conexion = new db();
        echo($conexion->configurar_lista(13,null,'tipoidentificacionid',null));
      ?>
      <div id="emailHelp" class="form-text">Tipo Identificación</div>
      </div>
      <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Identificación</label>
      <input type="text" name="identificacionid" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">Identificación</div>
      </div>
      <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">C.U.I.L</label>
      <input type="text" name="cuil" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">C.U.I.L</div>
      </div>
      <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Teléfono</label>
      <input type="text" name="telefono" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">Sin 0 en el código de area y sin 15.</div>
      </div>
      <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Dirección</label>
      <input type="text" name="direccion" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">Dirección</div>
      </div>
      <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">eMail</label>
      <input type="text" name="email" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">eMail</div>
      </div>
    
      <div class="mb-3">
      <label for="formFile" class="form-label">Ingrese un archivo del DOCUMENTO(PDF/JPG)</label>
      <input  class="form-control" type="file" id="formFile" name="foto">
      </div>
      <div>
            <button type="submit" class="btn btn-primary" name="subir">Guardar Persona</button>
            <a class="btn btn-danger" href=<?php echo("/proyecto/view/registracion/adrg_borrador_h/show.php?id=".$db->codificar_valor($_GET['id'],1)) ?>> Cancelar </a>
      </div>
        </form>
    </div>
    </section><!-- End About Section -->
<?php
      require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/fooder.php");
?>