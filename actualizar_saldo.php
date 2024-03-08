<?php
// Agrega esta línea para incluir el archivo conectar.php
include("conexion/conectar.php");

if(isset($_POST['enviar_formulario'])) {
    // Consulta para obtener el resultado de la tabla 'guardar'
    $resultadoConsulta = $mysqli->query("SELECT resultado, id_usuario FROM guardar");

    // Comprobar si la consulta fue exitosa
    if (!$resultadoConsulta) {
        echo "Error al ejecutar la consulta: " . $mysqli->error;
        exit();
    }

    // Obtener el resultado de la consulta
    $row = $resultadoConsulta->fetch_assoc();
    $resultado = $row['resultado'];
    $idUsuario = $row['id_usuario'];

    // Consulta para actualizar el saldo en la tabla 'users'
    $consultaUpdate = "UPDATE users SET saldo = saldo - $resultado WHERE id = $idUsuario";

    // Ejecutar la consulta de actualización
    if ($mysqli->query($consultaUpdate) === TRUE) {
        echo "Saldo actualizado correctamente en la tabla 'users'.";
    } else {
        echo "Error al actualizar el saldo: " . $mysqli->error;
    }
}
?>
