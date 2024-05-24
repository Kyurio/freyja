<?php

require_once __DIR__ . '/../../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Obtener datos JSON de la solicitud
$data = json_decode(file_get_contents('php://input'), true);

// Uso de la función
$nombre = $data["nombre"];
$destinatario = $data["correo"];
$telefono = $data["telefono"];
$hectareas = $data["hectareas"];
$ubicacion = $data["ubicacion"];
$mensaje = $data["mensaje"];
$nombreParcela = $data["nombre_parcela"]; // Nuevo campo para el nombre de la parcela
$asunto = 'Venta de terrenos - ' . $nombreParcela; // Concatenar el nombre de la parcela en el asunto

// Construir el cuerpo del correo
$mailBody = "Nombre: $nombre\nTeléfono: $telefono\nUbicación: $ubicacion\nHectáreas: $hectareas\nMensaje: $mensaje";

// Verificar que la solicitud sea POST (o el método adecuado)
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("HTTP/1.1 405 Method Not Allowed");
    exit("Solicitud no permitida.");
}

function enviarCorreo($destinatario, $asunto, $cuerpoCorreo) {
    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'mail.losvallesinmobiliaria.cl'; // Eliminé el espacio al final
        $mail->SMTPAuth = true;
        $mail->Username = 'contacto@losvallesinmobiliaria.cl';
        $mail->Password = 'Administracion1234-';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Configuración del remitente y destinatario
        $mail->setFrom('contacto@losvallesinmobiliaria.cl', 'Los Valles Inmobiliaria');
        $mail->addAddress('contacto@losvallesinmobiliaria.cl');
        
        // Contenido del correo
        $mail->isHTML(true);
        $mail->Subject = "Contacto desde el producto: $asunto";
        $mail->Body = $cuerpoCorreo;

        // Enviar el correo
        $mail->send();
        return true;

    } catch (Exception $e) {
        return false;
    }
}

if (enviarCorreo($destinatario, $asunto, $mailBody)) {
    echo true;
} else {
    echo false;
}
?>
