<?php
require_once __DIR__ . '/../model/Categoria.php';
require_once __DIR__ . '/../utils/SessionHelper.php';

use app\model\Categoria;

// Verificar que la solicitud sea POST (o el método adecuado)
if ($_SERVER['REQUEST_METHOD'] !== 'PUT') {
    header("HTTP/1.1 405 Method Not Allowed");
    exit("Solicitud no permitida.");
}

// Validar el token CSRF
if ($_SERVER['REQUEST_METHOD'] === 'PUT') {

    SessionHelper::startSession();
    // Comprobar si el token CSRF enviado coincide con el almacenado en la sesión
    if ($_SESSION['csrf_token'] === $_SERVER['HTTP_X_CSRF_TOKEN']) {

        try {
            $obj = new Categoria();

            // Obtener datos JSON de la solicitud
            $data = json_decode(file_get_contents('php://input'), true);


            // Validar y asignar datos a variables
            $categoria = $data["id_categoria"] ?? null;
            $categoria = $data["categoria"] ?? null;


            // Comprobar que los datos requeridos estén presentes
            if ($categoria === null || $id_categoria === null) {
                header("HTTP/1.1 400 Bad Request");
                exit("Datos incompletos o incorrectos.");
            }


            $id_categoria = $data["id_categoria"];
            // Crear un array con los datos
            $data = [
                'nombre' => $categoria,
            ];

            die($data);

            //Ejecutar la función create y obtener el resultado
            $result = $obj->update($id_categoria,$data);

            // Verificar si la inserción fue exitosa
            if ($result) {
                echo "true";
            } else {
                echo "false";
            }
            
        } catch (\Throwable $th) {
            echo "Error al crear el elemento: " . $th->getMessage();
        }

    } else {

        echo "Acceso no permitido debido a falta de token CSRF válido.";

    }
}