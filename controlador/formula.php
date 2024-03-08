<?php
// Agrega esta línea para incluir el archivo conectar.php
include("conexion/conectar.php");

// Obtener el ID del servicio desde la solicitud GET
$servicio_id = $_GET["servicio"];

// Consultar la base de datos para obtener el saldo del servicio seleccionado
$sql = "SELECT saldo FROM servicios WHERE id = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $servicio_id);
$stmt->execute();

// Verificar si hubo algún error en la consulta
if (!$stmt) {
    die("Error en la consulta: " . $conexion->error);
}

$stmt->bind_result($saldo);
$stmt->fetch();

// Devolver el saldo como respuesta
echo $saldo;

// Cerrar la conexión (no es necesario aquí porque ya se cierra en conectar.php)
// $stmt->close();
// $conexion->close();
?>
