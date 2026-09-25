<?php
/*
Ejercicio 01
Hacer un programa que contenga dos números distintos en sendas
variables. A continuación mostrar el resultado de la suma, la resta, la
multiplicación, división y módulo.

Build-in: http://localhost:8000/Actividad_1/ejercicio01.php
Xdebug: http://php-mvc.localhost/Actividad_1/ejercicio01.php
*/

$num1 = 10;
$num2 = 4;

echo ("Ejercicio 01");
echo ("</br>-------------------------------</br>");

echo ("Numero uno: " . $num1);
echo ("</br>");
echo ("Numero dos: " . $num2);
echo ("</br>");

echo ("</br>");

echo ("Suma: " . $num1 + $num2);
echo ("</br>");
echo ("Resta: " . $num1 - $num2);
echo ("</br>");
echo ("Multiplicacion: " . $num1 * $num2);
echo ("</br>");
echo ("Division: " . $num1 / $num2);
echo ("</br>");
echo ("Modulo: " . $num1 % $num2);

echo ("</br>-------------------------------");

?>