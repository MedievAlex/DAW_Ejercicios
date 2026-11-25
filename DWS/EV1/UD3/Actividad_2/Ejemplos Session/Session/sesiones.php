
<?php
    //ejecutar:http://localhost:8000/UD03/Session/sesiones.php
    session_start();
    // Guardamos informacion en la sesion
    $_SESSION["usuario"] = "Ane";
    $_SESSION["Total"] = 700;
?>
<!DOCTYPE html>
    <html lang="es">
        <head>
            <meta charset="UTF-8">
            <title>Ejemplo de sesion</title>
        </head>
        <body>
            <h1>Datos de la sesion</h1>
            <p>Usuario: <?php echo $_SESSION["usuario"]; ?></p>
            <p>Total: <?php echo $_SESSION["Total"]; ?> euros</p>
        </body>
    </html>
