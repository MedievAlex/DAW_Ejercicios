<?php
/*
Ejercicio 04
Realiza la suma desde un número (primerNum) hasta otro
(ultimoNum). Con While y con For.

Build-in: http://localhost:8000/Actividad_2/ejercicio04.php
Xdebug: http://php-mvc.localhost/Actividad_2/ejercicio04.php
*/

$primerNum = 5;
$ultimoNum = 10;
$contador = $primerNum;
$suma = 0;

echo("Ejercicio 04");
echo("</br>-------------------------------</br>");

echo("[Suma ascendente FOR]");

for($i = $primerNum; $i <= $ultimoNum; $i++){
    $suma = $suma + $i;
    echo("</br>");
    echo(($suma - $i) . " + " . $i . " = " . $suma);
}
$suma = 0;

echo("</br>");
echo("[Suma ascendente WHILE]");

while($contador <= $ultimoNum){
    $suma = $suma + $contador;
    echo("</br>");
    echo(($suma - $contador) . " + " . $contador . " = " . $suma);
    $contador++;
}

echo("</br>-------------------------------");

?>