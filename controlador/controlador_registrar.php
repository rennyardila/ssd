<?php
include("conexion/conectar.php");

if (isset($_POST['register'])) {
    // Verificar si todos los campos están presentes y no están vacíos
    if (
        isset($_POST['fname']) && isset($_POST['lname']) &&
        isset($_POST['email']) && isset($_POST['whatsapp']) &&
        isset($_POST['pais']) && isset($_POST['password']) &&
        !empty($_POST['fname']) && !empty($_POST['lname']) &&
        !empty($_POST['email']) && !empty($_POST['whatsapp']) &&
        !empty($_POST['pais']) && !empty($_POST['password'])
    ) {
        // Obtener los valores de los campos del formulario
        $nombre = trim($_POST['fname']);
        $usuario = trim($_POST['lname']);
        $email = trim($_POST['email']);
        $whatsapp = trim($_POST['whatsapp']);
        $pais = trim($_POST['pais']);
        $password = trim($_POST['password']);

        // Verificar si el correo electrónico ya está registrado
        $consultaEmail = "SELECT * FROM users WHERE email = ?";
        $statementEmail = mysqli_prepare($conexion, $consultaEmail);
        mysqli_stmt_bind_param($statementEmail, "s", $email);
        mysqli_stmt_execute($statementEmail);
        $resultadoEmail = mysqli_stmt_get_result($statementEmail);

        if (mysqli_num_rows($resultadoEmail) > 0) {
            echo "<script>alert('El correo electrónico ya está registrado. Por favor, utilice otro correo electrónico.');</script>";
        } else {
            // Verificar si el nombre de usuario ya está registrado
            $consultaUsuario = "SELECT * FROM users WHERE lname = ?";
            $statementUsuario = mysqli_prepare($conexion, $consultaUsuario);
            mysqli_stmt_bind_param($statementUsuario, "s", $usuario);
            mysqli_stmt_execute($statementUsuario);
            $resultadoUsuario = mysqli_stmt_get_result($statementUsuario);

            if (mysqli_num_rows($resultadoUsuario) > 0) {
                echo "<script>alert('El nombre de usuario ya está registrado. Por favor, utilice otro nombre de usuario.');</script>";
            } else {
                // Si el correo electrónico y el nombre de usuario no están registrados, insertar el nuevo usuario
                $unique_id = generateUniqueCode();
                // Generar un hash encriptado de la contraseña
                $encrypt_pass = password_hash($password, PASSWORD_DEFAULT);

                // Preparar la consulta SQL para insertar un nuevo usuario
                $consulta = "INSERT INTO users(unique_id, fname, lname, email, whatsapp, pais, password, id_cargo) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
                $statement = mysqli_prepare($conexion, $consulta);

                // Asignar el valor de 1 a id_cargo
                $id_cargo = 1;

                // Enlazar los parámetros, asegurándote de pasar el hash encriptado de la contraseña y el valor de id_cargo
                mysqli_stmt_bind_param($statement, "sssssssi", $unique_id, $nombre, $usuario, $email, $whatsapp, $pais, $encrypt_pass, $id_cargo);

                // Ejecutar la consulta
                $resultado = mysqli_stmt_execute($statement);


                if ($resultado) {
                    echo '<meta http-equiv="refresh" content="0;url=login.php">';
                    exit();
                } else {
                    echo "<script>alert('Ocurrió un error al registrar el usuario');</script>";
                }
            }
        }
    } else {
        echo "<script>alert('Por favor, llene todos los campos');</script>";
    }
}

// Función para generar un código único de 8 cifras
function generateUniqueCode()
{
    // Generar un número aleatorio de 8 cifras
    return rand(10000000, 99999999);
}
?>
