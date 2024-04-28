<?php
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/registracion/head/head.php");
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
     // archivo temporal (ruta y nombre).  
?> 

<script>
$(document).ready(function(){
    $('#busqueda').on('keyup', function(){
        var valorBusqueda = $(this).val();
        $.ajax({
            type: 'POST',
            url: 'buscar_opciones.php',
            data: {busqueda: valorBusqueda},
            success: function(response){
                $('#personaid_destino').html(response);
            }
        });
    });
});




$(document).ready(function(){
    $('#tipodestinoid_14').change(function(){
        var tipodestinoid = $(this).val();
        if(tipodestinoid){
          if(tipodestinoid == 1){
            $.ajax({
                type:'POST',
                url:'get_destino_persona.php',
                data:'tipodestinoid='+tipodestinoid,
                success:function(html){
                    $('#personaid_destino').html(html);
                   
                }
            });
            $('#sectorid_destino').html('<option value="">Sin datos</option>');
          }
          else {
            $.ajax({
                type:'POST',
                url:'get_destino_sector.php',
                data:'tipodestinoid='+tipodestinoid,
                success:function(html){
                  
                    $('#sectorid_destino').html(html);
                }
            });
            $('#personaid_destino').html('<option value="">Sin datos</option>');
          }
            
        }else{
            $('#personaid_destino').html('<option value="">seleccione tipo de destino</option>');
            $('#prosectorid_destinoductos').html('<option value="">seleccione tipo de destino</option>');
        }
    });
});
</script>

<section id="destino" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Destino</h2>
          <p>Cargar el destino para el Expediente</p>
          
        </div>
        <form action="store.php" method="POST" autocomplet="off" >
        
        <div class="mb-3 row" >
        <label for="staticEmail" class="col-sm-2 col-form-label">Id</label>
        <div class="col-sm-10">
        <input type="text" readonly class="form-control-plaintext fw-bold" id="borradorid" name="borradorid" value="<?= $_GET['id'] ?>">
        </div>
      <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Tipo destino</label>
      <?php
        $conexion = new db();
        echo($conexion->configurar_lista(14,null,'tipodestinoid',null));
      ?>
      <div id="emailHelp" class="form-text">Tipo destino</div>
      </div>
      <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Usuario destino</label>
     
      <select class="form-select" id="personaid_destino" name="personaid_destino"> 
      <input type="text" id="busqueda" placeholder="Buscar opción...">
        <option value="">debe seleccionar primero un tipo de destino</option>
        </select>
      <div id="emailHelp" class="form-text">Ingrese el usuario</div>
      </div>
      <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Sector destino</label>
      <select class="form-select" id="sectorid_destino" name="sectorid_destino">
        <option value="">debe seleccionar primero un tipo de destino</option>
        </select>
      <div id="emailHelp" class="form-text">Ingrese el sector destino</div>
      </div>
    
      <div>
            <button type="submit" class="btn btn-primary" name="subir">Guardar Destino</button>
            <a class="btn btn-danger" href=<?php echo("/proyecto/view/registracion/adrg_borrador_h/show.php?id=".$_GET['id']) ?>> Cancelar </a>
      </div>
        </form>
    </div>
    </section><!-- End About Section -->
<?php
      require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/fooder.php");
?>