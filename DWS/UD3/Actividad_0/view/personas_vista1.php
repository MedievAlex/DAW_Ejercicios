<?php
    if (!isset($personas)) {
        $personas = array();
    }
?>
<!DOCTYPE html>
    <html lang="es">

        <head>
            <meta charset="UTF-8">
            <title>Nombre y edad</title>
        </head>
        <body>
            <table>
                <tr>
                    <td>Nombre</td>
                    <td>Edad</td>
                </tr>
                <?php
                    foreach ($personas as $persona) {
                        echo "<tr><td>" . $persona->getNombre() . "</td>";
                        echo "<td>" . $persona->getEdad() . "</td></tr>";
                    }
                ?>
            </table>
        </body>
    </html>