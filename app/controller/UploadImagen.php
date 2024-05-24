<?php

require_once __DIR__ . '/../model/Imagen.php';
require_once __DIR__ . '/../model/Producto.php';

use app\model\Imagen;
use app\model\Producto;

// Verificar que la solicitud sea POST (o el método adecuado)
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("HTTP/1.1 405 Method Not Allowed");
    exit("Solicitud no permitida.");
}

try {
    $obj = new Imagen();
    $prod = new Producto();

    $carpetaDestino = '../../assets/img/';

    if (!file_exists($carpetaDestino)) {
        mkdir($carpetaDestino, 0755, true);
    }

    if (isset($_FILES['imagenes']) && is_array($_FILES['imagenes'])) {
        $imagenes = $_FILES['imagenes'];
        // Resto del código para procesar las imágenes.

        $imagenes = $_FILES['imagenes'];

        $success = true; // Variable para rastrear si todas las imágenes se procesaron correctamente.
        $errorMessage = "Hubo problemas al procesar las siguientes imágenes:\n";
        $errorCount = 0;

        foreach ($imagenes['tmp_name'] as $key => $tmp_name) {

            $nombreArchivo = basename($imagenes['name'][$key]);
            $tipoArchivo = $imagenes['type'][$key];
            $tamañoArchivo = $imagenes['size'][$key];
            $tempArchivo = $tmp_name;

            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];

            if (in_array($tipoArchivo, $allowedTypes)) {
                $nombreArchivoUnico = uniqid('', true) . '_' . $nombreArchivo;
                $destinoArchivo = $carpetaDestino . $nombreArchivoUnico;

                if (move_uploaded_file($tempArchivo, $destinoArchivo)) {
                    $responseArray = $prod->getLastInsertedId();
                    $id = $responseArray[0]['id_producto'];

                    $data = [
                        'id_producto' => $id,
                        'url' => $nombreArchivoUnico
                    ];

                    if (!$obj->create($data)) {
                        $success = false; // Indicar que al menos una imagen falló.
                        $errorCount++;
                        $errorMessage .= "Imagen $nombreArchivo: Error al guardar en la base de datos.\n";
                    }
                } else {
                    $success = false; // Indicar que al menos una imagen falló.
                    $errorCount++;
                    $errorMessage .= "Imagen $nombreArchivo: Error al mover el archivo al destino.\n";
                }
            } else {
                $success = false; // Indicar que al menos una imagen falló.
                $errorCount++;
                $errorMessage .= "Imagen $nombreArchivo: ";
                if (!in_array($tipoArchivo, $allowedTypes)) {
                    $errorMessage .= "Formato de archivo no permitido. ";
                }
                // if ($tamañoArchivo > 5242880) {
                //     $errorMessage .= "Tamaño de archivo excede el límite permitido. ";
                // }
                $errorMessage .= "\n";
            }
        }

        if ($success) {
            echo "true"; // Indicar que todas las imágenes se procesaron correctamente.
        } else {
            $errorMessage .= "Por favor, asegúrate de que todas las imágenes cumplan con los requisitos de formato y tamaño.";
            echo $errorMessage;
        }
    } else {
        echo "No se recibieron imágenes correctamente.";
    }
} catch (\Throwable $th) {
    //header("HTTP/1.1 500 Internal Server Error");
    echo "Error al crear el elemento: " . $th->getMessage();
}
