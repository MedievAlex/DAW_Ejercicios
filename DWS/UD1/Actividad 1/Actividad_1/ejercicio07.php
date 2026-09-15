<?php
/*
Ejercicio 07
Definir un número en una variable y decir a qué nota le corresponde.
• Entre 1 y 4,9: suspenso.
• Entre 5 y 5,9: suficiente.
• Entre 6 y 6,9: bien.
• Entre 7 y 8,9: muy bien.
• Entre 9 y 10: sobresaliente.
• Si no ERROR.

http://localhost:8000/Actividad_1/ejercicio07.php
*/

$nota = 6.8;
$resultado = "desconocido";

echo ("Ejercicio 07");
echo ("</br>-------------------------------");
echo ("</br>");
echo ("La nota: " . $nota);
echo ("</br>");

if (1 <= $nota && $nota <= 4.9) {
    $resultado = "suspenso";
} else if (5 <= $nota && $nota <= 5.9) {
    $resultado = "suficiente";
} else if (6 <= $nota && $nota <= 6.9) {
    $resultado = "bien";
} else if (7 <= $nota && $nota <= 8.9) {
    $resultado = "muy bien";
} else if (9 <= $nota && $nota <= 10) {
    $resultado = "sobresaliente";
} else {
    $resultado = "ERROR";
}

echo ("Resultado: " . $resultado);

echo ("</br>-------------------------------");
