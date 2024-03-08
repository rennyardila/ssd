<?php
// Asegúrate de que no haya una sesión activa antes de iniciarla
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include("conexion/conectar.php");

if (!empty($_POST["btningresar"])) {
    if (!empty($_POST["lname"]) && !empty($_POST["password"])) {
        // Preparar la consulta
        $consulta = "SELECT user_id, lname, password, id_cargo FROM users WHERE lname = ?";
        
        // Preparar la sentencia
        $stmt = $conexion->prepare($consulta);
        
        // Vincular los parámetros
        $stmt->bind_param("s", $_POST["lname"]);
        
        // Ejecutar la consulta
        $stmt->execute();
        
        // Almacenar el resultado
        $stmt->store_result();
        
        // Verificar si se encontraron datos
        if ($stmt->num_rows > 0) {
            // Si se encontraron datos, obtener el hash de la contraseña almacenada en la base de datos
            $stmt->bind_result($id, $usuario, $hash, $id_cargo);
            $stmt->fetch();

            // Verificar si la contraseña proporcionada coincide con el hash almacenado en la base de datos
            if (password_verify($_POST["password"], $hash)) {
                // Si la contraseña coincide, asignar valores a las variables de sesión
                $_SESSION["user_id"] = $id;
                $_SESSION["lname"] = $usuario;
                
                // Redirigir al usuario según el valor del campo id_cargo
                if ($id_cargo == 1) {
                    // Si id_cargo es 1, redirigir a seguidores.php
                    header("location: dashboard/seguidores.php");
                    exit();
                } elseif ($id_cargo == 2) {
                    // Si id_cargo es 2, redirigir a usuario.php
                    header("location: ñaña/dashboard.php");
                    exit();
                } else {
                    // Si id_cargo no es ni 1 ni 2, mostrar un mensaje de error
                    echo "Error: id_cargo inválido";
                }
            } else {
                // Si la contraseña no coincide, mostrar un mensaje de acceso denegado
                echo "Acceso Denegado";
            }
        } else {
            // Si no se encontraron datos, mostrar un mensaje de acceso denegado
            echo "Acceso Denegado";
        }

        // Cerrar la sentencia
        $stmt->close();
    } else {
        // Si los campos están vacíos, mostrar un mensaje
        echo "Campos vacíos";
    }
}
?>
