<?php
/*
Ejercicio 10
Tengo un billete de avión para Denver definir la variable dataSalida
(fecha y hora). Necesito que el programa que calcule tiempo me falta
para coger dicho avión, dependiendo de la hora actual.

http://localhost:8000/Actividad_1/ejercicio10.php
*/

$dataSalida = date_create("2026-09-30 08:10:00");
$dataAhora = date_create();

echo ("Ejercicio 10");
echo ("</br>-------------------------------");

$tiempoRestante = $dataSalida->diff($dataAhora);
echo ("</br>");
echo $tiempoRestante->format("%H:%I:%S (Días completos: %a)"), "\n";

echo ("</br>-------------------------------");

?>