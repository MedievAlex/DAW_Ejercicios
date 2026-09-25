<?php
/*
Ejercicio 11
Contar vocales: Escribe un programa que reciba una cadena de texto
y cuente cuántas vocales (a, e, i, o, u) tiene.

Build-in: http://localhost:8000/Actividad_1/ejercicio11.php
Xdebug: http://php-mvc.localhost/Actividad_1/ejercicio11.php
*/

$cadena = "yugfiawbsceenslknzae";
$vocales = array("a", "i", "u", "e", "o");
$repeticiones = 0;

echo ("Ejercicio 11");
echo ("</br>-------------------------------</br>");

echo ("Cadena: " . $cadena);

for ($i = 0; count($vocales) > $i; $i++) {
    $repeticiones = substr_count(strtolower($cadena), $vocales[$i]);

    echo ("</br>");
    echo ("La vocal " . $vocales[$i] . " aparece " . $repeticiones . " veces.");
}

echo ("</br>-------------------------------");

?>