<?php
        // Ejecutar:
        // http://localhost:8000/UD03/EjemploSesion/vistaP.php

        // ----------------------------------------------------
        // 1. INICIAR LA SESION
        // ----------------------------------------------------

        // Inicia una nueva sesion o recupera la existente.
        // Debe ejecutarse antes de generar HTML.
        session_start();

        // Obtenemos el identificador de la sesion actual.
        $actual_session_id = session_id();


        // ----------------------------------------------------
        // 2. PROCESAR EL FORMULARIO LOGIN
        // ----------------------------------------------------

        if (isset($_POST["loginbutton"])) {

            // Recuperamos los datos enviados por el formulario.
            $user = trim($_POST["user"] ?? "");
            $pass = $_POST["pass"] ?? "";

            // Comprobamos que ambos campos tengan contenido.
            if ($user !== "" && $pass !== "") {

                // Guardamos los datos en la sesion.
                // Solo para este ejercicio didactico.
                // En una aplicacion real no guardes contrasenas
                // en texto plano dentro de la sesion.
                $_SESSION["user"] = $user;
                $_SESSION["pass"] = $pass;
            }

            // Redirigimos a la misma pagina.
            // Evita repetir el envio al actualizar el navegador.
            header("Location: vistaP.php");
            exit;
        }
/*

        // ----------------------------------------------------
        // 3. PROCESAR EL FORMULARIO LOGOUT
        // ----------------------------------------------------

        if (isset($_POST["logoutbutton"])) {

            // Eliminamos todas las variables de la sesion.
            $_SESSION = [];

            // Eliminamos la cookie de sesion, si se utiliza.
            if (ini_get("session.use_cookies")) {
                $params = session_get_cookie_params();

                setcookie(
                    session_name(),
                    "",
                    time() - 42000,
                    $params["path"],
                    $params["domain"],
                    $params["secure"],
                    $params["httponly"]
                );
            }

            // Destruimos la sesion en el servidor.
            session_destroy();

            // Volvemos a la pagina principal.
            header("Location: vistaP.php");
            exit;
        }
            */


// ----------------------------------------------------
// 3. PROCESAR EL FORMULARIO LOGOUT
// ----------------------------------------------------

if (isset($_POST["logoutbutton"])) {

    // Eliminamos todas las variables de la sesion.
    $_SESSION = [];

    // Guardamos los parametros de la cookie de sesion.
    $params = session_get_cookie_params();

    // Eliminamos la cookie del navegador.
    if (ini_get("session.use_cookies")) {
        setcookie(
            session_name(),
            "",
            time() - 42000,
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httponly"]
        );
    }

    // Destruimos la sesion en el servidor.
    session_destroy();

    // Iniciamos una nueva sesion para la siguiente pagina.
    session_start();

    // Generamos un identificador nuevo.
    session_regenerate_id(true);

    // Redirigimos a la pagina principal.
    header("Location: vistaP.php");
    exit;
}



    ?>
    <!DOCTYPE html>
        <html lang="es">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport"
                    content="width=device-width, initial-scale=1.0">

                <title>Ejemplo de sesiones PHP</title>

                <style>
                    body {
                        background-color: rgb(255, 207, 173);
                        margin: 0;
                        padding: 20px;
                        font-family: Arial, sans-serif;
                    }

                    header {
                        display: flex;
                        justify-content: space-between;
                        align-items: center;
                        flex-wrap: wrap;
                        gap: 10px;
                    }

                    form {
                        padding: 15px;
                    }

                    input, button {
                        padding: 8px;
                        margin: 3px;
                    }

                    textarea {
                        display: block;
                        width: 100%;
                        min-height: 300px;
                        box-sizing: border-box;
                        margin-top: 10px;
                    }

                    a {
                        margin-left: 10px;
                    }
                </style>
            </head>

            <body>

                <header>
                    <h3>
                        $_SESSION:
                        <small>
                            <?php
                            echo htmlspecialchars(
                                $actual_session_id,
                                ENT_QUOTES,
                                'UTF-8'
                            );
                            ?>

                            <a href="vistaS.php">Otra pagina</a>
                        </small>
                    </h3>

                    <!-- Formulario para guardar los datos en la sesion -->
                    <form method="post" action="vistaP.php">

                        <input
                            id="user1"
                            name="user"
                            type="text"
                            placeholder="Email"
                            required
                        >

                        <input
                            name="pass"
                            type="password"
                            placeholder="Pass"
                            required
                        >

                        <button name="loginbutton" type="submit">
                            Login
                        </button>
                    </form>

                    <!-- Formulario independiente para cerrar la sesion -->
                    <form method="post" action="vistaP.php">
                        <button name="logoutbutton" type="submit">
                            Logout
                        </button>
                    </form>
                </header>

                <h3>Contenido de la sesion</h3>

                <!-- Mostramos las variables almacenadas en $_SESSION -->
                <textarea readonly><?php
                    echo htmlspecialchars(
                        print_r($_SESSION, true),
                        ENT_QUOTES,
                        'UTF-8'
                    );
                ?></textarea>

            </body>
        </html>


