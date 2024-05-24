<?php
require_once __DIR__ . '/../model/Video.php';

use app\model\Video;

// Verificar que la solicitud sea GET
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    header("HTTP/1.1 405 Method Not Allowed");
    exit("Solicitud no permitida.");
}

try {

    $obj = new Video();
    $usuario = $obj->getLastVideo();
    echo json_encode($usuario);
    
} catch (\Throwable $th) {
    echo $th->getMessage();
}
?>
