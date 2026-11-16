<?php
/*
Ejercicio 01
Elabore un programa que imprima la figura de un triángulo rectángulo
de $numLineas lineas ajustada a la izquierda, formada por letras “o”.
El valor del número de líneas se enviará al servidor mediante GET.

Build-in: http://localhost:8000/UD1/Actividad_3/ejercicio01.php?numLineas=10
Xdebug: http://dws-php.localhost/UD1/Actividad_3/ejercicio01.php?numLineas=10
*/

if (isset($_GET["numLineas"])) {
    $numLineas = $_GET["numLineas"];

    if (is_int($numLineas)) {
        $linea = "";

        echo ("Ejercicio 01");
        echo ("<br>-------------------------------<br>");

        echo ("Triangulo rectangulo de " . $numLineas . " x  " . $numLineas . " x  " . $numLineas . ":");

        for ($i = 1; $i <= $numLineas; $i++) {
            $linea = $linea . "o";

            echo ("<br>" . $linea);
        }

        echo ("<br>-------------------------------");
    } else {
        echo ("[ERROR]: El parámetro Lineas no es válido.");
    }
} else {
    echo ("[ERROR]: El parámetro Lineas no existe.");
}

?>