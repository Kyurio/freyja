<?php

require_once __DIR__ . '/../model/Administrador.php';

use app\model\Administrador;

// Verificar que la solicitud sea PUT
if ($_SERVER['REQUEST_METHOD'] !== 'PUT') {
    header("HTTP/1.1 405 Method Not Allowed");
    exit("Solicitud no permitida.");
}

try {
    $obj = new Administrador();

    // Obtener datos JSON de la solicitud
    $data = json_decode(file_get_contents('php://input'), true);

    // Validar y asignar datos a variables
    if (
        !isset($data["id_administrador"]) ||
        !isset($data["usuario"]) ||
        !isset($data["password"]) ||
        !isset($data["correo"])
    ) {
        header("HTTP/1.1 400 Bad Request");
        exit("Datos incompletos o incorrectos.");
    }

    $id_administrador = $data["id_administrador"];
    $usuario = $data["usuario"];
    $password = $data["password"]; // Contraseña sin encriptar
    $correo = $data["correo"];

    // Encriptar la contraseña
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Crear un arreglo con los datos a actualizar
    $datos_actualizados = [
        'usuario' => $usuario,
        'password' => $hashedPassword, // Guardamos la contraseña encriptada
        'correo' => $correo,
    ];

    // Ejecutar la función update y obtener el resultado
    $result = $obj->update($id_administrador, $datos_actualizados);

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
