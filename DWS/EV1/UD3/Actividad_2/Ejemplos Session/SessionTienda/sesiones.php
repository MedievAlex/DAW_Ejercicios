<?php
    //ejecutar:http://localhost:8000/UD03/SessionTienda/sesiones.php
    // Iniciamos o recuperamos la sesion
    session_start();
    // Inicializamos el total la primera vez
    if (!isset($_SESSION["Total"])) {
        $_SESSION["Total"] = 0;
    }
?>
<!DOCTYPE html>
    <html lang="es">
        <head>
            <meta charset="UTF-8">
            <title>Sesiones</title>
        </head>
        <body>
        <?php
        // Comprobamos si se ha enviado el formulario
        if (!isset($_POST["botEnviar"])) {
        ?>
            <h1>Seleccion de productos</h1>
            <p>Elija el producto y pulse en Enviar:</p>
            <form method="post"
                action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <select name="Productos" size="1">
                    <option value="Placa MMX-100">Placa MMX-100</option>
                    <option value="Placa MMX-200">Placa MMX-200</option>
                    <option value="Telefono ALSTER">Telefono ALSTER</option>
                    <option value="Telefono MOVILON">Telefono MOVILON</option>
                </select>
                <input type="submit" name="botEnviar" value="Enviar">
            </form>
        <?php
        } else {
            // Recuperamos el producto seleccionado
            $producto = $_POST["Productos"];
            // Calculamos el importe
            switch ($producto) {
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

            // Mostramos el total acumulado
            echo "<h2>Total a facturar: "
                . $_SESSION["Total"] . " euros</h2>";
            // Enlace para volver al formulario
            echo '<p><a href="' . htmlspecialchars($_SERVER["PHP_SELF"])
                . '">Volver</a></p>';
        }
        ?>
        </body>
    </html>
