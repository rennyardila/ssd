<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notificaciones en tiempo real</title>
</head>
<body>
    <!-- Botón para activar la verificación de nuevas notificaciones -->
    <button onclick="verificarNuevasNotificaciones()">Verificar Notificaciones</button>

    <!-- Script para verificar nuevas notificaciones -->
    <script>
        // Función para verificar nuevas notificaciones
        function verificarNuevasNotificaciones() {
            fetch('notificar.php?checkNotifications=1')
                .then(response => response.json())
                .then(data => {
                    // Manejar las nuevas notificaciones
                    data.forEach(notificacion => {
                        alert(notificacion.mensaje); // Muestra la notificación (puedes personalizar esto)
                    });
                });
        }

        // Verificar nuevas notificaciones cada 5 segundos
        setInterval(verificarNuevasNotificaciones, 5000); // 5000 milisegundos = 5 segundos
    </script>
</body>
</html>
