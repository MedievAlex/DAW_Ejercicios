<?php
/*
Ejercicio 02
Realiza la suma desde un número (primerNum) hasta otro
(ultimoNum). Los valores de los dos parámetros se enviarán por GET.

Build-in: http://localhost:8000/Actividad_3/ejercicio02.php?primerNum=5&ultimoNum=10
Xdebug: http://php-mvc.localhost/Actividad_3/ejercicio02.php?primerNum=5&ultimoNum=10
*/

$primerNum = $_GET["primerNum"];
$ultimoNum = $_GET["ultimoNum"];
$contador = $primerNum;
$suma = 0;

echo ("Ejercicio 04");
echo ("</br>-------------------------------");

for ($i = $primerNum; $i <= $ultimoNum; $i++) {
    $suma = $suma + $i;
    echo ("</br>");
    echo (($suma - $i) . " + " . $i . " = " . $suma);
}

echo ("</br>-------------------------------");

?>