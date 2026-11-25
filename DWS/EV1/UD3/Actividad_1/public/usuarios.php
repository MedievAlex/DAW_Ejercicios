<?php
require_once("../model/Usuario.php");
require_once("../dao/ConexionDB.php");
require_once("../dao/UsuarioDAO.php");
require_once("../controller/UsuarioController.php");

header("Content-Type: application/json; charset=utf-8");

if($_SERVER["REQUEST_METHOD"] !== "GET"){
    http_response_code(405);

    echo json_encode([
        "error" => "Método HTTP no permitido."
    ]);

    exit;
}

$controller = new UsuarioController();

$usuarios = $controller->cargarUsuarios();

echo json_encode(
    $usuarios,
    JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT
);

?>