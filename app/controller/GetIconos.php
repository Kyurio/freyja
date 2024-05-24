<?php
require_once __DIR__ . '/../model/Iconos.php';

use app\model\Iconos;


// Verificar que la solicitud sea GET
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    header("HTTP/1.1 405 Method Not Allowed");
    exit("Solicitud no permitida.");
}

try {

    $obj = new Iconos();
    $icons = $obj->getAll();
    echo json_encode($icons);
    
} catch (\Throwable $th) {
    echo $th->getMessage();
}

?>
