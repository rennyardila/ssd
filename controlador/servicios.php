<?php
// Incluye el archivo de conexión
include("conexion/conectar.php");

// Obtiene el parámetro 'c' enviado por AJAX
$categoria = $_GET['c'];

// Realiza la consulta a la base de datos para obtener los servicios y sus descripciones según la categoría seleccionada
$query = "SELECT servicio, descripcion, saldo, tiempo FROM servicios WHERE id = ?";
$stmt = $conexion->prepare($query);
$stmt->bind_param("i", $categoria);
$stmt->execute();
$resultado = $stmt->get_result();

// Genera las opciones del select de servicios junto con las descripciones correspondientes
$options = "<option value='0'>Seleccione</option>";
while ($fila = $resultado->fetch_assoc()) {
    $servicio = $fila['servicio'];
    $descripcion = $fila['descripcion'];
    $saldo = $fila['saldo'];
    $tiempo = $fila['tiempo'];
    $options .= "<option value='$servicio' data-descripcion='$descripcion' data-saldo='$saldo' data-tiempo='$tiempo'>$servicio</option>";
}

echo $options;

// Cierra la conexión y la sentencia preparada
$stmt->close();
$conexion->close();
?>
