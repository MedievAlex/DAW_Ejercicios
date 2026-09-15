<?php
/*
Ejercicio 11
Contar vocales: Escribe un programa que reciba una cadena de texto
y cuente cuántas vocales (a, e, i, o, u) tiene.

http://localhost:8000/Actividad_1/ejercicio11.php
*/

$cadena = "yugfiwbsceenslknzae";
$vocales = array();
$vocal = "";
$repeticiones = 0;

echo ("Ejercicio 11");
echo ("</br>-------------------------------");

$vocales[] = "a";

for ($i = 0; count($vocales) > $i; $i++) {
    echo ($vocales[$i]);
    echo (" ");
}

$vocal = "a";
$repeticiones = substr_count($cadena, $vocal);
echo ("</br>");
echo ("La vocal '$vocal' aparece $repeticiones veces.");

$vocal = "i";
$repeticiones = substr_count($cadena, $vocal);
echo ("</br>");
echo ("La vocal '$vocal' aparece $repeticiones veces.");

$vocal = "u";
$repeticiones = substr_count($cadena, $vocal);
echo ("</br>");
echo ("La vocal '$vocal' aparece $repeticiones veces.");

$vocal = "e";
$repeticiones = substr_count($cadena, $vocal);
echo ("</br>");
echo ("La vocal '$vocal' aparece $repeticiones veces.");

$vocal = "o";
$repeticiones = substr_count($cadena, $vocal);
echo ("</br>");
echo ("La vocal '$vocal' aparece $repeticiones veces.");

echo ("</br>-------------------------------");

?>