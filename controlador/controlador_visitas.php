<?php
// Agrega esta línea para incluir el archivo conectar.php
include("../conexion/conectar.php");

// Consulta SQL para obtener el último ID registrado
$sql = "SELECT MAX(user_id) AS ultimo_id FROM users";

// Ejecutar la consulta
$resultado = $conexion->query($sql);

// Verificar si se encontraron resultados
if ($resultado->num_rows > 0) {
    // Obtener el último ID registrado
    $fila = $resultado->fetch_assoc();
    $ultimo_id = $fila['ultimo_id'];

    // Mostrar el último ID en la página
    echo $ultimo_id;
} else {
    // Mostrar un mensaje si no se encontraron registros
    echo "No se encontraron registros.";
}

// Cerrar la conexión (no es necesario aquí porque ya se cierra en conectar.php)
// $conexion->close();
?>
