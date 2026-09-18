<?php
/*
Ejercicio 12
Revertir una cadena: Crea un programa que tome una cadena y
devuelva su versión invertida.

Build-in: http://localhost:8000/Actividad_1/ejercicio12.php
Xdebug: http://php-mvc.localhost/Actividad_1/ejercicio12.php
*/

$cadena = "ARROZ";

echo("Ejercicio 12");
echo("</br>-------------------------------</br>");

echo("Cadena: " . $cadena);
echo("</br>");
echo("Cadena invertida: " . strrev($cadena));

echo("</br>-------------------------------");

/*
<?php
//Alternativa

$cadena = "Lorem ipsum dolor sit amet, consectetur adipiscing elit.";
$inversa = "";

for ($i = strlen($cadena) ; $i > 0; $i--) {
    $inversa = $inversa . $cadena[$i - 1];
}

echo $inversa;
?>
*/

?>