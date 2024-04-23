<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/head/head.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/controller/adma_persona_controller.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/controller/adma_persona_i0_controller.php");
    $obj= new adma_persona_controller();
    $date = $obj->show($_GET['id']);
    $ruta="/proyecto/view/adma_persona/";
    $ruta_i0="/proyecto/view/adma_persona_i0/";
    $obj_i0 = new adma_persona_i0_controller();
    $date_i0 = $obj_i0->show_i0($_GET['id']);
    $crear_datos = true;
    if ($date_i0):
      foreach($date_i0 as $row):
        $crear_datos = false;
      endforeach;
    endif;
?>
<section id="personas" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Personas</h2>
          <p>Cargar, editar y borrar una persona</p>
        </div>

        <div class="pb-3">
            <a href="/proyecto/view/adma_persona/index.php" class="btn btn-primary"> Regresar </a>
            <a href="<?= $ruta ?>edit.php?id=<?= $date[0]?>" class="btn btn-success"> Actualizar </a>
            <a type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal"> Eliminar </a>
            <!-- Button trigger modal -->
            <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar registro</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                            <div class="modal-body">
                              Esta seguro que quiere eliminar el registro, como hicieron conmigo en el IUPA?
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-success" data-bs-dismiss="modal">No quiero eliminar</button>
                              <a href="<?= $ruta ?>delete.php?id=<?= $date[0]?>" type="button" class="btn btn-danger">Que se cague!..Eliminemos!</a>
                              </div>
                    </div>
                  </div>
              </div>
        </div>

    <table class="table container-fluid">
            <thead>
                <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Acciones</th>
                        
                </tr>
            </thead>
            <tbody>
                <tr>
                        <td scope="col"><?= $date[0] ?></td>
                        <td scope="col"><?= $date[1] ?></td>
                        <td scope="col"><?= $date[2] ?></td>
                        <td scope="col"><a href="<? if ($crear_datos):
                                                      echo ($ruta_i0."create.php?id=".$date[0]);
                                                    else:
                                                      echo ($ruta_i0."show.php?id=".$date[0]);
                                                    endif; ?>" class="btn btn-primary"> Más datos.. </a></td>
                        <td scope="col"><a href="<?= $ruta ?>reporte.php?id=<?= $date[0]?>" class="btn btn-success"> Imprimir </a></td>
                </tr>
            
            </tbody>
    </table>
     </div>
 </section>
 <?php
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/head/fooder.php");
  ?>