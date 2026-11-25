<?php
    //ejecutar:http://localhost:8000/UD03/Session/modificar_sesiones.php
    session_start();
    // Comprobamos si existe el total
    if (!isset($_SESSION["Total"])) {
        $_SESSION["Total"] = 0;
    }
    // Sumamos 850 euros al total
    $_SESSION["Total"] += 850;
?>

<!DOCTYPE html>
    <html lang="es">
        <head>
            <meta charset="UTF-8">
            <title>Modificar sesion</title>
        </head>
        <body>
            <h1>Actualizacion del total</h1>
            <p>Total actual:
                <?php echo $_SESSION["Total"]; ?> euros
            </p>
            <p>
                <a href="modificar_sesion.php">Sumar otros 850 euros</a>
            </p>
        </body>
    </html>
