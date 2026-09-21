<?php
/*
Ejercicio 01
Elabore un programa que imprima la figura de un triángulo rectángulo
de $numLineas lineas ajustada a la izquierda, formada por letras “o”.
El valor del número de líneas se enviará al servidor mediante GET.

Build-in: http://localhost:8000/Actividad_3/ejercicio01.php?numLineas=10
Xdebug: http://php-mvc.localhost/Actividad_3/ejercicio01.php?numLineas=10
*/

if(isset($_GET["numLineas"])){
    $linea = "";
    $numLineas = $_GET["numLineas"];

    echo("Ejercicio 01");
    echo("</br>-------------------------------</br>");

    echo("Triangulo rectangulo de " . $numLineas . " x  " . $numLineas . " x  " . $numLineas . ":");

    for($i = 1; $i <= $numLineas; $i++){
        $linea = $linea . "o";

        echo("</br>" . $linea);
    }

    echo("</br>-------------------------------");
}

?>