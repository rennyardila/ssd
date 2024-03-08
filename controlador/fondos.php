<?php
// Agrega esta línea para incluir el archivo conectar.php
include("conexion/conectar.php");

// Consulta SQL para obtener el saldo total en la tabla login
$sql_saldo_login = "SELECT saldo FROM login";
$result_saldo_login = $conexion->query($sql_saldo_login);

if ($result_saldo_login->num_rows > 0) {
    // Obtener el saldo de la tabla login
    $row_saldo_login = $result_saldo_login->fetch_assoc();
    $saldo_login = $row_saldo_login["saldo"];

    // Consulta SQL para obtener el total de costos en la tabla servicios
    $sql_total_costos = "SELECT SUM(saldo) AS total_costos FROM servicios";
    
    // Preparar y ejecutar la consulta utilizando una sentencia preparada
    $stmt_total_costos = $conexion->prepare($sql_total_costos);
    $stmt_total_costos->execute();
    
    // Obtener el resultado de la consulta
    $result_total_costos = $stmt_total_costos->get_result();

    if ($result_total_costos->num_rows > 0) {
        // Obtener el total de costos de la tabla servicios
        $row_total_costos = $result_total_costos->fetch_assoc();
        $total_costos = $row_total_costos["total_costos"];

        // Calcular el saldo final restando el total de costos del saldo actual
        $saldo_final = $saldo_login - $total_costos;

        // Mostrar el saldo final en el formulario
        echo "Saldo actual: " . $saldo_final;
    } else {
        echo "No se encontraron registros de servicios.";
    }
} else {
    echo "No se encontró el saldo en la tabla login.";
}

// Cerrar la conexión (no es necesario aquí porque ya se cierra en conectar.php)
// $conn->close();
?>
