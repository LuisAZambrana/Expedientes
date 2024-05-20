<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gráfico de Áreas - AdminLTE</title>
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="path/to/adminlte.min.css">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Gráfico de Áreas</h3>
            </div>
            <div class="card-body">
                <canvas id="graficoAreas"></canvas>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', (event) => {
        // Datos fijos de ejemplo
        const datos = [
            { fecha: '2023-01', cantidad: 30, ventas: 1000 },
            { fecha: '2023-02', cantidad: 50, ventas: 1500 },
            { fecha: '2023-03', cantidad: 40, ventas: 1200 },
            { fecha: '2023-04', cantidad: 60, ventas: 1700 },
            { fecha: '2023-05', cantidad: 70, ventas: 2000 }
        ];

        const labels = datos.map(d => d.fecha);
        const cantidades = datos.map(d => d.cantidad);
        const ventas = datos.map(d => d.ventas);

        const ctx = document.getElementById('graficoAreas').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'Cantidad',
                        data: cantidades,
                        borderColor: 'rgba(75, 192, 192, 1)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        fill: true
                    },
                    {
                        label: 'Ventas',
                        data: ventas,
                        borderColor: 'rgba(153, 102, 255, 1)',
                        backgroundColor: 'rgba(153, 102, 255, 0.2)',
                        fill: true
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        type: 'category',
                        title: {
                            display: true,
                            text: 'Fecha'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Valores'
                        }
                    }
                }
            }
        });
    });
    </script>
</body>
</html>

