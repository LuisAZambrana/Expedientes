<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/head/head.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/controller/tbl_member_controller.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
    $db=new db();
    $obj= new tbl_member_controller();
    $date = $obj->show($_GET['id']);
    $ruta="/proyecto/view/tbl_member/";
    $ruta_i0="/proyecto/view/seguridad/sema_usuario_i0/";
    $ruta_i1="/proyecto/view/seguridad/sema_usuario_i1/";
?>
<section id="personas" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Usuarios</h2>
          <p>Cargar, editar y borrar un usuario</p>
        </div>

        <div class="pb-3">
            <a href="/proyecto/view/tbl_member/index.php" class="btn btn-primary"> Regresar </a>
            <a href="<?= $ruta ?>edit.php?id=<?= $db->codificar_valor($date[0],1)?>" class="btn btn-success"> Actualizar </a>
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
                              Esta seguro que quiere eliminar un usuario?
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cancelar</button>
                              <a href="<?= $ruta ?>delete.php?id=<?= $db->codificar_valor($date[0],1)?>" type="button" class="btn btn-danger">Eliminar</a>
                              </div>
                    </div>
                  </div>
              </div>
        </div>
    <?php
            $laconexion = new db();
            $query_0 = "SELECT '".$ruta_i0."index.php?id=' as url, 'bx bx-group' as icon";
            $query_1 = "SELECT '".$ruta_i1."index.php?id=' as url, 'bx bx-building-house' as icon";
            $query="SELECT * FROM (".$query_0." UNION ALL ".$query_1.") AS derived_table_alias";
            $control= $laconexion->fcGetSQL($query,1,0);
            //echo($obj->configurar_grilla_sin_control(9," baja = 0 and listaid=".$_GET['id']));
            echo($laconexion->configurar_grilla_personalizado(3,"id=".$_GET['id'], $control));
?>
     </div>
 </section>
 <?php
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/head/fooder.php");
  ?>