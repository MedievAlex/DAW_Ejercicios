<?php
$hash_generado = "";
$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Si se pulsa "Generar hash"
    if (isset($_POST["generar"])) {
        $password = $_POST["password"];
        $hash_generado = password_hash($password, PASSWORD_DEFAULT);
    }

    // Si se pulsa "Comprobar contraseña"
    if (isset($_POST["comprobar"])) {
        $password_comprobar = $_POST["password_comprobar"];
        $hash = $_POST["hash"];

        if (password_verify($password_comprobar, $hash)) {
            $mensaje = "Contraseña correcta";
        } else {
            $mensaje = "Contraseña incorrecta";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Hash de contraseñas en PHP</title>
</head>

<body>

    <h1>Hash de contraseñas en PHP</h1>

    <h2>1. Generar un hash</h2>

    <form method="POST">
        <label>Contraseña:</label>
        <input type="text" name="password" required>
        <button type="submit" name="generar">Generar hash</button>
    </form>

    <?php if ($hash_generado != ""): ?>

        <p><strong>Hash generado:</strong></p>
        <textarea rows="4" cols="80"><?php echo htmlspecialchars($hash_generado); ?></textarea>

        <hr>

        <h2>2. Comprobar una contraseña</h2>

        <form method="POST">

            <label>Contraseña que quieres comprobar:</label><br>
            <input type="text" name="password_comprobar" required>

            <br><br>

            <label>Hash guardado:</label><br>
            <textarea name="hash" rows="4" cols="80" required><?php echo htmlspecialchars($hash_generado); ?></textarea>

            <br><br>

            <button type="submit" name="comprobar">Comprobar contraseña</button>

        </form>

    <?php endif; ?>

    <?php if ($mensaje != ""): ?>
        <h2><?php echo $mensaje; ?></h2>
    <?php endif; ?>

</body>

</html>