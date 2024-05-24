<?php

require_once __DIR__ . '/../../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Obtener datos JSON de la solicitud
$data = json_decode(file_get_contents('php://input'), true);

// Uso de la función
$nombre = $data["nombre"];
$destinatario = 'contacto@losvallesinmobiliaria.cl';
$correo = $data["correo"];
$asunto = $data["asunto"];
$mensaje = $data["mensaje"];

// Verificar que la solicitud sea POST (o el método adecuado)
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("HTTP/1.1 405 Method Not Allowed");
    exit("Solicitud no permitida.");
}

function enviarCorreo($destinatario, $asunto, $mensaje, $nombre, $correo) {

    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'mail.losvallesinmobiliaria.cl';
        $mail->SMTPAuth = true;
        $mail->Username = 'contacto@losvallesinmobiliaria.cl';
        $mail->Password = 'Administracion1234-';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Configuración del remitente y destinatario
        $mail->setFrom('contacto@losvallesinmobiliaria.cl', 'Los Valles Inmobiliaria');
        $mail->addAddress($destinatario, $nombre);

        // Contenido del correo
        $mail->isHTML(true);
        $mail->Subject = 'Nuevo mensaje desde el sitio web - Asunto: ' . $asunto;
        $mail->Body = '
            <html>
            <body>
                <h3>Nuevo mensaje desde el sitio web:</h3>
                <p><strong>Nombre:</strong> ' . $nombre . '</p>
                <p><strong>Correo Electrónico:</strong> ' . $correo . '</p>
                <p><strong>Asunto:</strong> ' . $asunto . '</p>
                <p><strong>Mensaje:</strong></p>
                <p>' . $mensaje . '</p>
            </body>
            </html>';

        // Enviar el correo
        $mail->send();
        return true;

    } catch (Exception $e) {
        return false;
    }
}

if (enviarCorreo($destinatario, $asunto, $mensaje, $nombre, $correo)) {
    echo true;
} else {
    echo false;
}
?>
