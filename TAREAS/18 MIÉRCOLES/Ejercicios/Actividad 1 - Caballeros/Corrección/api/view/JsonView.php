<?php
    declare(strict_types=1);

    class JsonView {

        public static function responder(
            mixed $datos,
            int $codigo = 200
        ): void {

            http_response_code($codigo);

            header("Content-Type: application/json; charset=utf-8");

            echo json_encode(
                $datos,
                JSON_UNESCAPED_UNICODE
                | JSON_UNESCAPED_SLASHES
                | JSON_THROW_ON_ERROR
            );
        }
    }

