<?php
/*
Ejercicio 05
Hacer una página PHP que compruebe si el contenido de una
variable es par o impar.

http://localhost:8000/Actividad_1/ejercicio05.php
*/

$num = 20;

echo ("Ejercicio 05");
echo ("</br>-------------------------------");
echo ("</br>");
echo ("Numero: " . $num);
echo ("</br>");

if ($num % 2 == 0) {
    // El numero es par
    echo ("Es un numero par");
} else {
    // El numero es impar
    echo ("Es un numero impar");
}

echo ("</br>-------------------------------");

?>