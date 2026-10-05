<?php
    if (!isset($personas)) {
        $personas = array();
    }
?>
<!DOCTYPE html>
    <html lang="es">

        <head>
            <meta charset="UTF-8">
            <title>Nombre y Estatura</title>
        </head>
        <body>
            <table>
                <tr>
                    <td>Nombre</td>
                    <td>Estarura</td>
                </tr>
                <?php
                    foreach ($personas as $persona) {
                        echo "<tr><td>" . $persona->getNombre() . "</td>";
                        echo "<td>" . $persona->getEstatura() . "</td></tr>";
                    }
                ?>
            </table>
        </body>
    </html>