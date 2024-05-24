<?php
require_once __DIR__ . '/../model/Producto.php';
require_once __DIR__ . '/../model/Items_producto.php';
require_once __DIR__ . '/../utils/SessionHelper.php';

use app\model\Producto;
use app\model\Items_producto;

// Verificar que la solicitud sea POST (o el método adecuado)
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("HTTP/1.1 405 Method Not Allowed");
    exit("Solicitud no permitida.");
}

// Validar el token CSRF
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    SessionHelper::startSession();
    // Comprobar si el token CSRF enviado coincide con el almacenado en la sesión
    if ($_SESSION['csrf_token'] === $_SERVER['HTTP_X_CSRF_TOKEN']) {

        try {
            $obj = new Producto();
            $items = new Items_producto();

            // Obtener datos JSON de la solicitud
            $data = json_decode(file_get_contents('php://input'), true);

            //obtiene le ultimo id  de producto
            //die(var_dump($data));

            // Validar y asignar datos a variables
            $icon = $data["id_producto"] ?? null;
            $item = $data["id_icon"] ?? null;

            // Comprobar que los datos requeridos estén presentes
            // if ($icon === null || $item === null) {
            //     header("HTTP/1.1 400 Bad Request");
            //     exit("Datos incompletos o incorrectos.");
            // }


            $responseArray = $obj->getLastInsertedId();
            $id = $responseArray[0]['id_producto'];

            $selectedItems = $data;
            foreach ($data as $item) {

                $data = [
                    'id_producto' => $id,
                    'id_icon' => $item,
                ];

                //Ejecutar la función create y obtener el resultado
                $result = $items->create($data);

                // Crear un array con los datos
                if ($result) {
                    echo true;
                } else {
                    echo false;
                }
            }

        } catch (\Throwable $th) {
            echo "Error al crear el elemento: " . $th->getMessage();
        }
    } else {

        echo "Acceso no permitido debido a falta de token CSRF válido.";
    }
}
