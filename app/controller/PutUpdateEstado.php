<?php
require_once __DIR__ . '/../model/Producto.php';

use app\model\Producto;

// Verificar que la solicitud sea PUT
if ($_SERVER['REQUEST_METHOD'] !== 'PUT') {
    header("HTTP/1.1 405 Method Not Allowed");
    exit("Solicitud no permitida.");
}

try {
    $obj = new Producto();

    // Obtener datos JSON de la solicitud
    $json_data = file_get_contents('php://input');
    $data = json_decode($json_data, true);

    // Validar y asignar datos a variables
    if (!isset($data["id_producto"]) || !isset($data["estado"])) {
        header("HTTP/1.1 400 Bad Request");
        exit("Datos incompletos o incorrectos.");
    }

    $id_producto = $data["id_producto"];
    $estado = $data["estado"];
    
    // Cambiar el estado según la lógica
    $nuevo_estado = ($estado == 1) ? 1 : 0;

    // Crear un arreglo con los datos a actualizar
    $datos_actualizados = [
        'estado' => $nuevo_estado,
    ];

    // Ejecutar la función update y obtener el resultado
    $result = $obj->update($id_producto, $datos_actualizados);
    
    // Verificar si la actualización fue exitosa
    if ($result) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "message" => "Error al actualizar el elemento."]);
    }

} catch (\Throwable $th) {
    header("HTTP/1.1 500 Internal Server Error");
    echo json_encode(["success" => false, "message" => "Error en el servidor: " . $th->getMessage()]);
}
