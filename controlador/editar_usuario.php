<?php
// Obtener el ID del usuario de la URL
if (isset($_GET['id'])) {
    $usuario_id = $_GET['id'];
    
    // Agrega esta línea para incluir el archivo conectar.php
    include("../conexion/conectar.php");

    // Consulta SQL para obtener los detalles del usuario
    $sql = "SELECT * FROM users WHERE user_id = $usuario_id";

    // Ejecutar la consulta
    $resultado = $conexion->query($sql);

    // Verificar si se encontraron resultados
    if ($resultado->num_rows > 0) {
        // Mostrar el formulario de edición
        while ($fila = $resultado->fetch_assoc()) {
            ?>
            <form action="controlador_actualizar_usuario.php" method="POST" style="width: 50%; margin: auto; padding: 20px; border: 1px solid #ccc; border-radius: 5px;">
                <input type="hidden" name="user_id" value="<?php echo $fila['user_id']; ?>">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="<?php echo $fila['fname']; ?>" style="width: 100%; padding: 10px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 5px;"><br>
                
                <label for="usuario">Usuario:</label>
                <input type="text" id="usuario" name="usuario" value="<?php echo $fila['lname']; ?>" style="width: 100%; padding: 10px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 5px;"><br>
                
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $fila['email']; ?>" style="width: 100%; padding: 10px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 5px;"><br>
                
                <label for="whatsapp">Whatsapp:</label>
                <input type="text" id="whatsapp" name="whatsapp" value="<?php echo $fila['whatsapp']; ?>" style="width: 100%; padding: 10px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 5px;"><br>

                <label for="pais">Pais:</label>
                <input type="text" id="pais" name="pais" value="<?php echo $fila['pais']; ?>" style="width: 100%; padding: 10px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 5px;"><br>
                
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" value="<?php echo $fila['password']; ?>" style="width: 100%; padding: 10px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 5px;"><br>
                
                <label for="saldo">Saldo:</label>
                <input type="text" id="saldo" name="saldo" value="<?php echo $fila['saldo']; ?>" style="width: 100%; padding: 10px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 5px;"><br>

                <label for="id_cargo">Cargo:</label>
                <input type="text" id="id_cargo" name="id_cargo" value="<?php echo $fila['id_cargo']; ?>" style="width: 100%; padding: 10px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 5px;"><br>

                <input type="submit" value="Guardar cambios" style="width: 100%; padding: 10px; background-color: #007bff; color: #fff; border: none; border-radius: 5px; cursor: pointer;">
            </form>

            <?php
        }
    } else {
        // Mostrar un mensaje si no se encuentra el usuario
        echo "Usuario no encontrado.";
    }

    // Cerrar la conexión (no es necesario aquí porque ya se cierra en conectar.php)
    // $conexion->close();
} else {
    // Redirigir a la página de la tabla si no se proporciona el ID del usuario
    header("Location: ../dashboard/seguidores.php");
    exit();
}
?>
