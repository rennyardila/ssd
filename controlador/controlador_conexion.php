<?php
session_start();

// Agrega esta línea para incluir el archivo conectar.php
include("../conexion/conectar.php");

// Verificar si el usuario ha iniciado sesión
if (empty($_SESSION["user_id"])) {
    header("location: login.php"); // Redirigir a la página de inicio de sesión si no hay sesión activa
    exit(); // Finalizar el script para evitar que se ejecute más código innecesario
}

// Consulta SQL para obtener el saldo del usuario (reemplaza "saldo_columna" y "nombre_tabla" con los nombres reales)
$sql = "SELECT saldo FROM users WHERE user_id = ?";

// Preparar la sentencia SQL
$stmt = $conexion->prepare($sql);

// Vincular parámetros
$stmt->bind_param("i", $_SESSION["user_id"]);

// Ejecutar la consulta
$stmt->execute();

// Obtener el resultado de la consulta
$resultado = $stmt->get_result();

// Verificar si se encontraron resultados
if ($resultado->num_rows > 0) {
    // Obtener el saldo del primer registro (asumiendo que el usuario tiene solo un saldo)
    $fila = $resultado->fetch_assoc();
    $saldo = $fila["saldo"];

    // Guardar el saldo en la sesión
    $_SESSION["saldo"] = $saldo;
} else {
    // Si no se encuentra ningún saldo para el usuario, puedes establecer un valor predeterminado o mostrar un mensaje de error
    $_SESSION["saldo"] = 0; // Por ejemplo, saldo predeterminado de 0
    // También puedes mostrar un mensaje de error o registrar el problema para su posterior análisis
}

// Consulta SQL para obtener el saldo del usuario (reemplaza "saldo_columna" y "nombre_tabla" con los nombres reales)
$sql = "SELECT pedido FROM users WHERE user_id = ?";

// Preparar la sentencia SQL
$stmt = $conexion->prepare($sql);

// Vincular parámetros
$stmt->bind_param("i", $_SESSION["user_id"]);

// Ejecutar la consulta
$stmt->execute();

// Obtener el resultado de la consulta
$resultado = $stmt->get_result();

// Verificar si se encontraron resultados
if ($resultado->num_rows > 0) {
    // Obtener el saldo del primer registro (asumiendo que el usuario tiene solo un saldo)
    $fila = $resultado->fetch_assoc();
    $saldo = $fila["pedido"];

    // Guardar el saldo en la sesión
    $_SESSION["pedido"] = $saldo;
} else {
    // Si no se encuentra ningún saldo para el usuario, puedes establecer un valor predeterminado o mostrar un mensaje de error
    $_SESSION["pedido"] = 0; // Por ejemplo, saldo predeterminado de 0
    // También puedes mostrar un mensaje de error o registrar el problema para su posterior análisis
}

// Consulta SQL para obtener el nombre del usuario (reemplaza "nombre_columna" y "nombre_tabla" con los nombres reales)
$sql_nombre = "SELECT lname FROM users WHERE user_id = ?";

// Preparar la sentencia SQL para el nombre
$stmt_nombre = $conexion->prepare($sql_nombre);

// Vincular parámetros para el nombre
$stmt_nombre->bind_param("i", $_SESSION["user_id"]);

// Ejecutar la consulta para el nombre
$stmt_nombre->execute();

// Obtener el resultado de la consulta para el nombre
$resultado_nombre = $stmt_nombre->get_result();

// Verificar si se encontraron resultados para el nombre
if ($resultado_nombre->num_rows > 0) {
    // Obtener el nombre del primer registro (asumiendo que el usuario tiene solo un nombre)
    $fila_nombre = $resultado_nombre->fetch_assoc();
    $nombre = $fila_nombre["lname"];

    // Guardar el nombre en la sesión
    $_SESSION["lname"] = $nombre;
} else {
    echo "ERROR"; // Si no se encuentra ningún nombre para el usuario, puedes mostrar un mensaje de error o registrar el problema para su posterior análisis
}

// Consulta SQL para obtener el correo electrónico del usuario (reemplaza "email_columna" y "nombre_tabla" con los nombres reales)
$sql_email = "SELECT email FROM users WHERE user_id = ?";

// Preparar la sentencia SQL para el correo electrónico
$stmt_email = $conexion->prepare($sql_email);

// Vincular parámetros para el correo electrónico
$stmt_email->bind_param("i", $_SESSION["user_id"]);

// Ejecutar la consulta para el correo electrónico
$stmt_email->execute();

// Obtener el resultado de la consulta para el correo electrónico
$resultado_email = $stmt_email->get_result();

// Verificar si se encontraron resultados para el correo electrónico
if ($resultado_email->num_rows > 0) {
    // Obtener el correo electrónico del primer registro (asumiendo que el usuario tiene solo un correo electrónico)
    $fila_email = $resultado_email->fetch_assoc();
    $email = $fila_email["email"];

    // Guardar el correo electrónico en la sesión
    $_SESSION["email"] = $email;
} else {
    // Si no se encuentra ningún correo electrónico para el usuario, puedes mostrar un mensaje de error o registrar el problema para su posterior análisis
}

// Cerrar la conexión y liberar los recursos
$stmt->close();
$stmt_nombre->close();
$stmt_email->close();
$conexion->close();
?>
