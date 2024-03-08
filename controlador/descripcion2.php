<?php
// Agrega esta línea para incluir el archivo conectar.php
include("conexion/conectar.php");

// Consulta SQL para obtener la descripción
$sql = "SELECT descripcion FROM servicios WHERE id = id"; // Cambia "tu_tabla" por el nombre de tu tabla y "id = 1" por la condición adecuada
$result = $conexion->query($sql);

// Verificar si se encontraron resultados
if ($result->num_rows > 0) {
    // Mostrar la descripción
    $row = $result->fetch_assoc();
    $descripcion = $row["descripcion"];
    echo '<div class="panel">';
    echo '<h3>Descripción:</h3>';
    echo '<p>' . $descripcion . '</p>';
    echo '</div>';
} else {
    echo "No se encontró ninguna descripción.";
}

// Cerrar la conexión (no es necesario aquí porque ya se cierra en conectar.php)
// $conn->close();
?>
