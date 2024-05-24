<?php
require_once __DIR__ . '/../utils/SessionHelper.php';

class Validator
{
    public static function validateSession()
    {
        SessionHelper::startSession();
        if (!isset($_SESSION['user_id'])) {
            // La sesión no está iniciada, elimina todas las variables de sesión
            $_SESSION = array();
            session_destroy();
    
            // Redirige al inicio de sesión
            header('Location: login.php'); // Reemplaza con la URL correcta
            exit;
        }else{

            define('Usuario', $_SESSION["username"]);

        }
    }

}
