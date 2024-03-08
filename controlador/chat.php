<?php
// Verificar si se recibió un ID de usuario válido a través de la solicitud
if(isset($_GET['id']) && !empty($_GET['id'])) {
    // Obtener el ID del usuario con el que se quiere iniciar la conversación
    $id_usuario_destino = $_GET['id'];
    
    // Conectar a la base de datos (reemplaza los valores con los de tu base de datos)
    $conexion = mysqli_connect("localhost", "root", "", "login");

    // Verificar si hay errores en la conexión
    if ($conexion->connect_error) {
        die("Error en la conexión: " . $conexion->connect_error);
    }

    // Verificar si el usuario de destino existe en la base de datos
    $sql = "SELECT * FROM login WHERE id = $id_usuario_destino";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) {
        // El usuario de destino existe, por lo que puedes proceder a iniciar la conversación
        
        // Aquí puedes implementar el código para crear una nueva conversación en tu base de datos
        // Por ejemplo, podrías insertar una nueva fila en una tabla de conversaciones
        
        // Crear una nueva conversación
        $sql_nueva_conversacion = "INSERT INTO conversaciones (usuario_destino_id) VALUES ($id_usuario_destino)";
        
        // Ejecutar la consulta para crear la nueva conversación
        if ($conexion->query($sql_nueva_conversacion) === TRUE) {
            echo "Conversación iniciada exitosamente con el usuario.";
        } else {
            echo "Error al iniciar la conversación: " . $conexion->error;
        }
        
        // Cerrar la conexión
        $conexion->close();
    } else {
        // El usuario de destino no existe en la base de datos
        echo "El usuario con ID $id_usuario_destino no existe.";
    }
} else {
    // No se proporcionó un ID de usuario válido
    echo "Se requiere un ID de usuario válido para iniciar la conversación.";
}
?>
