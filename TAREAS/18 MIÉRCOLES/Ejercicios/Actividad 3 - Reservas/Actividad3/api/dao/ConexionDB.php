<?php

    class ConexionDB
    {
        public static function conexion(): mysqli
        {
            $conexion = new mysqli(
                "localhost",
                "root",
                "",
                ""
            );

            // Indicamos que utilizaremos UTF-8.
            $conexion->query("SET NAMES 'utf8'");

            // Devolvemos la conexión.
            return $conexion;
        }
    }

?>