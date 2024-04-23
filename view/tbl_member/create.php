<?php
     require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/head/head.php");
     if (isset($_GET["err"]))
      {
            $mensaje = $_GET["err"];
      }
      else
      {
            $mensaje= 0;
      }      
      if($mensaje == 0)
      {
            $_SESSION["_username"] = null;
            $_SESSION["_name"]=null;
            $_SESSION["_password"]=null;
            $_SESSION["_confirmar"]=null;
      }
            $username = (isset($_SESSION["_username"])) ? $_SESSION["_username"] : null;
            $name = (isset($_SESSION["_name"])) ? $_SESSION["_name"] : null;
            $password = (isset($_SESSION["_password"])) ? $_SESSION["_password"] : null;
            $confirmar = (isset($_SESSION["_confirmar"])) ? $_SESSION["_confirmar"] : null;
           

?>
<section id="usuarios" class="about">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
                  <h2>Personas</h2>
                  <p>Cargar, editar y borrar una persona</p>
        </div>
            <form action="store.php" method="POST" autocomplet="off">
                  <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Nombre de usuario (Logueo)</label>
                  <input type="text" name="username" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value= <?php echo $username ?> >
                  <div id="emailHelp" class="form-text">Ingrese el nombre de usuario</div>
                  </div>
                  <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Nombre de la Persona</label>
                  <input type="text" name="name"  required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value= <?php echo $name ?> >
                  <div id="emailHelp" class="form-text">Ingrese el nombre de la persona</div>
                  </div>
                  <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Password</label>
                  <input type="password" name="password"  required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value= <?php echo $password ?> >
                  <div id="emailHelp" class="form-text">Ingrese la clave</div>
                  </div>
                  <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Confirmación de password</label>
                  <input type="password" name="confirmar"  required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value= <?php echo $confirmar ?> >
                  <div id="emailHelp" class="form-text">Ingrese la clave</div>
                  </div>
                  <?php
                        if (isset($_GET["err"]))
                          {
                              $distintas = $_GET["err"];
                          }
                        else 
                          {
                              $distintas = 0;
                          }
                         if ($distintas == 1)
                         { ?>
                           <div class="alert alert-danger" role="alert">
                                           <strong>Error de Claves</strong><br>
                                                La clave no coincide con la confirmación!
                                          </div>

                        
                         <?php
                       
                          $_SESSION["_username"] = null;
                          $_SESSION["_name"]=null;
                          $_SESSION["_password"]=null;
                          $_SESSION["_confirmar"]=null;
                        } ?>
                  <button type="submit" class="btn btn-primary">Guardar persona</button>
                  <a class="btn btn-danger" href="/proyecto/index.php#usuarios"> Cancelar </a>
            </form>
      </div>
    </section><!-- End About Section -->
<?php
      require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/head/fooder.php");
?>
