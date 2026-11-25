<?php
    // http://localhost:8000/UD3/Actividad_2/APISession/crear_usuarios_demo.php

    // =========================================================
    // 1. CARGAR EL ARCHIVO DE CONFIGURACION
    // =========================================================

    // Incluimos config.php, que contiene las funciones comunes
    // de la API y carga la clase ConexionDB.
    //
    // Utilizaremos sendJson() para devolver respuestas JSON
    // y ConexionDB para conectarnos a MySQL.

    require_once __DIR__ . "/config.php";


    // =========================================================
    // 2. DEFINIR LA CLAVE DE INSTALACION
    // =========================================================

    // Definimos una constante con la clave necesaria
    // para ejecutar este script.
    //
    // Esta clave sirve para impedir que cualquier persona
    // pueda crear o actualizar usuarios de demostración.
    //
    // En un entorno real debemos utilizar una clave privada,
    // cambiarla antes de ejecutar el script y evitar publicarla.

    const SETUP_KEY = "melon";


    // =========================================================
    // 3. COMPROBAR EL METODO HTTP
    // =========================================================

    // Este script utiliza el método POST porque realiza
    // una operación que modifica la base de datos.
    //
    // Si se accede mediante GET, devolvemos un error 405.

    if ($_SERVER["REQUEST_METHOD"] != "POST") {

        // Indicamos que el recurso admite el método POST.

        header("Allow: POST");

        // Devolvemos una respuesta JSON con el error.

        sendJson(405, [
            "success" => false,
            "message" => "Utiliza el metodo POST."
        ]);
    }


    // =========================================================
    // 4. COMPROBAR LA CLAVE DE INSTALACION
    // =========================================================

    // Leemos la cabecera HTTP X-Setup-Key.
    //
    // El nombre de esta cabecera se transforma normalmente
    // en la variable de PHP $_SERVER["HTTP_X_SETUP_KEY"].
    //
    // Si la cabecera no existe, utilizamos una cadena vacía.

    $clave = $_SERVER["HTTP_X_SETUP_KEY"] ?? "";

    // hash_equals() compara la clave configurada con la recibida.
    //
    // Si las claves no coinciden, impedimos ejecutar el script
    // y devolvemos el código HTTP 403: acceso prohibido.

    if (!hash_equals(SETUP_KEY, $clave)) {

        sendJson(403, [
            "success" => false,
            "message" => "Clave de instalacion incorrecta."
        ]);
    }


    // =========================================================
    // 5. CONECTAR CON LA BASE DE DATOS
    // =========================================================

    // Utilizamos la clase ConexionDB para conectarnos
    // a la base de datos api_login mediante mysqli.

    $conexion = ConexionDB::conexion();


    // =========================================================
    // 6. DEFINIR LOS USUARIOS DE DEMOSTRACION
    // =========================================================

    // Creamos un array con los datos de dos usuarios:
    //
    // Primer usuario:
    // - username: admin
    // - email: admin@example.com
    // - nombre: Admin
    // - apellido: User
    // - rol: admin
    //
    // Segundo usuario:
    // - username: usuario
    // - email: usuario@example.com
    // - nombre: Usuario
    // - apellido: Demo
    // - rol: user
    //
    // Estos datos se utilizarán para insertar los usuarios
    // en la tabla users.

    $usuarios = [
        [
            "admin",
            "admin@example.com",
            "Admin",
            "User",
            "admin"
        ],
        [
            "usuario",
            "usuario@example.com",
            "Usuario",
            "Demo",
            "user"
        ]
    ];


    // =========================================================
    // 7. PREPARAR LA CONSULTA SQL
    // =========================================================

    // La consulta INSERT permite introducir un nuevo usuario
    // en la tabla users.
    //
    // Las columnas que vamos a rellenar son:
    //
    // username      -> nombre de usuario.
    // email         -> correo electrónico.
    // first_name    -> nombre.
    // last_name     -> apellido.
    // role          -> rol del usuario.
    // password_hash -> hash de su contraseña.
    //
    // Los seis símbolos ? son marcadores de posición.
    // Sus valores se asociarán posteriormente con bind_param().
    //
    // ON DUPLICATE KEY UPDATE permite actualizar algunos campos
    // si la inserción provoca un conflicto con una clave única.
    //
    // Por ejemplo, si username ya existe y tiene una restricción
    // UNIQUE, se actualizarán el correo, el nombre, el apellido
    // y el rol en lugar de insertar otra fila.
    //
    // La contraseña existente no se actualiza en ese caso,
    // porque password_hash no aparece en el bloque UPDATE.

    $sql = "INSERT INTO users
            (username, email, first_name, last_name, role, password_hash)
            VALUES (?, ?, ?, ?, ?, ?)
            ON DUPLICATE KEY UPDATE
            email = VALUES(email),
            first_name = VALUES(first_name),
            last_name = VALUES(last_name),
            role = VALUES(role)";


    // =========================================================
    // 8. PREPARAR LA CONSULTA
    // =========================================================

    // prepare() prepara la sentencia SQL.
    //
    // Después podremos ejecutar la misma consulta varias veces
    // cambiando los datos de cada usuario.

    $stmt = $conexion->prepare($sql);


    // =========================================================
    // 9. RECORRER EL ARRAY DE USUARIOS
    // =========================================================

    // foreach recorre todos los elementos del array $usuarios.
    //
    // En cada repetición, la variable $usuario contiene
    // los datos de uno de los usuarios de demostración.

    foreach ($usuarios as $usuario) {


        // -----------------------------------------------------
        // 9.1. OBTENER LOS DATOS DEL USUARIO
        // -----------------------------------------------------

        // Guardamos cada posición del array en una variable
        // para que la consulta sea más fácil de entender.

        $username = $usuario[0];
        $email = $usuario[1];
        $nombre = $usuario[2];
        $apellido = $usuario[3];
        $rol = $usuario[4];


        // -----------------------------------------------------
        // 9.2. GENERAR EL HASH DE LA CONTRASEÑA
        // -----------------------------------------------------

        // Todos los usuarios de demostración tendrán inicialmente
        // la contraseña 1234.
        //
        // password_hash() transforma la contraseña en un hash
        // seguro utilizando el algoritmo predeterminado de PHP.
        //
        // No guardamos la contraseña directamente en la base
        // de datos, sino el hash generado.
        //
        // El hash puede ser diferente cada vez que se ejecuta
        // password_hash(), aunque la contraseña sea la misma.

        $passwordHash = password_hash("1234", PASSWORD_DEFAULT);


        // -----------------------------------------------------
        // 9.3. ASOCIAR LOS DATOS A LOS MARCADORES ?
        // -----------------------------------------------------

        // bind_param() asocia las seis variables a los seis
        // marcadores de posición de la consulta SQL.
        //
        // Las seis letras s indican que los seis parámetros
        // se envían como cadenas de texto (string).
        //
        // También se utiliza s para passwordHash porque el hash
        // es una cadena de caracteres.

        $stmt->bind_param(
            "ssssss",
            $username,
            $email,
            $nombre,
            $apellido,
            $rol,
            $passwordHash
        );


        // -----------------------------------------------------
        // 9.4. EJECUTAR LA CONSULTA
        // -----------------------------------------------------

        // Ejecutamos la sentencia para crear o actualizar
        // el usuario actual.
        //
        // Cuando termine esta repetición, foreach continuará
        // con el siguiente usuario del array.

        $stmt->execute();
    }


    // =========================================================
    // 10. CERRAR LA CONSULTA Y LA CONEXION
    // =========================================================

    // Cerramos la consulta preparada porque ya no la necesitamos.

    $stmt->close();

    // Cerramos la conexión con MySQL para liberar recursos.

    $conexion->close();


    // =========================================================
    // 11. DEVOLVER LA RESPUESTA JSON
    // =========================================================

    // Si el proceso ha terminado sin errores de ejecución,
    // devolvemos el código HTTP 200.
    //
    // La respuesta informa de que los usuarios se han creado
    // o actualizado e incluye sus credenciales de demostración.
    //
    // Estos datos solo deben utilizarse en un entorno de pruebas.
    // No debemos utilizar la contraseña 1234 en producción.
    //
    // sendJson() convierte el array en JSON y termina
    // la ejecución del script.

    sendJson(200, [
        "success" => true,
        "message" => "Usuarios de demostracion creados o actualizados.",
        "credentials" => [
            [
                "username" => "admin",
                "password" => "1234",
                "role" => "admin"
            ],
            [
                "username" => "usuario",
                "password" => "1234",
                "role" => "user"
            ]
        ]
    ]);

?>
