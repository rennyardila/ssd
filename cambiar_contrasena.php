<?php
// Agrega esta línea para incluir el archivo conectar.php
include("../conexion/conectar.php");

// Obtener datos del formulario
$usuario = $_POST['lname'];
$contrasena_antigua = $_POST['contrasena_antigua'];
$nueva_contrasena = $_POST['nueva_contrasena'];

// Verificar si el usuario existe en la base de datos
$sql = "SELECT * FROM users WHERE lname='$usuario'";
$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Verificar si la contraseña antigua proporcionada coincide con el hash almacenado en la base de datos
    if (password_verify($contrasena_antigua, $row['password'])) {
        // Generar el hash de la nueva contraseña
        $nueva_contrasena_hash = password_hash($nueva_contrasena, PASSWORD_DEFAULT);
        // Actualizar la contraseña en la base de datos
        $sql_update = "UPDATE users SET password='$nueva_contrasena_hash' WHERE lname='$usuario'";
        if ($conexion->query($sql_update) === TRUE) {
            // Redirigir según el valor de id_cargo
            if ($row['id_cargo'] == 1) {
                echo "<script>alert('Contraseña actualizada correctamente.'); window.location.href = '../dashboard/configuracion.php';</script>";
            } elseif ($row['id_cargo'] == 2) {
                echo "<script>alert('Contraseña actualizada correctamente.'); window.location.href = '../ñaña/configuracion.php';</script>";
            } else {
                echo "<script>alert('Contraseña actualizada correctamente, pero id_cargo no reconocido.');</script>";
            }
        } else {
            echo "<script>alert('Error al actualizar la contraseña: " . $conexion->error . "');</script>";
        }
    } else {
        echo "<script>alert('Usuario o contraseña antigua incorrectos.');</script>";
    }
} else {
    echo "<script>alert('Usuario no encontrado.');</script>";
}

$conexion->close();
?>
