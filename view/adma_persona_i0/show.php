<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/head/head.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/controller/adma_persona_i0_controller.php");
    $obj= new adma_persona_i0_controller();
    $date = $obj->show($_GET['id']);
    $extra = $obj->show_i0($_GET['id']);
    $ruta="/proyecto/view/adma_persona_i0/";
?>
<section id="personas" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Personas</h2>
          <p>Cargar, editar y borrar datos extras de una persona</p>
        </div>
<div class="container" data-aos="fade-up">
   
    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Id</label>
        <div class="col-sm-10">
        <input type="text" readonly class="form-control-plaintext fw-bold" id="nombre" name="personaid" value="<?= $date[0] ?>">
        </div>
    </div>  
    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Apellido y Nombre</label>
        <div class="col-sm-10">
        <input type="text" readonly class="form-control-plaintext fw-bold" id="nombre" name="nombre" value="<?= $date[2] .", ".$date[1]  ?>">
        </div>
    </div> 


<div class="pb-3">
<a href="/proyecto/index.php#personas" class="btn btn-primary"> Regresar </a>
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
                <th scope="col">Fecha Nacimiento</th>
                <th scope="col">Tipo Identificacion</th>
                <th scope="col">Identificacion</th>
                <th scope="col">Genero</th>
                <th scope="col">Cuil</th>
                <th scope="col">Estado Civil</th>
              
        </tr>
    </thead>
    <tbody>
        <tr>
                <td scope="col"><?=  $extra[2] ?></td>
                <td scope="col"><? switch( $extra[3] ){
                                case "1":
                                   echo "DNI";
                                     break;
                                case "2": 
                                   echo "LE";
                                      break;
                                case "3": 
                                    echo "PS";
                                      break;
                                 default:
                                    echo "No Selecciono nada";
                              }; ?> </td>
                <td scope="col"><?=  $extra[4] ?></td>
                <td scope="col"><?  switch( $extra[5] ){
                                case "1":
                                   echo "Masculino";
                                     break;
                                case "2": 
                                   echo "Femenino";
                                      break;
                                case "3": 
                                    echo "X";
                                      break;
                                 default:
                                    echo "No Selecciono nada";
                              }; ?>
                </td>
                <td scope="col"><?=  $extra[6] ?></td>
                <td scope="col"><?  switch($extra[7]){
                                case "1":
                                   echo "Soltero";
                                     break;
                                case "2": 
                                   echo "Casado";
                                      break;
                                case "3": 
                                    echo "Divorsiado";
                                      break;
                                case "4": 
                                    echo "Viudo";
                                      break;
                                 default:
                                    echo "No Selecciono nada";
                              }; ?> </td>
        </tr>
    
    </tbody>

</table>

</div>
</div>
<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/view/head/fooder.php");
?>