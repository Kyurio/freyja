<?php
require_once __DIR__ . '/../model/Items_producto.php';

use app\model\Items_producto;

// Verificar que la solicitud sea DELETE
if ($_SERVER['REQUEST_METHOD'] !== 'DELETE') {
    header("HTTP/1.1 405 Method Not Allowed");
    exit("Solicitud no permitida.");
}

try {
    // Obtener el ID del registro a eliminar (deberías validar y limpiar esto)
    $id = $_GET['id'];

    //Validar que el ID no esté vacío y sea un valor numérico
    if (!isset($id) || !is_numeric($id)) {
        header("HTTP/1.1 400 Bad Request");
        exit("ID no válido.");
    }

    // Instanciar la clase Categoria y eliminar el registro
    $categoria = new Items_producto();
    $resultado = $categoria->deletePorProducto($id);

    if ($resultado) {
        echo true;
    } else {
        echo false;
    }

} catch (\Throwable $th) {
   // header("HTTP/1.1 500 Internal Server Error");
    echo $th->getMessage();
}
?>
