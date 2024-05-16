<?php
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/registracion/head/head.php");
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
     $db = new db();
     $row_expediente = $db->fcGetSQL("SELECT * FROM adrg_expediente_h WHERE expedienteid = ".$_GET['id'],1,2);

     $vuelta = $_GET['pase'];
    if ($vuelta == 'sector'){
     $index = "index_s.php";
    }
    else
        {if ($vuelta =='exp'){
     $index="index.php";
   }
   else{
     $index="index_p.php";
   }}
     
?>
<section id="expediente" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Cerrar Expediente</h2>
          <p>Cerrar y dar respuesta al expediente</p>
        </div>
        <form action="fin.php" method="POST" autocomplet="off" enctype="multipart/form-data">
        <div class="mb-3 row" >
        <label for="staticEmail" class="col-sm-2 col-form-label">Id:</label>
        <div class="col-sm-10">
        <input type="text" readonly class="form-control-plaintext fw-bold" id="borradorid" name="id" value="<?= $_GET['id']?>">
        </div>
        <div class="mb-3 row" >
        <label for="staticEmail" class="col-sm-2 col-form-label">Expediente:</label>
        <div class="col-sm-10">
        <input type="text" readonly class="form-control-plaintext fw-bold" id="borradorid" name="nro_expediente" value="<?= $row_expediente['nro_expendiente']?>">
        </div>
        <?php 
         if (isset($_GET["mess"])){ ?>
           <div class="alert alert-primary" role="alert">
                                           <strong>Para generar su Expediente!</strong><br>
                                           <?php
                                            echo($_GET["mess"]);
                                           ?>
                                          </div>
        <?php
         }
        ?>
       
       <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Mensaje</label>
        <textarea  name="mensaje" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" rows="3"></textarea>
        <div id="emailHelp" class="form-text">Ingrese el breve descripción del resultado</div>
       </div>
      
      <div class="mb-3">
      <label for="formFile" class="form-label">Ingrese un archivo(PDF/JPG)</label>
      <input  required class="form-control" type="file" id="formFile" name="fin">
      </div>
     <div>
     <div class="mb-3 row" >
        <label for="staticEmail" class="col-sm-2 col-form-label">Desde:</label>
        <div class="col-sm-10">
        <input type="text" readonly class="form-control-plaintext fw-bold" id="borradorid" name="pase" value="<?= $_GET['pase']?>">
        </div>
        </div>
     <button type="submit" class="btn btn-primary">Generar Expediente</button>
            <a class="btn btn-danger" href=<?php echo("/proyecto/view/registracion/expediente/".$index); ?>> Cancelar </a>
    </div>
        
        </form>
    </div>
    </section><!-- End About Section -->
<?php
      require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/registracion/head/fooder.php");
?>