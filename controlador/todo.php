<?php
    // Conexión a la base de datos
    $servername = "localhost"; // Cambia esto por tu servidor de base de datos
    $username = "root"; // Cambia esto por tu nombre de usuario de MySQL
    $password = ""; // Cambia esto por tu contraseña de MySQL
    $database = "chat"; // Cambia esto por el nombre de tu base de datos

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $database);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Obtener la categoría seleccionada desde el formulario (asegúrate de sanitizar y validar esta entrada para evitar inyección de SQL)
    $categoria = $_POST['categoria']; 

    // Consulta SQL para obtener los servicios asociados a la categoría seleccionada
    $sql = "SELECT servicios.servicio
            FROM categorias 
            INNER JOIN servicios ON categorias.id_categ = servicios.id_categ 
            WHERE categorias.categoria = '$categoria'";

    $result = $conn->query($sql);

    // Verificar si se encontraron resultados
    if ($result->num_rows > 0) {
        // Recorrer los resultados y mostrar cada servicio como una opción en el select
        while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row["servicio"] . '">' . $row["servicio"] . '</option>';
        }
    } else {
        echo '<option value="">No hay servicios disponibles para esta categoría</option>';
    }

    // Cerrar la conexión
    $conn->close();
?>
