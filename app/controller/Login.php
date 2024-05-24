<?php

require_once __DIR__ . '/../model/Login.php';
require_once __DIR__ . '/../utils/SessionHelper.php';

use app\model\Login;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("HTTP/1.1 405 Method Not Allowed");
    exit("Solicitud no permitida.");
}

try {
    $data = json_decode(file_get_contents('php://input'), true);

    $username = filter_var($data["username"], FILTER_SANITIZE_STRING);
    $password = filter_var($data["password"], FILTER_SANITIZE_STRING);

    if (empty($username) || empty($password)) {
        echo json_encode(['error' => 'Datos incompletos']);
        exit;
    }

    $loginModel = new Login();

    $user = $loginModel->login($username, $password);

    if ($user) {

        SessionHelper::startSession();
    
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        $_SESSION['user_id'] = $user['id_administrador'];
        $_SESSION['username'] = $user['usuario'];
       
        echo true;        
    } else {
        echo false;
    }
    
} catch (\Throwable $th) {
    // Captura de excepción
    $error = ['error' => $th->getMessage()];
    return json_encode($error); // Devuelve el error como un objeto JSON
}
