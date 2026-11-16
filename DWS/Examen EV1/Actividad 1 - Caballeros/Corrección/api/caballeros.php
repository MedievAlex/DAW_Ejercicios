<?php
    declare(strict_types=1);

    // =====================================================
    // 1. INCLUIR LAS CLASES DEL PROYECTO
    // =====================================================

    require_once __DIR__ . "/dao/ConexionDB.php";
    require_once __DIR__ . "/dao/CaballeroDAO.php";
    require_once __DIR__ . "/model/Caballero.php";
    require_once __DIR__ . "/controller/CaballeroController.php";
    require_once __DIR__ . "/view/JsonView.php";


    // =====================================================
    // 2. CONFIGURAR LA RESPUESTA JSON
    // =====================================================

    header("Content-Type: application/json; charset=utf-8");


    // =====================================================
    // 3. CREAR LA CONEXION, EL DAO Y EL CONTROLADOR
    // =====================================================

    try {

        $conexion = ConexionDB::conexion();

        $dao = new CaballeroDAO($conexion);

        $controlador = new CaballeroController($dao);


        // =================================================
        // 4. IDENTIFICAR EL METODO HTTP
        // =================================================

        $metodo = $_SERVER["REQUEST_METHOD"];

        switch ($metodo) {

            // ---------------------------------------------
            // GET: consultar caballeros
            // ---------------------------------------------

            case "GET":

                $respuesta = $controlador->obtener();

                break;


            // ---------------------------------------------
            // POST: insertar un caballero
            // ---------------------------------------------

            case "POST":

                $respuesta = $controlador->insertar();

                break;


            // ---------------------------------------------
            // PUT: actualizar un caballero
            // ---------------------------------------------

            case "PUT":

                $respuesta = $controlador->actualizar();

                break;


            // ---------------------------------------------
            // DELETE: eliminar un caballero
            // ---------------------------------------------

            case "DELETE":

                $respuesta = $controlador->eliminar();

                break;


            // ---------------------------------------------
            // METODO HTTP NO ADMITIDO
            // ---------------------------------------------

            default:

                header("Allow: GET, POST, PUT, DELETE");

                $respuesta = [
                    "codigo" => 405,
                    "datos" => [
                        "error" => "Metodo HTTP no permitido."
                    ]
                ];

                break;
        }


        // =================================================
        // 5. ENVIAR LA RESPUESTA DEL CONTROLADOR
        // =================================================

        JsonView::responder(
            $respuesta["datos"],
            $respuesta["codigo"]
        );


    } catch (Throwable $e) {

        // Registrar el error en el log del servidor.
        error_log($e->getMessage());

        // No mostrar detalles internos al cliente.
        JsonView::responder(
            [
                "error" => "Se ha producido un error interno en el servidor."
            ],
            500
        );

    }
