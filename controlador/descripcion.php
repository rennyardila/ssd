<?php
// Agrega esta línea para incluir el archivo conectar.php
include("conexion/conectar.php");

// Verificar si se proporciona el parámetro 'servicio'
if (isset($_GET['servicio'])) {
    $servicioId = $_GET['servicio'];

    // Consulta para obtener la descripción del servicio seleccionado
    $consulta = "SELECT descripcion FROM servicios WHERE id = $servicioId";
    $resultado = mysqli_query($enlace, $consulta);

    // Verificar si se encontró el servicio
    if (mysqli_num_rows($resultado) > 0) {
        $fila = mysqli_fetch_assoc($resultado);
        echo $fila['descripcion'];
    } else {
        echo "Servicio no encontrado";
    }
}

// Cerrar la conexión (no es necesario aquí porque ya se cierra en conectar.php)
// mysqli_close($enlace);
?>
