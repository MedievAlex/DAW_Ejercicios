<?php

    // =========================================================
    // 1. CARGAR EL ARCHIVO DE CONFIGURACION
    // =========================================================

    // Incluimos config.php.
    // Este archivo contiene las funciones comunes de la API,
    // como sendJson() y requireAuthenticatedUser().
    //
    // También incluye ConexionDB.php, que permite conectarnos
    // a la base de datos mediante mysqli.
    //
    // URL para probar este archivo:
    // http://localhost:8000/UD03/APISession/getUserData.php

    require_once __DIR__ . "/config.php";


    // =========================================================
    // 2. COMPROBAR EL METODO HTTP
    // =========================================================

    // Este recurso permite consultar los datos del usuario.
    // Para realizar consultas utilizamos el método GET.
    //
    // REQUEST_METHOD contiene el método HTTP utilizado
    // por el cliente.

    if ($_SERVER["REQUEST_METHOD"] != "GET") {

        // Indicamos que este recurso admite el método GET.

        header("Allow: GET");

        // Devolvemos el código HTTP 405:
        // método no permitido.
        //
        // sendJson() devuelve una respuesta JSON y termina
        // la ejecución del programa.

        sendJson(405, [
            "success" => false,
            "message" => "Utiliza el metodo GET."
        ]);
    }


    // =========================================================
    // 3. COMPROBAR QUE EL USUARIO ESTA AUTENTICADO
    // =========================================================

    // Llamamos a requireAuthenticatedUser(), definida
    // en config.php.
    //
    // Esta función realiza varias operaciones:
    //
    // 1. Lee el token JWT de la cabecera Authorization.
    // 2. Comprueba que el token tenga el formato correcto.
    // 3. Valida su firma y su fecha de caducidad.
    // 4. Comprueba que el usuario siga existiendo en MySQL.
    //
    // Si el token no es válido, devuelve un error HTTP 401.
    //
    // Si todo es correcto, devuelve los datos básicos
    // del usuario autenticado.

    $usuarioAutenticado = requireAuthenticatedUser();


    // =========================================================
    // 4. CONECTAR CON LA BASE DE DATOS
    // =========================================================

    // Utilizamos el método conexion() de nuestra clase
    // ConexionDB para establecer la conexión con MySQL.

    $conexion = ConexionDB::conexion();


    // =========================================================
    // 5. PREPARAR LA CONSULTA SQL
    // =========================================================

    // Consultamos los datos del usuario que ha iniciado sesión.
    //
    // Seleccionamos las columnas que queremos devolver:
    //
    // id                 -> identificador del usuario.
    // username           -> nombre de usuario.
    // email              -> correo electrónico.
    // first_name         -> nombre.
    // last_name          -> apellidos.
    // role               -> rol del usuario.
    // last_login         -> fecha del último acceso.
    // registration_date  -> fecha de registro.
    //
    // La condición WHERE id = ? permite buscar un usuario
    // concreto mediante su identificador.
    //
    // El símbolo ? es un marcador de posición que
    // completaremos utilizando bind_param().

    $sql = "SELECT id, username, email, first_name, last_name,
                   role, last_login, registration_date
            FROM users
            WHERE id = ?";


    // =========================================================
    // 6. PREPARAR LA CONSULTA Y ASOCIAR EL IDENTIFICADOR
    // =========================================================

    // prepare() prepara la consulta SQL para ejecutarla
    // con un parámetro.

    $stmt = $conexion->prepare($sql);

    // Obtenemos el identificador del usuario autenticado.
    //
    // Este dato procede de requireAuthenticatedUser(),
    // que ha validado previamente el token JWT.

    $id = $usuarioAutenticado["id"];

    // Asociamos el identificador al marcador ?.
    //
    // La letra i indica que el parámetro es un número entero
    // (integer).

    $stmt->bind_param("i", $id);


    // =========================================================
    // 7. EJECUTAR LA CONSULTA
    // =========================================================

    // Ejecutamos la consulta SELECT en la base de datos.

    $stmt->execute();


    // =========================================================
    // 8. OBTENER LOS DATOS DEL USUARIO
    // =========================================================

    // get_result() obtiene el resultado de la consulta SQL.

    $resultado = $stmt->get_result();

    // fetch_assoc() recupera una fila como un array asociativo.
    //
    // Por ejemplo, podemos acceder al correo electrónico
    // mediante $usuario["email"].
    //
    // Si no se encuentra ninguna fila, devuelve false.

    $usuario = $resultado->fetch_assoc();


    // =========================================================
    // 9. CERRAR LA CONSULTA Y LA CONEXION
    // =========================================================

    // Cerramos la consulta preparada porque ya no la necesitamos.

    $stmt->close();

    // Cerramos la conexión con MySQL para liberar recursos.

    $conexion->close();


    // =========================================================
    // 10. COMPROBAR SI SE HA ENCONTRADO EL USUARIO
    // =========================================================

    // Aunque el token se haya validado, comprobamos que
    // la consulta haya devuelto un usuario.
    //
    // Si no existe ninguna fila, devolvemos el error 404:
    // recurso no encontrado.

    if (!$usuario) {

        sendJson(404, [
            "success" => false,
            "message" => "Usuario no encontrado."
        ]);
    }


    // =========================================================
    // 11. DEVOLVER LOS DATOS EN FORMATO JSON
    // =========================================================

    // Si el usuario existe, devolvemos una respuesta HTTP 200.
    //
    // La respuesta contiene:
    //
    // success -> indica que la operación ha sido correcta.
    // user    -> contiene los datos del usuario.
    //
    // Convertimos el identificador a entero para devolverlo
    // con el tipo de dato adecuado.
    //
    // No devolvemos la contraseña ni su hash.

    sendJson(200, [
        "success" => true,
        "user" => [
            "id" => (int) $usuario["id"],
            "username" => $usuario["username"],
            "email" => $usuario["email"],
            "first_name" => $usuario["first_name"],
            "last_name" => $usuario["last_name"],
            "role" => $usuario["role"],
            "last_login" => $usuario["last_login"],
            "registration_date" => $usuario["registration_date"]
        ]
    ]);

?>