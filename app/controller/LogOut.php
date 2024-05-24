<?php

require_once __DIR__ . '/../utils/SessionHelper.php';


// if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
//     header("HTTP/1.1 405 Method Not Allowed");
//     exit("Solicitud no permitida.");
// }

try {

    SessionHelper::destroy();
    header('Location: login.php');

    
} catch (\Throwable $th) {
    // Captura de excepción
    $error = ['error' => $th->getMessage()];
    return json_encode($error); // Devuelve el error como un objeto JSON
}
