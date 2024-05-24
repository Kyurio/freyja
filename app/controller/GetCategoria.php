<?php
require_once __DIR__ . '/../model/Categoria.php';

use app\model\Categoria;

// Verificar que la solicitud sea GET
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    header("HTTP/1.1 405 Method Not Allowed");
    exit("Solicitud no permitida.");
}

try {

    $obj = new Categoria();
    $categoria = $obj->getAll();
    echo json_encode($categoria);
    
} catch (\Throwable $th) {
    echo $th->getMessage();
}
?>
