<?php
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/registracion/head/head.php");
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
     // archivo temporal (ruta y nombre).  
     $db= new db();
?> 
<section id="menu" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Archivos</h2>
          <p>Cargar un archivo</p>
          
        </div>
        <form action="store.php" method="POST" autocomplet="off" enctype="multipart/form-data">
        
        <div class="mb-3 row" >
        <label for="staticEmail" class="col-sm-2 col-form-label">Id</label>
        <div class="col-sm-10">
        <input type="text" readonly class="form-control-plaintext fw-bold" id="borradorid" name="borradorid" value="<?= $_GET['id'] ?>">
        </div>


       <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Nombre Archivo</label>
      <input type="text" name="nombre_archivo" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">Nombre Archivo</div>
      </div>

      <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Folio</label>
      <input type="text" name="folio" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">Cantidad de hojas a presentar.</div>
      </div>
    
      <div class="mb-3">
      <label for="formFile" class="form-label">Ingrese un archivo(PDF/JPG)</label>
      <input  required class="form-control" type="file" id="formFile" name="archivo">
      </div>
      <div>
            <button type="submit" class="btn btn-primary" name="subir">Guardar Archivo</button>
            <a class="btn btn-danger" href=<?php echo("/proyecto/view/registracion/adrg_borrador_h/show.php?id=".$db->codificar_valor($_GET['id'],1)) ?>> Cancelar </a>
      </div>
        </form>
    </div>
    </section><!-- End About Section -->
<?php
      require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/fooder.php");
?>