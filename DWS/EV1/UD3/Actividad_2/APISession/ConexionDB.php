<?php

    // =========================================================
    // 1. DEFINIR LA CLASE ConexionDB
    // =========================================================

    // Creamos la clase ConexionDB.
    //
    // Su función es centralizar la conexión con la base de datos.
    //
    // De esta manera, no tenemos que escribir los datos de
    // conexión en cada archivo PHP de nuestra aplicación.

    class ConexionDB
    {


        // =====================================================
        // 2. DEFINIR EL METODO conexion()
        // =====================================================

        // Creamos un método llamado conexion().
        //
        // Es static, por lo que podemos utilizarlo directamente
        // desde la clase, sin crear un objeto.
        //
        // Por ejemplo:
        //
        // $conexion = ConexionDB::conexion();
        //
        // El método devuelve un objeto de tipo mysqli,
        // que representa la conexión con MySQL.

        public static function conexion(): mysqli
        {


            // =================================================
            // 3. ESTABLECER LA CONEXION CON MYSQL
            // =================================================

            // Creamos un objeto mysqli para conectarnos
            // al servidor MySQL.
            //
            // El constructor recibe cuatro parámetros:
            //
            // 1. localhost -> servidor donde está MySQL.
            // 2. root      -> usuario de la base de datos.
            // 3. ""        -> contraseña del usuario.
            // 4. api_login -> nombre de la base de datos.
            //
            // Estos valores deben coincidir con la configuración
            // de MySQL de nuestro entorno de desarrollo.

            $conexion = new mysqli(
                "localhost",
                "root",
                "",
                "api_login"
            );


            // =================================================
            // 4. CONFIGURAR LA CODIFICACION DE LOS CARACTERES
            // =================================================

            // Indicamos que la conexión utilizará utf8mb4.
            //
            // Esta codificación permite almacenar y recuperar
            // correctamente caracteres como:
            //
            // - Vocales con tilde.
            // - La letra ñ.
            // - Otros caracteres Unicode, incluidos emojis.
            //
            // Es importante que la base de datos y sus tablas
            // también utilicen una codificación compatible.

            $conexion->set_charset("utf8mb4");


            // =================================================
            // 5. DEVOLVER LA CONEXION
            // =================================================

            // Devolvemos el objeto mysqli.
            //
            // Los demás archivos podrán utilizarlo para ejecutar
            // consultas SQL, insertar datos o buscar usuarios.
            //
            // Por ejemplo:
            //
            // $conexion = ConexionDB::conexion();
            // $resultado = $conexion->query("SELECT * FROM users");

            return $conexion;
        }
    }

?>