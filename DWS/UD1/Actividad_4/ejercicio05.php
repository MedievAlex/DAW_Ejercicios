<?php
/*
Ejercicio 05
Guarda en un array 10 numeros aleatorios entre 0 y 99 y sacar la
minima.

Build-in: http://localhost:8000/UD1/Actividad_4/ejercicio05.php
Xdebug: http://dws-php.localhost/UD1/Actividad_4/ejercicio05.php
*/

$numeros = array();

echo ("Ejercicio 05");
echo ("</br>-------------------------------</br>");

echo ("NUMEROS");
for ($i = 0; $i < 10; $i++) {
    echo ("</br>");
    $numeros[$i] = rand(1, 99);
    echo ("- " . $numeros[$i]);
}

echo ("</br>");

echo ("El número más pequeño es el " . min($numeros));

echo ("</br>-------------------------------");

?>