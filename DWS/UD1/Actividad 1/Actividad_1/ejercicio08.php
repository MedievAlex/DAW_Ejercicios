<?php
/*
Ejercicio 08
Diseñar un programa que determine la cantidad total a pagar por una
llamada telefónica de acuerdo a las siguientes premisas:
• Toda llamada que dure menos de 3 minutos tiene un coste de
10 céntimos.
• Cada minuto adicional a partir de los 3 primeros es un paso de
contador y cuesta 5 céntimos.

http://localhost:8000/Actividad_1/ejercicio08.php
*/

$llam = 4;
$cost = 0;

echo ("Ejercicio 08");
echo ("</br>-------------------------------");
echo ("</br>");
echo ("Duracion: " . $llam);
echo ("</br>");

if ($llam <= 3) {
    $cost = 0.1;
} else {
    $cost = (($llam - 3) * 0.5) + 0.1;
}

echo ("A pagar: " . $cost . " euro");

echo ("</br>-------------------------------");
