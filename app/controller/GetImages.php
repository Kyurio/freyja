<?php
require_once __DIR__ . '/../model/Imagen.php';

use app\model\Imagen;

// Verificar que la solicitud sea GET
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    header("HTTP/1.1 405 Method Not Allowed");
    exit("Solicitud no permitida.");
}

try {

    $id = $_GET["id"];

    $obj = new Imagen();
    $imgs = $obj->getById($id);
    echo json_encode($imgs);
    
} catch (\Throwable $th) {
    echo $th->getMessage();
}
?>
