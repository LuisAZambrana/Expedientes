<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activar PHP en Popup de Bootstrap</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

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
</head>
<body>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Abrir Popup
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" name="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
       
            <div class="modal-content">
                
                <div class="modal-body">
                 
                    <div id="modalContent" name="modalContent">

                    </div>
                </div>
            </div>
       
    </div>

    <!-- Bootstrap JS y jQuery (necesarios para el funcionamiento del modal) -->


    <script>
        // Función para cargar el contenido del archivo PHP cuando se muestra el modal
        $('#exampleModal').on('show.bs.modal', function () {
            $.ajax({
                type: 'POST', 
                url: 'buscar_opciones_sector.php', // Ruta de tu archivo PHP
                date: 'id='+50,
                success: function(response) {
                    // Coloca el contenido devuelto por el archivo PHP en el cuerpo del modal
                    $('#modalContent').html(response);
                }
        });
    </script>
</body>
</html>
