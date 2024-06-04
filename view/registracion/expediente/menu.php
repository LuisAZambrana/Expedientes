<?php
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/registracion/head/head.php");
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
     $db = new db();
     
?>
 <style>
        #loading {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.8);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }
        .spinner {
            border: 8px solid rgba(0, 0, 0, 0.1);
            border-top: 8px solid #000;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
<section id="expediente" class="about">
      <div class="container" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="500" data-aos-offset="200">

        <div class="section-title">
          <h2>Crear Nuevo Expediente</h2>
          <p>Generar un nuevo Expediente</p>
        </div>
        <form id="formulario" action="generar_expediente.php" method="POST" autocomplet="off">
        <div class="mb-3 row" >
        <label for="staticEmail" class="col-sm-2 col-form-label">Id</label>
        <div class="col-sm-10">
        <input type="text" readonly class="form-control-plaintext fw-bold" id="borradorid" name="borradorid" value="<?= $_GET['id'] ?>">
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
            <label for="exampleInputEmail1" class="form-label">Importancia</label>
            <?php
            $conexion = new db();
            echo($conexion->configurar_lista(16,null,'importanciaid',null));
            ?>
      <div id="emailHelp" class="form-text">Importancia</div>
      </div>
        <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Descripcion Expediente</label>
        <input type="text" name="descripcion" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">Ingrese breve descripcion</div>
       </div>
       <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Mensaje</label>
        <textarea  name="asunto" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" rows="3"></textarea>
        <div id="emailHelp" class="form-text">Ingrese el asunto</div>
       </div>
     <div>
     <button type="submit" class="btn btn-primary" data-aos="zoom-in">Generar Expediente</button>
            <a class="btn btn-danger" href="/proyecto/view/registracion/expediente/index.php"> Cancelar </a>
    </div>
        
        </form>
    </div>
    </section><!-- End About Section -->
    <script>
        AOS.init();

        document.getElementById('formulario').addEventListener('submit', function(event) {
            event.preventDefault();
            document.getElementById('loading').style.display = 'flex';

            const form = event.target;
            const formData = new FormData(form);

            fetch(form.action, {
                method: form.method,
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                document.getElementById('loading').style.display = 'none';
                // Aquí puedes manejar la respuesta del servidor, por ejemplo:
                console.log('Respuesta del servidor:', data);
                // Redireccionar o mostrar un mensaje de éxito
            })
            .catch(error => {
                document.getElementById('loading').style.display = 'none';
                console.error('Error:', error);
                // Mostrar un mensaje de error al usuario
            });
        });
    </script>
<?php
      require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/registracion/head/fooder.php");
?>