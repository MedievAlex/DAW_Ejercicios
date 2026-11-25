<?php
    // ----------------------------------------------------
    // 1. INICIAR O RECUPERAR LA SESION
    // ----------------------------------------------------

    // PHP recupera la sesion asociada al navegador.
    // Debe utilizarse el mismo nombre de sesion y la misma
    // cookie para acceder a las variables guardadas.
    session_start();

    // Obtenemos el identificador de la sesion.
    $actual_session_id = session_id();
?>
<!DOCTYPE html>
    <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport"
                content="width=device-width, initial-scale=1.0">

            <title>Otra pagina - Sesiones PHP</title>

            <style>
                body {
                    background-color: rgb(145, 209, 255);
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

                        <!-- Enlace para volver a la pagina principal -->
                        <a href="vistaP.php">Inicio</a>
                    </small>
                </h3>
            </header>

            <h3>Contenido de la sesion desde otra pagina</h3>

            <!-- Mostramos las mismas variables de sesion -->
            <textarea readonly><?php
                echo htmlspecialchars(
                    print_r($_SESSION, true),
                    ENT_QUOTES,
                    'UTF-8'
                );
            ?></textarea>

        </body>
    </html>