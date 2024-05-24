<?php
require_once __DIR__ . '/../model/Producto.php';
require_once __DIR__ . '/../utils/SessionHelper.php';

use app\model\Producto;

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

            // Obtener datos JSON de la solicitud
            $data = json_decode(file_get_contents('php://input'), true);

            // Validar y asignar datos a variables
            $categoria = $data["categoria"] ?? null;
            $producto = $data["producto"] ?? null;
            $descripcion = $data["descripcion"] ?? null;
            $item = $data["item"] ?? null;
            $precio = $data["precio"] ?? null;
            $stock = $data["stock"] ?? null;
            $oferta = $data["oferta"] ?? null;

            // Comprobar que los datos requeridos estén presentes
            if ($categoria === null || $producto === null || $precio === null || $stock === null || $oferta === null) {
                header("HTTP/1.1 400 Bad Request");
                exit("Datos incompletos o incorrectos.");
            }

            // Crear un array con los datos
            $data = [
                'id_categoria' => $categoria,
                'nombre' => $producto,
                'descripcion' => $descripcion,
                'item' => $item,
                'precio' => $precio,
                'stock' => $stock,
                'oferta' => $oferta,
            ];

            //Ejecutar la función create y obtener el resultado
            $result = $obj->create($data);

            // Verificar si la inserción fue exitosa
            if ($result) {
                echo true;
            } else {
                echo false;
            }
            
        } catch (\Throwable $th) {
            echo "Error al crear el elemento: " . $th->getMessage();
        }

    } else {

        echo "Acceso no permitido debido a falta de token CSRF válido.";

    }
}