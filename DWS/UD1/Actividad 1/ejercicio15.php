<?php
/*
Ejercicio 15
Reemplazar caracteres: Haz un programa que reciba una cadena de
texto y reemplace todas las vocales por un carácter específico.

Build-in: http://localhost:8000/Actividad_1/ejercicio15.php
Xdebug: http://php-mvc.localhost/Actividad_1/ejercicio15.php
*/

$cadena = "Almacenado";
$cadenaMod = "";
$reemplazo = "*";
$vocales = array("a", "i", "u", "e", "o");
$reemplazos = array("4", "1", "2", "6", "0");

echo("Ejercicio 15");

echo("</br>-------------------------------</br>");

echo ("Cadena: " . $cadena);
$cadenaMod = strtolower($cadena);

for ($i = 0; count($vocales) > $i; $i++) {
    // $cadenaMod = str_replace($vocales[$i], $reemplazo, $cadenaMod);
    $cadenaMod = str_replace($vocales[$i], $reemplazos[$i], $cadenaMod);
}

echo ("</br>");
echo ("Cadena reemplazada: " . $cadenaMod);

echo("</br>-------------------------------");

?>