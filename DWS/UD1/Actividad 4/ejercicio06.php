<?php
/*
Ejercicio 06
Guarda en un array 10 números aleatorios entre 0 y 99 y sacar la
media. 

Build-in: http://localhost:8000/Actividad_4/ejercicio06.php
Xdebug: http://php-mvc.localhost/Actividad_4/ejercicio06.php
*/

$numeros = array();
$media = 0;

echo ("Ejercicio 06");
echo ("</br>-------------------------------</br>");

echo ("NUMEROS");
for ($i = 0; $i < 10; $i++) {
    echo ("</br>");
    $numeros[$i] = rand(1, 98);
    $media = $media + $numeros[$i];
    echo ("- " . $numeros[$i]);
}

$media = $media / count($numeros);

echo ("</br>");

echo ("La media es " . $media);

echo ("</br>-------------------------------");

?>