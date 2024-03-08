<?php
// Verificar si se envió el formulario de actualización
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se recibió el ID del usuario y los demás datos del formulario
    if (isset($_POST['user_id']) && isset($_POST['nombre']) && isset($_POST['usuario']) && isset($_POST['email']) && isset($_POST['whatsapp']) && isset($_POST['pais']) && isset($_POST['password']) && isset($_POST['saldo']) && isset($_POST['id_cargo'])) {
        // Obtener los datos del formulario
        $id = $_POST['user_id'];
        $nombre = $_POST['nombre'];
        $usuario = $_POST['usuario'];
        $email = $_POST['email'];
        $whatsapp = $_POST['whatsapp'];
        $pais = $_POST['pais'];
        $password = $_POST['password'];
        $saldo = $_POST['saldo'];
        $id_cargo = $_POST['id_cargo'];

        
        // Obtener el valor de id_cargo
        $id_cargo = $_POST['id_cargo'];

        // Conectar a la base de datos (reemplaza los valores con los de tu base de datos)
        $conexion = mysqli_connect("localhost", "root", "", "chat");

        // Verificar si hay errores en la conexión
        if ($conexion->connect_error) {
            die("Error en la conexión: " . $conexion->connect_error);
        }

        // Consulta SQL para actualizar los datos del usuario
        if ($id_cargo == 1) {
            // Redirigir a una location si id_cargo es igual a 2
            $sql = "UPDATE users SET fname='$nombre', lname='$usuario', email='$email', whatsapp='$whatsapp', pais='$pais', password='$password', saldo='$saldo', id_cargo='$id_cargo' WHERE user_id=$id";
            $location = "../dashboard/seguidores.php";
        } elseif ($id_cargo == 2) {
            // Redirigir a otra location si id_cargo es igual a 1
            $sql = "UPDATE users SET fname='$nombre', lname='$usuario', email='$email', whatsapp='$whatsapp', pais='$pais', password='$password', saldo='$saldo', id_cargo='$id_cargo' WHERE user_id=$id";
            $location = "../ñaña/dashboard.php";
        } else {
            // Manejar otro caso si id_cargo no es ni 1 ni 2
            echo "Error: Valor de id_cargo no válido.";
            exit();
        }

        // Ejecutar la consulta
        if ($conexion->query($sql) === TRUE) {
            // Redirigir a la página correspondiente con un mensaje de éxito
            header("Location: $location?mensaje=Usuario actualizado correctamente");
            exit();
        } else {
            // Mostrar un mensaje de error si la consulta falla
            echo "Error al actualizar el usuario: " . $conexion->error;
        }

        // Cerrar la conexión
        $conexion->close();
    } else {
        // Mostrar un mensaje de error si no se reciben todos los datos del formulario
        echo "Error: Falta información del formulario.";
    }
} else {
    // Redirigir a la página de la tabla de usuarios si se intenta acceder directamente a este controlador
    header("Location: tabla_usuarios.php");
    exit();
}
?>
