<?php
require_once __DIR__ . '/../model/Questions.php';
use app\model\Questions;

try {
    //Validar que la solicitud sea del tipo GET
    if (strtolower($_SERVER['REQUEST_METHOD']) !== 'get') {
        throw new Exception('La solicitud debe ser del tipo get');
    }

    $obj = new Questions();
    $respuesta = $obj->GetAll();
    echo json_encode($respuesta);


} catch (\Throwable $th) {
    // http_response_code(400); // Solicitud incorrecta
    // echo json_encode(['error' => $th->getMessage()]);
    echo $th->getMessage();
}
