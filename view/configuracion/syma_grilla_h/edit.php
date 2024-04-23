<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/head.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
    $obj= new db();
    $sql="SELECT * FROM syma_grilla_h WHERE  grillaid =".$_GET['id'];
    $date = $obj->fcGetSQL($sql,true,2);
  
?>
<section id="grillas" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Grillas</h2>
          <p>Cargar, editar y borrar una grilla</p>
        </div>
        <form action="update.php" method="POST" autocomplete="off"> 
            <h2> Modificación de una grilla </h2>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Id</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext fw-bold" id="nombre" name="id" value="<?= $date[0] ?>">
                </div>
            </div>  
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Grilla Id</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext fw-bold" id="nombre" name="grillaid" value="<?= $date[1] ?>">
                </div>
            </div>  
            <div class="mb-3 row">
                <label for="exampleInputEmail1" class="form-label">Tipo de consulta</label>
                <label class="input-group-text" for="inputGroupSelect01">Tipo</label>
                    <select class="form-select" id="inputGroupSelect01" name="tipoconsultaid">
                    <option value="1" <?php  if ($date[2] == "1") echo("selected") ?>>MySQL</option>
                    <option value="2" <?php  if ($date[2] == "2") echo("selected") ?>>Oracle</option>
                    <option value="3" <?php  if ($date[2] == "3") echo("selected") ?>>SQL Server</option>
                    </select>
                    <div id="emailHelp" class="form-text">Ingrese el tipo de consulta</div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">KeyFieldName</label>
            <input type="text" name="keyfieldname" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $date[3] ?>">
            <div id="emailHelp" class="form-text">Ingrese el campo clave de la tabla</div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">Tabla</label>
            <input type="text" name="tabla" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $date[4] ?>">
            <div id="emailHelp" class="form-text">Ingrese el nombre de la tabla</div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">Query</label>
            <input type="text" name="querys" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $date[5] ?>">
            <div id="emailHelp" class="form-text">Ingrese la consulta</div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">ShowGroupedColumns</label>
            <input  class="form-check-input" type="checkbox" role="switch" aria-describedby="emailHelp" name="showgroupedcolumns"  <?= ($date[6]== 1)? "checked":"unchecked" ?>>
            <div id="emailHelp" class="form-text">Mostrar agrupamiento de columnas</div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">ShowGroupPanel </label>
            <input  class="form-check-input" type="checkbox" role="switch" aria-describedby="emailHelp" name="showgrouppanel" value="1" <?= ($date[7]== 1)? "checked":"unchecked" ?>>
            <div id="emailHelp" class="form-text">Mostrar el panel para agrupar</div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">ShowAutoFilterRow</label>
            <input  class="form-check-input" type="checkbox" role="switch" aria-describedby="emailHelp" name="showautofilterrow" value="1" <?= ($date[8]== 1)? "checked":"unchecked" ?>>
            <div id="emailHelp" class="form-text">Mostrar Auto Filtro de Filas</div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">Grupo</label>
            <input type="text" name="grupo" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $date[9] ?>">
            <div id="emailHelp" class="form-text">Agrupamento de grilla</div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">ShowSession</label>
            <input  class="form-check-input" type="checkbox" role="switch" aria-describedby="emailHelp" name="showsession" value="1" <?= ($date[10]== 1)? "checked":"unchecked" ?>>
            <div id="emailHelp" class="form-text">Filtrar por session de usuario</div>
            </div>
            <div class="mb-3 row">
            <label for="exampleInputEmail1" class="form-label">ShowSector</label>
            <input  class="form-check-input" type="checkbox" role="switch" aria-describedby="emailHelp" name="showsector" value="1"  <?= ($date[11]== 1)? "checked":"unchecked" ?>>
            <div id="emailHelp" class="form-text">Filtrar por sector logueado por el usuario</div>
            </div>
            
    <div>
        <input type="submit" class="btn btn-success" value="Actualizar">
        <a href="show.php?id=<?= $date[1] ?>" class="btn btn-danger">Cancelar</a>
    </div>
</form>
      </div>
    </section><!-- End About Section -->

<?php
      require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/fooder.php");
?>