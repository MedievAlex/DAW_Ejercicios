<?php
/*
Ejercicio 13
Revertir una cadena: Crea un programa que tome una cadena y
devuelva su versión invertida.

Build-in: http://localhost:8000/Actividad_1/ejercicio13.php
Xdebug: http://php-mvc.localhost/Actividad_1/ejercicio13.php
*/

$cadena = "ARROZ";
$invertido = strrev($cadena);

echo("Ejercicio 13");
echo("</br>-------------------------------</br>");

echo("Cadena: " . $cadena);
echo("</br>");

if($invertido == $cadena){ // strcmp($invertido, $cadena)
    echo($cadena . " es un palindromo.");
} else {
    echo($cadena . " no es un palindromo.");
}

echo("</br>-------------------------------");

?>