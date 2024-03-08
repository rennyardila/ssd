<?php
// Agrega esta línea para incluir el archivo conectar.php
include("conexion/conectar.php");

// Obtener los datos del formulario
$user_id = $_POST['user_id'];
$categoria = $_POST['categoria'];
$servicios_select = $_POST['servicios_select'];
$link = $_POST['link'];
$cantidad = $_POST['cantidad'];
$resultado = $_POST['resultado'];
$estado = $_POST['estado'];

// Obtener el saldo actual del usuario de la tabla users
$sql_saldo_actual = "SELECT saldo FROM users WHERE user_id = ?";
$stmt_saldo_actual = $conexion->prepare($sql_saldo_actual);
$stmt_saldo_actual->bind_param("i", $user_id);
$stmt_saldo_actual->execute();
$resultado_saldo_actual = $stmt_saldo_actual->get_result();

if ($resultado_saldo_actual) {
    // Obtener el saldo actual
    $fila = $resultado_saldo_actual->fetch_assoc();
    $saldo = $fila['saldo'];

    // Verificar si el saldo es suficiente
    if ($saldo <= 0 || $resultado > $saldo) {
        // Mostrar mensaje de fondos insuficientes
        echo '<script>alert("Fondos insuficientes"); window.location.href = "../dashboard/seguidores.php";</script>';
    } else {
        // Calcular el nuevo saldo
        $nuevo_saldo = $saldo - $resultado;

        // Insertar los datos en la tabla guardar
        $sql_insertar = "INSERT INTO guardar (user_id, categoria, servicios_select, link, cantidad, saldo, estado, resultado) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt_insertar = $conexion->prepare($sql_insertar);
        $stmt_insertar->bind_param("issssids", $user_id, $categoria, $servicios_select, $link, $cantidad, $nuevo_saldo, $estado, $resultado);
        
        if ($stmt_insertar->execute()) {
            // Actualizar el saldo en la tabla users
            $sql_actualizar_saldo = "UPDATE users SET saldo = ? WHERE user_id = ?";
            $stmt_actualizar_saldo = $conexion->prepare($sql_actualizar_saldo);
            $stmt_actualizar_saldo->bind_param("di", $nuevo_saldo, $user_id);

            if ($stmt_actualizar_saldo->execute()) {
                // Incrementar en 1 el valor de la columna "pedido" en la tabla users
                $sql_actualizar_pedido = "UPDATE users SET pedido = pedido + 1 WHERE user_id = ?";
                $stmt_actualizar_pedido = $conexion->prepare($sql_actualizar_pedido);
                $stmt_actualizar_pedido->bind_param("i", $user_id);

                if ($stmt_actualizar_pedido->execute()) {
                    // Código para redirigir a una página después de la inserción, actualización y aumento exitosos
                    echo '<script>alert("Datos insertados correctamente"); window.location.href = "../dashboard/seguidores.php";</script>';
                } else {
                    echo "Error al actualizar el pedido en la tabla users: " . $stmt_actualizar_pedido->error;
                }
            } else {
                echo "Error al actualizar el saldo en la tabla users: " . $stmt_actualizar_saldo->error;
            }
        } else {
            // En caso de error al insertar en la tabla guardar, mostrar el mensaje de error
            echo "Error al insertar datos en la tabla guardar: " . $stmt_insertar->error;
        }
    }
} else {
    // En caso de error al obtener el saldo actual, mostrar el mensaje de error
    echo "Error al obtener el saldo actual: " . $conexion->error;
}

// Cerrar la conexión (no es necesario aquí porque ya se cierra en conectar.php)
// $conexion->close();
?>
