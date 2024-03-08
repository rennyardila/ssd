<?php
// Incluir el archivo de conexión a la base de datos
include("../conexion/conectar.php");

// Consulta SQL para obtener todos los usuarios registrados
$sql = "SELECT usuario FROM login ORDER BY id DESC";
$resultado = mysqli_query($conexion, $sql);

// Verificar si se encontraron resultados
if (mysqli_num_rows($resultado) > 0) {
    // Mostrar cada usuario en la tabla
    while ($usuario = mysqli_fetch_assoc($resultado)) {
        echo "<div class='flex bg-gray-100 rounded p-4 mb-4'>";
        echo "<img src='../icon/ava.png' class='rounded-full w-12 mr-4'>";
        echo "<div class='w-full overflow-hidden'>";
        echo "<div class='flex mb-1'>";
        echo "<p class='flex-grow'>" . $usuario['usuario'] . "</p>";
        echo "<small class='text-gray-500'>08:50 am</small>";
        echo "</div>";
        echo "<small class='overflow-ellipsis overflow-hidden whitespace-nowrap block text-gray-500'>" . $usuario['usuario'] . "</small>";
        echo "</div>";
        echo "</div>";
    }
} else {
    // Si no se encontraron usuarios
    echo "<p>No se encontraron usuarios registrados.</p>";
}

// Cerrar la conexión
mysqli_close($conexion);
?>
