<?php
/*
Ejercicio 04
Escribir un programa, que reciba un número, y visualice la tabla de
multiplicación correspondiente de 1 a 10.

Build-in: http://localhost:8000/Actividad_3/ejercicio04.php?numero=5
Xdebug: http://php-mvc.localhost/Actividad_3/ejercicio04.php?numero=5
*/

$numero = $_GET["numero"];

echo ("Ejercicio 04");
echo ("</br>-------------------------------</br>");

for ($i = 1; $i <= 10; $i++) {
        echo ("</br>");
        echo ($i . " x " . $numero . " = " . $i * $numero);
}

echo ("</br>-------------------------------");

?>