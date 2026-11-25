<?php
    session_start();
    if (!isset($_SESSION["visitas"])) {
        $_SESSION["visitas"] = 1;
    } else {
        $_SESSION["visitas"]++;
    }
?>
<!DOCTYPE html>
    <html lang="es">
        <head>
            <meta charset="UTF-8">
            <title>Contador de visitas</title>
        </head>
        <body>
            <h1>Contador de visitas</h1>
            <p>Numero de peticiones:
                <?php echo $_SESSION["visitas"]; ?>
            </p>
            <p>
                <a href="comprobar_sesion.php">Volver a cargar la pagina</a>
            </p>
        </body>
    </html>
