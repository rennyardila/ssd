<?php
// Agrega esta línea para incluir el archivo conectar.php
include("conexion/conectar.php");

// Consulta SQL para seleccionar todos los usuarios
$sql = "SELECT id, unique_id, fname, lname, email, whatsapp, pais, password, img, status, saldo FROM users";

// Ejecutar la consulta
$resultado = $conexion->query($sql);

// Verificar si se encontraron resultados
if ($resultado->num_rows > 0) {
    // Mostrar los datos de los usuarios en la tabla
    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $fila["user_id"] . "</td>";
        echo "<td>" . $fila["unique_id"] . "</td>";
        echo "<td>" . $fila["fname"] . "</td>";
        echo "<td>" . $fila["lname"] . "</td>";
        echo "<td>" . $fila["email"] . "</td>";
        echo "<td>" . $fila["whatsapp"] . "</td>";
        echo "<td>" . $fila["pais"] . "</td>";
        echo "<td>" . $fila["password"] . "</td>";
        echo "<td>" . $fila["saldo"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='7'>No se encontraron usuarios</td></tr>";
}

// Cerrar la conexión (no es necesario aquí porque ya se cierra en conectar.php)
// $conexion->close();
?>
