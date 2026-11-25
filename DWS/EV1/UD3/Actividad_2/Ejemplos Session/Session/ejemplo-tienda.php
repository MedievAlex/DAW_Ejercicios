
<!DOCTYPE html>
//ejecutar:http://localhost:8000/UD03/Session/ejemplo-tienda.php
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Sesiones</title>
    </head>

    <body>

        <?php
            session_start();
            // Comprobamos si se quiere desconectar
            if (isset($_POST["botDesconectar"])) {
                // Guardamos el total antes de destruir la sesion
                $totalFinal = $_SESSION["Total"] ?? 0;
                // Destruimos la sesion
                $_SESSION = [];
                session_destroy();
                // Mostramos el total final y el mensaje
                echo "<h2>Sesion finalizada</h2>";
                echo "<p>Total a facturar: " . $totalFinal . " euros</p>";
                echo '<p><a href="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '">Volver al inicio</a></p>';

            } else {
                // Inicializamos el total si no existe
                if (!isset($_SESSION["Total"])) {
                    $_SESSION["Total"] = 0;
                }
                // Procesamos el producto seleccionado
                if (isset($_POST["botEnviar"])) {

                    switch ($_POST["Productos"]) {
                        case "Placa MMX-100":
                            $_SESSION["Total"] += 700;
                            break;

                        case "Placa MMX-200":
                            $_SESSION["Total"] += 1400;
                            break;

                        case "Telefono ALSTER":
                            $_SESSION["Total"] += 850;
                            break;

                        case "Telefono MOVILON":
                            $_SESSION["Total"] += 623;
                            break;
                    }
                }
        ?>
            <h2>Seleccion de productos</h2>
            <p>Elija el producto y pulse en Enviar:</p>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <select name="Productos">
                    <option value="Placa MMX-100">Placa MMX-100</option>
                    <option value="Placa MMX-200">Placa MMX-200</option>
                    <option value="Telefono ALSTER">Telefono ALSTER</option>
                    <option value="Telefono MOVILON">Telefono MOVILON</option>
                </select>
                <input type="submit" name="botEnviar" value="Enviar">
            </form>

            <h3>Total a facturar: <?php echo $_SESSION["Total"]; ?> euros</h3>

            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <input type="submit" name="botDesconectar" value="Desconectar sesion">
            </form>
        <?php
            }
        ?>
        </body>
    </html>
