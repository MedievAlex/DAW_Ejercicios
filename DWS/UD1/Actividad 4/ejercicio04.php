<?php
/*
Ejercicio 04
Guarda en un array 10 números y saca el número más grande de
todos ellos. 

Build-in: http://localhost:8000/Actividad_4/ejercicio04.php
Xdebug: http://php-mvc.localhost/Actividad_4/ejercicio04.php
*/

$numeros = array();

echo ("Ejercicio 04");
echo ("</br>-------------------------------</br>");

echo ("NUMEROS");
for ($i = 0; $i < 10; $i++) {
    echo ("</br>");
    $numeros[$i] = rand(1, 98);
    echo ("- " . $numeros[$i]);
}

echo ("</br>");

echo ("El número más grande es el " . max($numeros));

echo ("</br>-------------------------------");

?>