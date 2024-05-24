<?php
require_once __DIR__ . '/../model/Producto.php';

use app\model\Producto;

// Verificar que la solicitud sea GET
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    header("HTTP/1.1 405 Method Not Allowed");
    exit("Solicitud no permitida.");
}

try {

    $obj = new Producto();
    $estadistica = $obj->getCantidadTipoProducto();
    echo json_encode($estadistica);
    
} catch (\Throwable $th) {
    echo $th->getMessage();
}
?>
