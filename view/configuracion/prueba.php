<?php
    require_once($_SERVER['DOCUMENT_ROOT']."/proyecto/config/db.php");
    $obj= new db();
    $sql="SELECT * FROM syma_grilla_h WHERE grillaid=".$_GET['id'];
    $date = $obj->fcGetSQL($sql,true,2);
    $sql="SELECT * FROM syma_grilla_i0 WHERE baja = 0 and grillaid =".$_GET['id'];
    $extra = $obj->fcGetSQL($sql,true,0);
    $ruta="/proyecto/view/configuracion/syma_grilla_h/";
    $ruta_i0="/proyecto/view/configuracion/syma_grilla_i0/";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    
    <link href="/proyecto/assets/img/favicon.png" rel="icon">
  <link href="/proyecto/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../..assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../../assets/css/style.css" rel="stylesheet">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
  

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
 
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.1/js/dataTables.responsive.js">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.1/js/responsive.dataTables.js">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.1/css/responsive.dataTables.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.css">
  <link href="https://cdn.datatables.net/v/bs5/dt-2.0.3/datatables.min.css" rel="stylesheet">

<title>Paginacion</title>
</head>
<body>
    <div  class="container">
    <table id="tablax" class="display nowrap" style="width:100%">
    <thead>
        <tr>
                <th>Acciones</th>
                <th>Caption</th>
                <th>ToolTip </th>
                <th>Visible</th>
                <th>VisibleIndex</th>
                <th>Width</th>
                <th>GroupIndex</th>
                <th>FieldName</th>
                <th>ComboListaId</th>
                <th>Html</th>
                <th>TieneCondicion</th>
               
              
        </tr>
    </thead>
    <tbody>
   
            <?php if ($extra): ?>
                  <?php foreach($extra as $row): ?>
                  <tr> 
                  <td>
                              <a href="<? echo($ruta_i0."show.php?id=".$row[0]); ?>"><i class="bx bx-folder-open"></i></a>
                              <a href="<? echo("/proyecto/view/configuracion/syma_grilla_i0/crear.php?id=".$_GET['id']);?>"><i class="bx bx-folder-plus"></i></a>
                              <a href="<?= $ruta_i0 ?>actualizar.php?id=<?= $row[0] ?>"><i class="bx bx-folder"></i></a>
                              <a  data-bs-toggle="modal" data-bs-target="#exampleModal<?= $row[1]?>"><i class="bx bx-folder-minus"></i></a>
                              <div class="modal fade" id="exampleModal<?= $row[0]?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                            <a  class="btn btn-success" data-bs-dismiss="modal">No quiero eliminar</a>
                                                            <a href="<?= $ruta ?>delete.php?id=<?= $row[1]?>" type="button" class="btn btn-danger">Eliminemos!</a>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                        </td>
                        <td><?= $row[2] ?></td>
                        <td><?= $row[3] ?></td>
                        <td><?= $row[4] ?></td>
                        <td><?= $row[5] ?></td>
                        <td><?= $row[6] ?></td>
                        <td><?= $row[7] ?></td>
                        <td><?= $row[8] ?></td>
                        <td><?= $row[9] ?></td>
                        <td><?= $row[10] ?></td>
                        <td><?= $row[11] ?></td>
                        
                        
                  </tr>
                        <?php endforeach; ?>
                              <?php else: ?>    
                                   
                                    <tr> 
                                    <td colspan="17" class="text-center">
                                          <a href=<? echo("/proyecto/view/configuracion/syma_grilla_i0/crear.php?id=".$_GET['id']); ?> class="btn btn-primary"> Nueva columna </a>
                                    </td>
                                    </tr>
                              <?php endif; ?>
    </tbody>
            </table>

</div>

<!-- JQUERY -->
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
      <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js">
    </script>      
   
    <script src="https://cdn.datatables.net/responsive/3.0.1/js/dataTables.responsive.js">
    </script>
    <script src="https://cdn.datatables.net/responsive/3.0.1/js/responsive.dataTables.js">
    </script>
     

    <script>
        $(document).ready(function () {
          $('#tablax').DataTable({
                language: {
                    processing: "Tratamiento en curso...",
                    search: "Buscar:",
                    lengthMenu: "Agrupar por: _MENU_",
                    info: "Mostrando del item _START_ al _END_ de un total de _TOTAL_ items",
                    infoEmpty: "No existen datos.",
                    infoFiltered: "(filtrado de _MAX_ elementos en total)",
                    infoPostFix: "",
                    loadingRecords: "Cargando...",
                    zeroRecords: "No se encontraron datos con tu busqueda",
                    emptyTable: "No hay datos disponibles en la tabla.",
                    paginate: {
                        first: "Primero",
                        previous: "Anterior",
                        next: "Siguiente",
                        last: "Ultimo"
                    },
                    aria: {
                        sortAscending: ": active para ordenar la columna en orden ascendente",
                        sortDescending: ": active para ordenar la columna en orden descendente"
                    }
                },
                responsive: true,
                columnDefs: [
                    { responsivePriority: 1, targets: 0 },
                    { responsivePriority: 10001, targets: 4 },
                    { responsivePriority: 2, targets: -2 }
                    ],
                lengthMenu: [ [5, 10, 25, -1], [5, 10, 25, "All"] ]
               
                    });
        });
    </script>
</body>
</html>