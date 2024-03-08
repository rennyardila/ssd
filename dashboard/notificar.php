<?php

// Función para obtener las nuevas notificaciones desde la base de datos
function obtenerNuevasNotificaciones() {
    // Conexión a la base de datos (debes configurar tus propios datos de conexión)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "chat";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Consulta para obtener las nuevas notificaciones
    $sql = "SELECT mensaje FROM notificaciones_programadas WHERE leido = 0"; // Suponiendo que tienes una tabla 'notificaciones' con un campo 'mensaje'

    // Ejecutar la consulta
    $result = $conn->query($sql);

    $notificaciones = array();

    // Verificar si hay resultados
    if ($result->num_rows > 0) {
        // Recorrer los resultados y agregarlos al array de notificaciones
        while($row = $result->fetch_assoc()) {
            $notificaciones[] = array('mensaje' => $row['mensaje']);
        }
    }

    // Cerrar la conexión
    $conn->close();

    // Devolver las nuevas notificaciones
    return $notificaciones;
}

// Ruta para verificar nuevas notificaciones
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['checkNotifications'])) {
    // Obtener nuevas notificaciones
    $nuevasNotificaciones = obtenerNuevasNotificaciones();
    
    // Devolver las nuevas notificaciones como respuesta
    header('Content-Type: application/json');
    echo json_encode($nuevasNotificaciones);
    exit;
}
?>
