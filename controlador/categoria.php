<?php
// Agrega esta línea para incluir el archivo conectar.php
include("conexion/conectar.php");

// Consulta para obtener las categorías
$consulta = "SELECT * FROM categoria";
$ejecutarConsulta = mysqli_query($enlace, $consulta);

// Verificar si la consulta fue exitosa
if (!$ejecutarConsulta) {
    echo "Error al ejecutar la consulta: " . mysqli_error($enlace);
    exit();
}

// Mostrar las opciones de categoría
while($fila = mysqli_fetch_array($ejecutarConsulta)){
    echo "<option value='".$fila['id']."'>".$fila['categoria']."</option>";
}

// Cerrar la conexión
mysqli_close($enlace);
?>
