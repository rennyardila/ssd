<?php
// Agrega esta línea para incluir el archivo conectar.php
include("conexion/conectar.php");

session_start();

// Verificar si el usuario ha iniciado sesión
if (empty($_SESSION["user_id"])) {
    header("location: login.php"); // Redirigir a la página de inicio de sesión si no hay sesión activa
    exit(); // Finalizar el script para evitar que se ejecute más código innecesario
}

// ID del usuario obtenido de la sesión
$user_id = $_SESSION["user_id"];

// Consultar el saldo total de la tabla 'guardar' por ID
$sql = "SELECT SUM(saldo) AS saldo_total FROM guardar WHERE id_usuario = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    // Si hay resultados, actualizar el saldo en la tabla 'users'
    $fila = $resultado->fetch_assoc();
    $saldo_total = $fila["saldo_total"];
    
    $sql_actualizar = "UPDATE users SET completo = ? WHERE id = ?";
    $stmt_actualizar = $conexion->prepare($sql_actualizar);
    $stmt_actualizar->bind_param("ii", $saldo_total, $user_id);
    if ($stmt_actualizar->execute()) {
        echo "Saldo actualizado correctamente.";
    } else {
        echo "Error al actualizar el saldo: " . $stmt_actualizar->error;
    }
} else {
    echo "No se encontraron saldos para el usuario con ID: $user_id";
}

// Cerrar la conexión (no es necesario aquí porque ya se cierra en conectar.php)
// $conexion->close();
?>
