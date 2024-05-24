<?php
require_once __DIR__ . '/../model/Producto.php';

use app\model\Producto;

// Verificar que la solicitud sea GET
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    header("HTTP/1.1 405 Method Not Allowed");
    exit("Solicitud no permitida.");
}

try {

    $id = $_GET["id"];

    $obj = new Producto();
    $producto = $obj->getById($id);
    echo json_encode($producto);
    
} catch (\Throwable $th) {
    echo $th->getMessage();
}
?>