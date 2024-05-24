<?php
require_once __DIR__ . '/../model/Producto.php';

use app\model\Producto;

// Verificar que la solicitud sea POST (o el método adecuado)
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("HTTP/1.1 405 Method Not Allowed");
    exit("Solicitud no permitida.");
}

try {
    $obj = new Producto(); 
    
    // Obtener datos JSON de la solicitud
    $data = json_decode(file_get_contents('php://input'), true);

    // Validar y asignar datos a variables
    $id_producto = $data["id_producto"] ?? null;

    // Comprobar que los datos requeridos estén presentes
    if ($id_producto === null) {
        header("HTTP/1.1 400 Bad Request");
        exit("Datos incompletos o incorrectos.");
    }

    //Ejecutar la función create y obtener el resultado
    $result = $obj->delete($id_producto);

    // Verificar si la inserción fue exitosa
    if ($result) {
        echo true;
    } else {
        echo false;
    }

} catch (\Throwable $th) {
    header("HTTP/1.1 500 Internal Server Error");
    echo "Error al crear el elemento: " . $th->getMessage();
}
