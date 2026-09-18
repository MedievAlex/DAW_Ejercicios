<?php
/*Revertir una cadena: Crea un programa que tome una cadena y
devuelva su versión invertida.*/

$cadena = "Lorem ipsum dolor sit amet, consectetur adipiscing elit.";
$inversa = "";

for ($i = strlen($cadena) ; $i > 0; $i--) {
    $inversa = $inversa . $cadena[$i - 1];
}

echo $inversa;
?>