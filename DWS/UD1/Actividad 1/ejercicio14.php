<?php
/*
Ejercicio 14
Contar palabras. Escribe un programa que cuente cuántas palabras
tiene una oración. Las palabras están separadas por espacios.

http://localhost:8000/Actividad_1/ejercicio14.php
*/

$oracion = "Erase una vez...";

echo("Ejercicio 14");
echo("</br>-------------------------------</br>");

echo("La oracion contiene ". str_word_count($oracion) . " palabras.");

echo("</br>-------------------------------");

?>