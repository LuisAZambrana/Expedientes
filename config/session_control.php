<?php

// Tiempo de inactividad en segundos (por ejemplo, 10 minutos)
$tiempo_inactividad = 60; // 600 segundos = 10 minutos

// Comprueba si la sesión está activa
if (isset($_SESSION['ultimo_acceso']) && (time() - $_SESSION['ultimo_acceso']) > $tiempo_inactividad) {
    // Si el tiempo de inactividad ha sido superado, destruye la sesión
    session_unset();
    session_destroy();
    // Redirige al usuario a otra página o muestra un mensaje de inactividad
    $url = "../../../logout.php";
    header("Location: $url");
}

// Actualiza el tiempo de último acceso
$_SESSION['ultimo_acceso'] = time();
?>