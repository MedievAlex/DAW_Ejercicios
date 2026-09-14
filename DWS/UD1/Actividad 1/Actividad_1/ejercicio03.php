<?php
/*
Ejercicio 03
Define la constante PI y calcula el perímetro y superficie de un círculo
cuyo radio es de 5cm.

http://localhost:8000/Actividad_1/ejercicio03.php
*/

const numPi = 3.14159;
$rad = 5;
$per = 2 * numPi * $rad;
$sup = numPi * ($rad * $rad);

echo("Ejercicio 03");
echo("</br>-------------------------------");
echo("</br>");
echo("Radio: " . $rad . " cm");
echo("</br>");
echo("Perimetro: " . $per . " cm");
echo("</br>");
echo("Superficie: " . $sup . " cm");

echo("</br>-------------------------------");

?>