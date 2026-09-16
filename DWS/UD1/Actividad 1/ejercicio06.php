<?php
/*
Ejercicio 06
Hacer una página PHP que tenga dos variables y nos indique si la
suma de los números es mayor que el producto (resultado de la
multiplicación) de ellos o, al contrario. Ejemplo:
Numero1 = 1; numero2 = 2 —> “la suma es mayor que el producto”
Numero1 = 5; numero2 = 2 —> “el producto es mayor que la suma”

http://localhost:8000/Actividad_1/ejercicio06.php
*/

$num1 = 10;
$num2 = 4;

$sum = $num1 + $num2;
$mul = $num1 * $num2;

echo ("Ejercicio 06");
echo ("</br>-------------------------------");
echo ("</br>");
echo ("Numero uno: " . $num1);
echo ("</br>");
echo ("Numero dos: " . $num2);
echo ("</br>");

if ($sum > $mul) {
    echo ("La suma es mayor que la multiplicacion");
} else {
    echo ("La multiplicacion es mayor que la suma");
}

echo ("</br>-------------------------------");

?>