<?php
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/registracion/head/head.php");
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
     // archivo temporal (ruta y nombre).  
?> 
<script>



$(document).ready(function(){
    $('#busquedasector').on('keyup', function(){
        var valorBusqueda = $(this).val();
        $.ajax({
            type: 'POST',
            url: 'buscar_opciones_sector.php',
            data: 'busqueda='+valorBusqueda,
            success: function(response){
                $('#sectorid_origen').html(response);
            }
        });
    });
});



$(document).ready(function(){
    $('#tipo_origen_14').change(function(){
        var tipoorigenid = $(this).val();
        if(tipoorigenid){
          if(tipoorigenid == 1){
         
            $('#sectorid_origen').html('<option value="">Sin datos</option>');
            document.getElementById('sectorid_origen').disabled = true;
            document.getElementById('busquedasector').disabled = true;
            document.getElementById('busquedasector').value='';
           
          }
          else {
            $.ajax({
                type:'POST',
                url:'get_origen_sector.php',
                data:'tipoorigenid='+tipoorigenid,
                success:function(html){
                  
                    $('#sectorid_origen').html(html);
                }
            });
           
            document.getElementById('sectorid_origen').disabled = false;
            document.getElementById('busquedasector').disabled = false;
          }
            
        }else{
           
            $('#sectorid_origen').html('<option value="">seleccione tipo de destino</option>');
        }
    });
});
</script>

<section id="origen" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Origen del Expediente</h2>
          <p>Cargar por usuario o sector</p>
          
        </div>
        <form action="store.php" method="POST" autocomplet="off" >
        
        <div class="mb-3 row" >
        <label for="staticEmail" class="col-sm-2 col-form-label">Id</label>
        <div class="col-sm-10">
        <input type="text" readonly class="form-control-plaintext fw-bold" id="borradorid" name="borradorid" value="<?= $_GET['id'] ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tipo origen</label>
            <?php
            $conexion = new db();
            echo($conexion->configurar_lista(14,null,'tipo_origen',null));
            ?>
      <div id="emailHelp" class="form-text">Tipo origen</div>
      </div>

      <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Sector origen</label>
      <label class="input-group-text" for="sectorid_origen"><input type="text" id="busquedasector" class="form-control" placeholder="Buscar opción..."></label>
      <select class="form-select" id="sectorid_origen" name="sectorid_origen">
        <option value="">debe seleccionar primero un tipo de destino</option>
        </select>
      <div id="emailHelp" class="form-text">Ingrese el sector destino</div>
      </div>
    
     
      <div>
            <button type="submit" class="btn btn-primary" name="subir">Guardar Origen</button>
            <a class="btn btn-danger" href=<?php echo("/proyecto/view/registracion/adrg_borrador_h/show.php?id=".$conexion->codificar_valor($_GET['id'],1)) ?>> Cancelar </a>
      </div>
        </form>
    </div>
    </section><!-- End About Section -->
<?php
      require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/fooder.php");
?>