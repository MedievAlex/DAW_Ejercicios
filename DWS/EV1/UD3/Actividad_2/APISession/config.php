<?php

    // =========================================================
    // 1. CARGAR LA CLASE DE CONEXION
    // =========================================================

    // Incluimos ConexionDB.php, que contiene la clase encargada
    // de conectarse a la base de datos MySQL mediante mysqli.
    //
    // require_once evita incluir el archivo varias veces.

    require_once __DIR__ . "/ConexionDB.php";


    // =========================================================
    // 2. CONFIGURAR EL TOKEN JWT
    // =========================================================

    // Clave secreta utilizada para crear y validar la firma
    // de los tokens JWT.
    //
    // Debe mantenerse privada y ser la misma al crear y validar
    // los tokens.
    //
    // En un entorno real, es preferible guardar esta clave
    // en una variable de entorno y no directamente en el código.

    const API_JWT_SECRET = 'K9v!R4x#T8mQ2z@L7pW5$nB3yH6&cF1s';

    // Tiempo de validez del token en segundos.
    //
    // 3600 segundos equivalen a una hora.
    //
    // Cuando el token caduque, el usuario tendrá que iniciar
    // sesión de nuevo para obtener otro.

    const API_TOKEN_TTL = 3600;


    // =========================================================
    // 3. ENVIAR UNA RESPUESTA JSON
    // =========================================================

    // Esta función se utiliza en todos los endpoints para
    // devolver respuestas en formato JSON.
    //
    // Recibe dos parámetros:
    //
    // $statusCode -> código HTTP de la respuesta.
    // $payload    -> array con los datos que queremos devolver.

    function sendJson(int $statusCode, array $payload): void
    {
        // Establecemos el código HTTP.
        // Por ejemplo, 200 significa que todo ha ido bien.

        http_response_code($statusCode);

        // Indicamos que la respuesta está en formato JSON
        // y utiliza la codificación UTF-8.

        header("Content-Type: application/json; charset=utf-8");

        // Indicamos que la respuesta no debe almacenarse
        // en caché, algo importante para datos de autenticación.

        header("Cache-Control: no-store");

        // Convertimos el array PHP en un texto JSON
        // y lo enviamos al cliente.
        //
        // JSON_UNESCAPED_UNICODE permite mostrar correctamente
        // caracteres como las tildes y la letra ñ.

        echo json_encode($payload, JSON_UNESCAPED_UNICODE);

        // Terminamos la ejecución del programa para evitar
        // que se siga ejecutando código después de la respuesta.

        exit;
    }


    // =========================================================
    // 4. CODIFICAR DATOS EN BASE64 URL
    // =========================================================

    // Esta función codifica una cadena de texto utilizando
    // Base64 y adapta el resultado para poder utilizarlo
    // dentro de un token JWT.
    //
    // Base64 no cifra los datos: únicamente los codifica.

    function base64UrlEncode(string $data): string
    {
        // base64_encode() convierte los datos a Base64.
        //
        // strtr() sustituye:
        // + por -
        // / por _
        //
        // rtrim() elimina los signos = del final.
        //
        // Estas modificaciones permiten utilizar el resultado
        // en una URL y en un token JWT.

        return rtrim(
            strtr(base64_encode($data), "+/", "-_"),
            "="
        );
    }


    // =========================================================
    // 5. DECODIFICAR DATOS BASE64 URL
    // =========================================================

    // Esta función realiza la operación inversa:
    // transforma una cadena Base64 URL en sus datos originales.
    //
    // Puede devolver una cadena o false si la codificación
    // no es válida.

    function base64UrlDecode(string $data)
    {
        // Calculamos cuántos caracteres faltan para que
        // la longitud sea múltiplo de cuatro.

        $padding = strlen($data) % 4;

        // Si faltan caracteres de relleno, añadimos los signos =.

        if ($padding > 0) {
            $data .= str_repeat("=", 4 - $padding);
        }

        // Restauramos los caracteres originales de Base64
        // y decodificamos la cadena.
        //
        // El segundo parámetro true hace que base64_decode()
        // devuelva false si encuentra caracteres no válidos.

        return base64_decode(
            strtr($data, "-_", "+/"),
            true
        );
    }


    // =========================================================
    // 6. CREAR UN TOKEN JWT
    // =========================================================

    // Esta función crea un token JWT a partir de los datos
    // que queremos incluir en él.
    //
    // $claims es un array con información del usuario,
    // como su identificador, nombre de usuario y rol.
    //
    // Un JWT tiene tres partes:
    //
    // CABECERA.PAYLOAD.FIRMA
    //
    // Las tres partes se separan mediante puntos.

    function createJwt(array $claims): string
    {
        // Obtenemos la fecha y hora actuales en formato
        // timestamp Unix, es decir, el número de segundos
        // transcurridos desde el 1 de enero de 1970.

        $tiempo = time();


        // -----------------------------------------------------
        // 6.1. CREAR LA CABECERA
        // -----------------------------------------------------

        // La cabecera indica el tipo de token y el algoritmo
        // utilizado para calcular su firma.

        $cabecera = [
            "typ" => "JWT",
            "alg" => "HS256"
        ];


        // -----------------------------------------------------
        // 6.2. CREAR LOS DATOS DEL TOKEN
        // -----------------------------------------------------

        // Copiamos los datos recibidos en $claims.

        $datos = $claims;

        // iat indica cuándo se ha creado el token.

        $datos["iat"] = $tiempo;

        // exp indica cuándo caducará el token.
        // Sumamos una hora al momento de su creación.

        $datos["exp"] = $tiempo + API_TOKEN_TTL;


        // -----------------------------------------------------
        // 6.3. CODIFICAR LA CABECERA Y LOS DATOS
        // -----------------------------------------------------

        // Convertimos la cabecera a JSON y después a Base64 URL.

        $header = base64UrlEncode(json_encode($cabecera));

        // Convertimos los datos del usuario a JSON
        // y después a Base64 URL.

        $payload = base64UrlEncode(json_encode($datos));


        // -----------------------------------------------------
        // 6.4. UNIR LAS DOS PRIMERAS PARTES
        // -----------------------------------------------------

        // Unimos la cabecera y los datos mediante un punto.
        //
        // Este texto se utilizará para calcular la firma.

        $token = $header . "." . $payload;


        // -----------------------------------------------------
        // 6.5. CALCULAR LA FIRMA
        // -----------------------------------------------------

        // hash_hmac() calcula una firma utilizando:
        //
        // sha256       -> algoritmo de hash.
        // $token       -> cabecera y datos del token.
        // API_JWT_SECRET -> clave secreta.
        // true         -> devuelve la firma en formato binario.
        //
        // La firma permite detectar si alguien modifica
        // la cabecera o los datos del token.

        $firma = hash_hmac(
            "sha256",
            $token,
            API_JWT_SECRET,
            true
        );


        // -----------------------------------------------------
        // 6.6. DEVOLVER EL TOKEN COMPLETO
        // -----------------------------------------------------

        // Codificamos la firma y añadimos la tercera parte
        // al token, separándola mediante otro punto.

        return $token . "." . base64UrlEncode($firma);
    }


    // =========================================================
    // 7. VALIDAR UN TOKEN JWT
    // =========================================================

    // Esta función comprueba si un token es válido.
    //
    // Si todo es correcto, devuelve los datos incluidos
    // en el token.
    //
    // Si detecta algún problema, devuelve null.

    function validateJwt(string $token): ?array
    {
        // Separamos el token utilizando el punto como separador.
        //
        // Un JWT debe tener tres partes:
        // cabecera, datos y firma.

        $partes = explode(".", $token);

        // Si no tiene exactamente tres partes, no es válido.

        if (count($partes) != 3) {
            return null;
        }


        // -----------------------------------------------------
        // 7.1. DECODIFICAR LAS TRES PARTES
        // -----------------------------------------------------

        // Decodificamos la cabecera, los datos y la firma.

        $header = base64UrlDecode($partes[0]);
        $payload = base64UrlDecode($partes[1]);
        $firma = base64UrlDecode($partes[2]);

        // Si alguna parte no se puede decodificar,
        // consideramos que el token no es válido.

        if ($header === false || $payload === false || $firma === false) {
            return null;
        }


        // -----------------------------------------------------
        // 7.2. CONVERTIR EL JSON EN ARRAYS PHP
        // -----------------------------------------------------

        // Convertimos la cabecera y los datos del token
        // en arrays asociativos.

        $cabecera = json_decode($header, true);
        $datos = json_decode($payload, true);

        // Comprobamos que ambos resultados sean arrays.

        if (!is_array($cabecera) || !is_array($datos)) {
            return null;
        }


        // -----------------------------------------------------
        // 7.3. COMPROBAR EL ALGORITMO
        // -----------------------------------------------------

        // Comprobamos que el token indique el algoritmo HS256.
        //
        // No aceptamos tokens que declaren otro algoritmo.

        if (!isset($cabecera["alg"]) || $cabecera["alg"] != "HS256") {
            return null;
        }


        // -----------------------------------------------------
        // 7.4. CALCULAR LA FIRMA CORRECTA
        // -----------------------------------------------------

        // Reconstruimos el texto original formado por
        // la cabecera y los datos codificados.

        $token = $partes[0] . "." . $partes[1];

        // Calculamos de nuevo la firma utilizando nuestra
        // clave secreta y el algoritmo HS256.

        $firmaCorrecta = hash_hmac(
            "sha256",
            $token,
            API_JWT_SECRET,
            true
        );


        // -----------------------------------------------------
        // 7.5. COMPARAR LAS FIRMAS
        // -----------------------------------------------------

        // hash_equals() compara las dos firmas de forma segura.
        //
        // Si las firmas no coinciden, el token puede haber sido
        // modificado o haber sido creado con otra clave secreta.

        if (!hash_equals($firmaCorrecta, $firma)) {
            return null;
        }


        // -----------------------------------------------------
        // 7.6. COMPROBAR LA FECHA DE CADUCIDAD
        // -----------------------------------------------------

        // exp contiene la fecha de caducidad del token.
        //
        // Si no existe o la fecha ya ha pasado, rechazamos
        // el token.

        if (!isset($datos["exp"]) || $datos["exp"] <= time()) {
            return null;
        }


        // -----------------------------------------------------
        // 7.7. COMPROBAR EL IDENTIFICADOR DEL USUARIO
        // -----------------------------------------------------

        // sub contiene el identificador del usuario.
        //
        // Comprobamos que exista y que su valor sea numérico.

        if (!isset($datos["sub"]) || !is_numeric($datos["sub"])) {
            return null;
        }


        // -----------------------------------------------------
        // 7.8. DEVOLVER LOS DATOS DEL TOKEN
        // -----------------------------------------------------

        // Si todas las comprobaciones son correctas,
        // devolvemos los datos del token.

        return $datos;
    }


    // =========================================================
    // 8. COMPROBAR QUE EL USUARIO ESTA AUTENTICADO
    // =========================================================

    // Esta función se utiliza en los endpoints protegidos.
    //
    // Comprueba el token JWT y verifica que el usuario
    // asociado a él siga existiendo en la base de datos.
    //
    // Si todo es correcto, devuelve los datos básicos
    // del usuario autenticado.

    function requireAuthenticatedUser(): array
    {
        // Intentamos obtener la cabecera HTTP Authorization.
        //
        // En ella esperamos recibir:
        //
        // Authorization: Bearer TU_TOKEN_JWT

        $cabecera = $_SERVER["HTTP_AUTHORIZATION"] ?? "";


        // -----------------------------------------------------
        // 8.1. OBTENER LA CABECERA SI NO ESTÁ DISPONIBLE
        // -----------------------------------------------------

        // En algunos servidores PHP, Authorization no aparece
        // en HTTP_AUTHORIZATION.
        //
        // Por eso, si está vacía, intentamos obtener las
        // cabeceras mediante getallheaders().

        if ($cabecera == "" && function_exists("getallheaders")) {

            $headers = getallheaders();

            // Buscamos Authorization teniendo en cuenta
            // las dos variantes habituales de escritura.

            $cabecera = $headers["Authorization"]
                ?? $headers["authorization"]
                ?? "";
        }


        // -----------------------------------------------------
        // 8.2. COMPROBAR EL FORMATO BEARER
        // -----------------------------------------------------

        // Comprobamos que la cabecera tenga el formato:
        //
        // Bearer TOKEN
        //
        // La expresión regular no distingue entre mayúsculas
        // y minúsculas gracias al modificador i.
        //
        // Si el formato es incorrecto, devolvemos un error 401.

        if (!preg_match("/^Bearer\s+(.+)$/i", trim($cabecera), $coincidencias)) {

            sendJson(401, [
                "success" => false,
                "message" => "Token no enviado o formato incorrecto."
            ]);
        }


        // -----------------------------------------------------
        // 8.3. VALIDAR EL TOKEN
        // -----------------------------------------------------

        // La expresión regular ha guardado el token en
        // $coincidencias[1].
        //
        // Llamamos a validateJwt() para comprobar su firma,
        // su caducidad y los datos que contiene.

        $datos = validateJwt(trim($coincidencias[1]));

        // Si validateJwt() devuelve null, el token no es válido.

        if ($datos === null) {

            sendJson(401, [
                "success" => false,
                "message" => "Token invalido o expirado."
            ]);
        }


        // -----------------------------------------------------
        // 8.4. CONECTAR CON LA BASE DE DATOS
        // -----------------------------------------------------

        // Aunque el token sea válido, comprobamos que el usuario
        // siga existiendo en la tabla users.
        //
        // De esta manera, no aceptamos tokens de usuarios
        // que hayan sido eliminados de la base de datos.

        $conexion = ConexionDB::conexion();


        // -----------------------------------------------------
        // 8.5. BUSCAR AL USUARIO POR SU IDENTIFICADOR
        // -----------------------------------------------------

        // Preparamos una consulta que obtiene el identificador,
        // el nombre de usuario y el rol.

        $sql = "SELECT id, username, role
                FROM users
                WHERE id = ?";

        $stmt = $conexion->prepare($sql);

        // El identificador sub procede del token validado.
        // Lo convertimos a entero antes de utilizarlo.

        $id = (int) $datos["sub"];

        // Asociamos el identificador al marcador ?.
        // La letra i indica que se trata de un entero.

        $stmt->bind_param("i", $id);

        // Ejecutamos la consulta.

        $stmt->execute();


        // -----------------------------------------------------
        // 8.6. RECUPERAR LOS DATOS DEL USUARIO
        // -----------------------------------------------------

        // Obtenemos el resultado de la consulta SELECT.

        $resultado = $stmt->get_result();

        // Recuperamos la primera fila como array asociativo.

        $usuario = $resultado->fetch_assoc();


        // -----------------------------------------------------
        // 8.7. CERRAR LOS RECURSOS
        // -----------------------------------------------------

        // Cerramos la consulta preparada.

        $stmt->close();

        // Cerramos la conexión con MySQL.

        $conexion->close();


        // -----------------------------------------------------
        // 8.8. COMPROBAR QUE EL USUARIO EXISTA
        // -----------------------------------------------------

        // Si la consulta no ha encontrado al usuario,
        // devolvemos un error HTTP 401.

        if (!$usuario) {

            sendJson(401, [
                "success" => false,
                "message" => "El usuario ya no existe."
            ]);
        }


        // -----------------------------------------------------
        // 8.9. DEVOLVER LOS DATOS DEL USUARIO AUTENTICADO
        // -----------------------------------------------------

        // Si todas las comprobaciones son correctas,
        // devolvemos los datos básicos del usuario.
        //
        // Los endpoints podrán utilizar estos datos para
        // saber quién está realizando la petición.

        return [
            "id" => (int) $usuario["id"],
            "username" => $usuario["username"],
            "role" => $usuario["role"]
        ];
    }


    // =========================================================
    // 9. COMPROBAR SI EL USUARIO ES ADMINISTRADOR
    // =========================================================

    // Esta función comprueba si el usuario autenticado
    // tiene el rol admin.
    //
    // Recibe el array devuelto por requireAuthenticatedUser().
    //
    // Si el rol no es admin, devuelve un error HTTP 403.
    //
    // Si es administrador, la función termina sin devolver
    // ningún error y el endpoint puede continuar.

    function requireAdmin(array $usuario): void
    {
        // Comprobamos el rol del usuario.

        if ($usuario["role"] != "admin") {

            // El usuario está autenticado, pero no tiene
            // permiso para acceder al recurso solicitado.

            sendJson(403, [
                "success" => false,
                "message" => "Se requiere rol de administrador."
            ]);
        }
    }

?>
