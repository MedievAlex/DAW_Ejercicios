<?php

    // =========================================================
    // 1. CARGAR EL ARCHIVO DE CONFIGURACION
    // =========================================================

    // Incluimos config.php, donde están las funciones comunes
    // de la API y la clase ConexionDB.
    //
    // Utilizaremos las funciones:
    //
    // requireAuthenticatedUser() -> comprueba el token JWT.
    // requireAdmin()              -> comprueba el rol del usuario.
    // sendJson()                  -> devuelve respuestas JSON.
    //
    // URL para probar este archivo:
    // http://localhost:8000/UD03/APISession/getDbInfo.php

    require_once __DIR__ . "/config.php";


    // =========================================================
    // 2. COMPROBAR EL METODO HTTP
    // =========================================================

    // Este endpoint permite consultar información del servidor
    // de base de datos.
    //
    // Para realizar esta consulta utilizamos el método GET.

    if ($_SERVER["REQUEST_METHOD"] != "GET") {

        // Indicamos que el recurso admite el método GET.

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
    // Esta función obtiene el token JWT de la cabecera
    // Authorization y comprueba que sea válido.
    //
    // También verifica que el usuario asociado al token
    // siga existiendo en la base de datos.
    //
    // Si todo es correcto, devuelve sus datos básicos,
    // incluido su identificador y su rol.
    //
    // Si el token no es válido, devuelve un error HTTP 401.

    $usuario = requireAuthenticatedUser();


    // =========================================================
    // 4. COMPROBAR QUE EL USUARIO ES ADMINISTRADOR
    // =========================================================

    // Aunque el usuario esté autenticado, no significa
    // que tenga permiso para consultar este recurso.
    //
    // requireAdmin() comprueba que su rol sea "admin".
    //
    // Si el usuario tiene otro rol, devuelve un error HTTP 403.
    //
    // De esta manera, protegemos la información de la conexión
    // y permitimos acceder solamente a los administradores.

    requireAdmin($usuario);


    // =========================================================
    // 5. CONECTAR CON LA BASE DE DATOS
    // =========================================================

    // Utilizamos el método conexion() de nuestra clase
    // ConexionDB para establecer una conexión con MySQL.

    $conexion = ConexionDB::conexion();


    // =========================================================
    // 6. PREPARAR Y EJECUTAR LA CONSULTA SQL
    // =========================================================

    // SELECT VERSION() permite obtener la versión del servidor
    // MySQL al que estamos conectados.
    //
    // AS version asigna el nombre "version" a la columna
    // que devuelve la consulta.
    //
    // Esta consulta no necesita parámetros, por lo que podemos
    // ejecutarla directamente mediante query().

    $sql = "SELECT VERSION() AS version";

    $resultado = $conexion->query($sql);


    // =========================================================
    // 7. OBTENER LA VERSION DEL SERVIDOR
    // =========================================================

    // fetch_assoc() recupera la fila del resultado como
    // un array asociativo.
    //
    // Podemos acceder al dato mediante:
    // $fila["version"]

    $fila = $resultado->fetch_assoc();


    // =========================================================
    // 8. OBTENER INFORMACION DE LA CONEXION
    // =========================================================

    // get_client_info() devuelve información sobre la versión
    // de la biblioteca cliente de MySQL utilizada por mysqli.

    $versionCliente = $conexion->get_client_info();

    // host_info proporciona información sobre la conexión
    // entre el cliente y el servidor MySQL.

    $informacionServidor = $conexion->host_info;


    // =========================================================
    // 9. CERRAR LA CONEXION
    // =========================================================

    // Una vez obtenidos los datos, cerramos la conexión
    // para liberar los recursos utilizados.

    $conexion->close();


    // =========================================================
    // 10. DEVOLVER LA RESPUESTA JSON
    // =========================================================

    // Devolvemos el código HTTP 200, que indica que la consulta
    // se ha realizado correctamente.
    //
    // La respuesta incluye:
    //
    // server_version -> versión del servidor MySQL.
    // client_version -> versión de la biblioteca cliente.
    // host_info      -> información de la conexión.
    // stat           -> mensaje descriptivo del resultado.
    //
    // sendJson() convierte estos datos a JSON y termina
    // la ejecución del programa.

    sendJson(200, [
        "success" => true,
        "info" => [
            "server_version" => $fila["version"],
            "client_version" => $versionCliente,
            "host_info" => $informacionServidor,
            "stat" => "Informacion de conexion obtenida correctamente."
        ]
    ]);

?>