<?php

    // =========================================================
    // 1. CARGAR EL ARCHIVO DE CONFIGURACION
    // =========================================================

    // Incluimos config.php, donde tenemos las funciones comunes
    // de la API, como sendJson() y createJwt().
    //
    // __DIR__ representa el directorio donde está este archivo.
    // require_once evita incluir el mismo archivo varias veces.

    // URL para probar este archivo en local:
    // http://localhost:8000/UD03/APISession/login.php

    require_once __DIR__ . "/config.php";


    // =========================================================
    // 2. COMPROBAR EL METODO HTTP
    // =========================================================

    // Para iniciar sesión utilizaremos el método POST.
    // POST permite enviar los datos de acceso en el cuerpo
    // de la petición HTTP.

    if ($_SERVER["REQUEST_METHOD"] != "POST") {

        // Indicamos que este recurso admite el método POST.
        header("Allow: POST");

        // Devolvemos un error 405: método no permitido.
        // sendJson() genera una respuesta JSON y termina el script.
        sendJson(405, [
            "success" => false,
            "message" => "Utiliza el metodo POST."
        ]);
    }


    // =========================================================
    // 3. COMPROBAR EL FORMATO DE LOS DATOS RECIBIDOS
    // =========================================================

    // CONTENT_TYPE indica el tipo de contenido enviado
    // en el cuerpo de la petición HTTP.

    $contenido = $_SERVER["CONTENT_TYPE"] ?? "";

    // Comprobamos que el cliente envía los datos como JSON.
    // stripos() busca un texto sin distinguir mayúsculas
    // y minúsculas.
    //
    // Si no encontramos application/json, devolvemos
    // el error 415: tipo de contenido no admitido.

    if (stripos($contenido, "application/json") === false) {

        sendJson(415, [
            "success" => false,
            "message" => "Debes enviar los datos en formato JSON."
        ]);
    }


    // =========================================================
    // 4. LEER EL CUERPO DE LA PETICION
    // =========================================================

    // php://input permite leer los datos que el cliente
    // ha enviado en el cuerpo de la petición HTTP.
    //
    // Por ejemplo, el cliente puede enviar:
    //
    // {
    //     "username": "admin",
    //     "password": "1234"
    // }

    $cuerpo = file_get_contents("php://input");


    // =========================================================
    // 5. CONVERTIR EL JSON EN UN ARRAY DE PHP
    // =========================================================

    // json_decode() transforma el texto JSON en un valor de PHP.
    // El segundo parámetro, true, indica que los objetos JSON
    // se convertirán en arrays asociativos.

    $datos = json_decode($cuerpo, true);

    // Comprobamos que el resultado sea un array.
    // Si el JSON está mal formado o no contiene un objeto
    // o array adecuado, devolvemos un error 400.

    if (!is_array($datos)) {

        sendJson(400, [
            "success" => false,
            "message" => "El JSON no es valido."
        ]);
    }


    // =========================================================
    // 6. OBTENER EL NOMBRE DE USUARIO Y LA CONTRASEÑA
    // =========================================================

    // Obtenemos el nombre de usuario.
    // El operador ?? proporciona una cadena vacía si la clave
    // username no existe en el array.
    //
    // trim() elimina los espacios al principio y al final.

    $username = trim($datos["username"] ?? "");

    // Obtenemos la contraseña.
    // No utilizamos trim() para no modificar la contraseña
    // que ha escrito el usuario.

    $password = $datos["password"] ?? "";


    // =========================================================
    // 7. VALIDAR LOS DATOS RECIBIDOS
    // =========================================================

    // Comprobamos que el nombre de usuario no esté vacío,
    // que la contraseña sea una cadena de texto y que tampoco
    // esté vacía.

    if ($username == "" || !is_string($password) || $password == "") {

        // Error 400: la petición contiene datos incorrectos
        // o faltan campos obligatorios.

        sendJson(400, [
            "success" => false,
            "message" => "Debes indicar username y password."
        ]);
    }


    // =========================================================
    // 8. CONECTAR CON LA BASE DE DATOS
    // =========================================================

    // Utilizamos nuestra clase ConexionDB.
    // Su método conexion() crea y devuelve una conexión mysqli
    // con la base de datos api_login.

    $conexion = ConexionDB::conexion();


    // =========================================================
    // 9. PREPARAR LA CONSULTA SQL
    // =========================================================

    // Buscamos al usuario por su nombre.
    //
    // El símbolo ? es un marcador de posición.
    // El valor real se añadirá después con bind_param().
    //
    // No consultamos por la contraseña porque está guardada
    // como un hash y debemos comprobarla con password_verify().

    $sql = "SELECT id, username, first_name, last_name, role, password_hash
            FROM users
            WHERE username = ?";


    // =========================================================
    // 10. PREPARAR Y EJECUTAR LA CONSULTA
    // =========================================================

    // prepare() prepara la consulta SQL para ejecutarla
    // con los datos que recibiremos.

    $stmt = $conexion->prepare($sql);

    // bind_param() asocia el nombre de usuario al marcador ?.
    //
    // La letra s significa que el parámetro es una cadena
    // de texto (string).

    $stmt->bind_param("s", $username);

    // Ejecutamos la consulta SQL.

    $stmt->execute();


    // =========================================================
    // 11. OBTENER EL USUARIO ENCONTRADO
    // =========================================================

    // get_result() obtiene el resultado de la consulta SELECT.

    $resultado = $stmt->get_result();

    // fetch_assoc() devuelve la primera fila como un array
    // asociativo, donde las claves son los nombres de las columnas.
    //
    // Si no existe ningún usuario con ese nombre, devuelve false.

    $usuario = $resultado->fetch_assoc();

    // Cerramos la consulta preparada porque ya no la necesitamos.

    $stmt->close();


    // =========================================================
    // 12. COMPROBAR LAS CREDENCIALES
    // =========================================================

    // Comprobamos dos cosas:
    //
    // 1. Que el usuario exista en la base de datos.
    // 2. Que la contraseña introducida coincida con su hash.
    //
    // password_verify() compara la contraseña recibida con
    // el hash almacenado en la columna password_hash.
    //
    // No debemos comparar directamente la contraseña con el hash.

    if (!$usuario || !password_verify($password, $usuario["password_hash"])) {

        // Si las credenciales son incorrectas, cerramos
        // la conexión con la base de datos.

        $conexion->close();

        // Devolvemos el error 401: no autorizado.
        // Utilizamos el mismo mensaje tanto si el usuario
        // no existe como si la contraseña es incorrecta.

        sendJson(401, [
            "success" => false,
            "message" => "Credenciales incorrectas."
        ]);
    }


    // =========================================================
    // 13. ACTUALIZAR LA FECHA DEL ULTIMO ACCESO
    // =========================================================

    // Si hemos llegado aquí, las credenciales son correctas.
    //
    // Actualizamos la columna last_login con la fecha y hora
    // actuales del servidor MySQL mediante NOW().

    $sql = "UPDATE users SET last_login = NOW() WHERE id = ?";

    // Preparamos la consulta UPDATE.

    $stmt = $conexion->prepare($sql);

    // Asociamos el identificador del usuario al marcador ?.
    // La letra i indica que se trata de un número entero.

    $stmt->bind_param("i", $usuario["id"]);

    // Ejecutamos la actualización.

    $stmt->execute();

    // Cerramos la consulta y la conexión a MySQL.

    $stmt->close();
    $conexion->close();


    // =========================================================
    // 14. CREAR EL TOKEN JWT
    // =========================================================

    // Como el usuario se ha identificado correctamente,
    // creamos un token JWT para que pueda acceder a otros
    // recursos protegidos de la API.
    //
    // createJwt() está definida en config.php.
    //
    // sub identifica al usuario.
    // username contiene su nombre de usuario.
    // role contiene su rol: admin o user.

    $token = createJwt([
        "sub" => (int) $usuario["id"],
        "username" => $usuario["username"],
        "role" => $usuario["role"]
    ]);


    // =========================================================
    // 15. DEVOLVER LA RESPUESTA AL CLIENTE
    // =========================================================

    // Devolvemos el código HTTP 200, que indica que la operación
    // se ha realizado correctamente.
    //
    // La respuesta contiene:
    //
    // - success: indica que el inicio de sesión ha funcionado.
    // - token: JWT que el cliente utilizará en otras peticiones.
    // - user: datos básicos del usuario.
    //
    // No devolvemos password_hash ni la contraseña.

    sendJson(200, [
        "success" => true,
        "token" => $token,
        "user" => [
            "id" => (int) $usuario["id"],
            "username" => $usuario["username"],
            "first_name" => $usuario["first_name"],
            "last_name" => $usuario["last_name"],
            "role" => $usuario["role"]
        ]
    ]);

?>
