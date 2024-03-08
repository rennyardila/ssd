<?php
// Conectar a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "chat");

// Verificar la conexión
if (!$conexion) {
    die("Error al conectar: " . mysqli_connect_error());
}

// Obtener el último incoming_msg_id de la tabla messages
$sql_ultimo_msg_id = "SELECT MAX(incoming_msg_id) AS ultimo_msg_id FROM messages";
$resultado_ultimo_msg_id = mysqli_query($conexion, $sql_ultimo_msg_id);

if ($resultado_ultimo_msg_id) {
    // Obtener el último incoming_msg_id
    $fila_ultimo_msg_id = mysqli_fetch_assoc($resultado_ultimo_msg_id);
    $ultimo_msg_id = $fila_ultimo_msg_id['ultimo_msg_id'];

    // Actualizar la columna mensajes en la tabla users
    $sql_actualizar_mensajes = "UPDATE users SET mensajes = mensajes + $ultimo_msg_id WHERE user_id = $user_id";

    if (mysqli_query($conexion, $sql_actualizar_mensajes)) {
        echo "Columna 'mensajes' actualizada correctamente.";
    } else {
        echo "Error al actualizar la columna mensajes: " . mysqli_error($conexion);
    }
} else {
    echo "Error al obtener el último incoming_msg_id: " . mysqli_error($conexion);
}

// Cerrar la conexión
mysqli_close($conexion);
?>
