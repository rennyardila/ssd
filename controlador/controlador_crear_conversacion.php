<?php
// Verificar si se enviaron los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se proporcionó un destinatario
    if (isset($_POST["destinatario"]) && !empty($_POST["destinatario"])) {
        // Verificar si se proporcionó un mensaje
        if (isset($_POST["mensaje"]) && !empty($_POST["mensaje"])) {
            // Obtener el ID del destinatario y el mensaje del formulario
            $destinatario = $_POST["destinatario"];
            $mensaje = $_POST["mensaje"];
            
            // Conectar a la base de datos (reemplaza los valores con los de tu base de datos)
            $conexion = new mysqli("localhost", "root", "", "login");
            
            // Verificar si hay errores en la conexión
            if ($conexion->connect_error) {
                die("Error en la conexión: " . $conexion->connect_error);
            }
            
            // Preparar la consulta SQL para insertar la conversación en la base de datos
            $sql = "INSERT INTO conversaciones (destinatario_id, mensaje) VALUES (?, ?)";
            
            // Preparar la sentencia
            $stmt = $conexion->prepare($sql);
            
            // Vincular los parámetros
            $stmt->bind_param("is", $destinatario, $mensaje);
            
            // Ejecutar la consulta
            if ($stmt->execute()) {
                // La conversación se guardó correctamente
                echo "La conversación se creó correctamente.";
            } else {
                // Error al guardar la conversación
                echo "Error: No se pudo guardar la conversación en la base de datos.";
            }
            
            // Cerrar la conexión
            $conexion->close();
        } else {
            echo "Se requiere un mensaje para enviar.";
        }
    } else {
        echo "Se requiere un ID de destinatario válido para iniciar la conversación.";
    }
} else {
    // Si no se enviaron los datos del formulario correctamente, puedes redirigir al usuario a otra página o mostrar un mensaje de error
    echo "Error: Los datos del formulario no se recibieron correctamente.";
}
?>
