<?php
require_once __DIR__ . '/../model/Items_producto.php';

use app\model\Items_producto;

// Verificar que la solicitud sea GET
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    header("HTTP/1.1 405 Method Not Allowed");
    exit("Solicitud no permitida.");
}

try {

    $id = $_GET["id"];

    $obj = new Items_producto();
    $items = $obj->getById($id);
    echo json_encode($items);
    
} catch (\Throwable $th) {
    echo $th->getMessage();
}
?>
