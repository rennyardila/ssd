<?php

$host = "localhost";
$usuario = "root";
$contraseña = "";
$base_de_datos = "login";

$conexion = new mysqli($host, $usuario, $contraseña, $base_de_datos);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

?>