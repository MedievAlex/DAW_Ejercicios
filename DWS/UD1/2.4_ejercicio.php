<?php
/*Realiza la suma desde un número (primerNum) hasta otro
(ultimoNum). Con While y con For. */

$primerNum = 2;
$ultimoNum = 5;

$suma = 0;

for (; $primerNum < $ultimoNum; $primerNum++) {
    $suma += $primerNum;
    echo $primerNum . " ";
}
echo "suma: " . $suma . "</br>";

$primerNum = 2;
$ultimoNum = 5;

$suma = 0;

while ($primerNum < $ultimoNum) {
    $suma += $primerNum;
    echo $primerNum . " ";
    $primerNum++;
}
echo "suma: " . $suma . "</br>";
