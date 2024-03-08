<?php
// Configurar los parámetros de SMTP
ini_set("SMTP", "smtp.gmail.com");
ini_set("smtp_port", "587");
ini_set("sendmail_from", "tucorreo@gmail.com");

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$mensaje = $_POST['mensaje'];

// Dirección de correo electrónico a la que se enviará el mensaje
$destinatario = "bucaramangamarketing@gmail.com";

// Asunto del correo electrónico
$asunto = "Nuevo mensaje de $nombre";

// Cuerpo del correo electrónico
$cuerpo = "Mensaje de: $nombre\n";
$cuerpo .= "Mensaje: $mensaje\n";

// Cabeceras adicionales
$cabeceras = "From: tucorreo@gmail.com\r\n";
$cabeceras .= "Reply-To: tucorreo@gmail.com\r\n";
$cabeceras .= "X-Mailer: PHP/" . phpversion();

// Enviar el correo electrónico
if (mail($destinatario, $asunto, $cuerpo, $cabeceras)) {
    echo "El mensaje se envió correctamente.";
} else {
    echo "Error al enviar el mensaje. Por favor, inténtalo de nuevo.";
}
?>
