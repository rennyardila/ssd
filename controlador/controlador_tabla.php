<?php
// Incluir la configuración de la base de datos y verificar la sesión de usuario
include_once "../conexion/conectar.php";
include_once "controlador_conexion.php";

// Verificar si hay una sesión de usuario activa
if (!isset($_SESSION["user_id"])) {
    header("Location: ../login.php"); // Redirigir al usuario a la página de inicio de sesión si no está autenticado
    exit();
}

// Consulta SQL para seleccionar los registros del usuario actual
$sql = "SELECT id, servicios_select, link, cantidad, resultado FROM guardar WHERE user_id = ?";

// Preparar la sentencia SQL
$stmt = $conexion->prepare($sql);

// Vincular el parámetro de user_id
$stmt->bind_param("i", $_SESSION["user_id"]);

// Ejecutar la consulta
$stmt->execute();

// Obtener el resultado de la consulta
$resultado = $stmt->get_result();

// Verificar si se encontraron resultados
if ($resultado->num_rows > 0) {
    // Mostrar los datos de los registros en la tabla
    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $fila["id"] . "</td>";
        echo "<td>" . $fila["user_id"] . "</td>";
        echo "<td>" . $fila["servicios_select"] . "</td>";
        echo "<td>" . $fila["link"] . "</td>";
        echo "<td>" . $fila["cantidad"] . "</td>";
        echo "<td>" . $fila["resultado"] . "</td>";
        echo "<td>" . $fila[""] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>No se encontraron registros para este usuario</td></tr>";
}

// Cerrar la conexión y liberar los recursos
$stmt->close();
?>
