<?php
require_once __DIR__ . '/../../vendor/autoload.php';
use MercadoPago\SDK;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("HTTP/1.1 405 Method Not Allowed");
    exit("Solicitud no permitida.");
}


try {
    // Inicializa el SDK de MercadoPago con tus credenciales
    SDK::setAccessToken('TEST-6882899692176487-101110-a0be41f1c025585729d24013f908a54c-362254467');

    // Obtener datos JSON de la solicitud
    $data = json_decode(file_get_contents('php://input'), true);
    
    // Crear una nueva preferencia
    $preference = new MercadoPago\Preference();
    // Iterar a través de tu array de productos y agregar cada uno como un elemento de Item
    $items = [];  // Crear un array separado para los elementos
    foreach ($data as $producto) {
        $item = new MercadoPago\Item();
        $item->title = $producto['nombre'];
        $item->quantity = 1;
        $item->unit_price = $producto['precio']; // Precio del producto
        $items[] = $item;
    }
    $preference->items = $items; 
    // URL a la que se redirigirá al usuario después del pago (reemplaza con tu URL)
    $preference->back_urls = [
        "success" => "http://tu-sitio.com/pago-exitoso",
        "failure" => "http://tu-sitio.com/pago-fallido",
        "pending" => "http://tu-sitio.com/pago-pendiente"
    ];
    // Notificar URL (opcional, para recibir notificaciones de pago)
    $preference->notification_url = "http://tu-sitio.com/notificacion-pago";
    // Configurar la información del comprador (opcional)
    $buyer = new MercadoPago\Payer();
    $buyer->name = "Nombre del Comprador";
    $buyer->email = "correo@ejemplo.com";
    $preference->payer = $buyer;
    $preference->save();
    $preference_id = $preference->id; // Obtiene el ID de la preferencia
    // Devuelve el ID de la preferencia para su uso en el front-end
    echo json_encode(['preference_id' => $preference_id]);

} catch (\Throwable $th) {
    echo json_encode(['error' => $th->getMessage()]);
}
