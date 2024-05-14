<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/head.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
    $obj= new db();
    $sql="SELECT * FROM syma_grilla_h  WHERE grillaid = ".$_GET['id'];
    $date = $obj->fcGetSQL($sql,1,2);
    $crear_datos= false;
    $ruta= "/proyecto/view/configuracion/syma_grilla_h/";
    $ruta_i0= "/proyecto/view/configuracion/syma_grilla_i0/";
?>
<section id="personas" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Grillas</h2>
          <p>Cargar, editar y borrar una Grilla</p>
        </div>

        <div class="pb-3">
            <a href="/proyecto/view/configuracion/syma_grilla_h/index.php" class="btn btn-primary"> Regresar </a>
            <a href="<?= $ruta ?>actualizar.php?id=<?= $obj->codificar_valor($date[1],1)?>" class="btn btn-success"> Actualizar </a>
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
                              Esta seguro que quiere eliminar el registro?
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cancelar</button>
                              <a href="<?= $ruta ?>delete.php?id=<?= $obj->codificar_valor($date[1],1)?>" type="button" class="btn btn-danger">Eliminar!</a>
                              </div>
                    </div>
                  </div>
              </div>
              <a href="<?= $ruta_i0 ?>generar_filas.php?id=<?= $obj->codificar_valor($_GET['id'],1)?>" class="btn btn-success"> Generar columnas... </a>
        </div>

    <table class="table container-fluid">
            <thead>
                <tr>
                    <th scope="col">GrillaId</th>
                    <th scope="col">TipoConsulta</th>
                    <th scope="col">KeyFieldName</th>
                    <th scope="col">Tabla</th>
                    <th scope="col">Querys</th>
                    <th scope="col">Acciones</th>
                        
                </tr>
            </thead>
            <tbody>
                <tr>
                <th><?= $date[1] ?></th>
                        <td scope="col"><? switch($date[2]){
                                case "1":
                                   echo "MySql";
                                     break;
                                case "2": 
                                   echo "Oracle";
                                      break;
                                case "3": 
                                    echo "SQL Server";
                                      break;
                                 default:
                                    echo "No Selecciono nada";
                              }; ?> </td>
                        <th><?= $date[3] ?></th>
                        <th><?= $date[4] ?></th>
                        <th><?= $date[5] ?></th>
                        <td scope="col"><a href="<? if ($crear_datos):
                                                      echo ($ruta_i0."create.php?id=".$obj->codificar_valor($date[0],1));
                                                    else:
                                                      echo ($ruta_i0."index.php?id=".$obj->codificar_valor($date[1],1));
                                                    endif; ?>" class="btn btn-primary"> Cargar columnas.. </a></td>
                
                </tr>
            
            </tbody>
    </table>
     </div>
 </section>
 <?php
       require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/configuracion/head/fooder.php");
  ?>