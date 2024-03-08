<?php
// Agrega esta línea para incluir el archivo conectar.php
include("../conexion/conectar.php");

// Consulta SQL para seleccionar los últimos 10 usuarios y sus países
$sql = "SELECT lname, pais FROM users ORDER BY user_id DESC LIMIT 10";

// Ejecutar la consulta
$resultado = $conexion->query($sql);

// Verificar si se encontraron resultados
if ($resultado->num_rows > 0) {
    // Mostrar los últimos 10 usuarios y sus países en la tabla
    while ($fila = $resultado->fetch_assoc()) {
        echo '<tr>';
        echo '<td width="60px"><div class="imgBx"><img src="../icon/avatar.png" alt=""></div></td>';
        echo '<td><h4>' . $fila["lname"] . '<br><span>' . $fila["pais"] . '</span></h4></td>';
        echo '</tr>';
    }
} else {
    // Mostrar un mensaje si no se encontraron usuarios
    echo "<tr><td colspan='2'>No se encontraron usuarios.</td></tr>";
}

// Cerrar la conexión (no es necesario aquí porque ya se cierra en conectar.php)
// $conexion->close();
?>
