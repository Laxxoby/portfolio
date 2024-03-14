<?php
// Recoge los datos del formulario
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$contenido = $_POST['contenido'];

// Comprueba si el correo electrónico es válido
if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    echo 'La dirección de correo electrónico no es válida.';
    exit; // Detiene la ejecución del script si la dirección de correo electrónico no es válida
}

// Configura el destinatario del correo
$destinatario = 'johanlassof@gmail.com';

// Configura el asunto del correo
$asunto = 'Nuevo mensaje de contacto desde el formulario';

// Construye el mensaje del correo
$mensaje = "Nombre: $nombre\n";
$mensaje .= "Correo electrónico: $correo\n\n";
$mensaje .= "Mensaje:\n$contenido";

// Envia el correo electrónico
$enviado = mail($destinatario, $asunto, $mensaje);

// Verifica si el correo se envió correctamente
if ($enviado) {
    echo 'El mensaje ha sido enviado correctamente.';
} else {
    echo 'Hubo un problema al enviar el mensaje. Por favor, inténtalo de nuevo más tarde.';
    echo 'Error: ' . error_get_last()['message']; // Muestra el mensaje de error específico
}
?>
