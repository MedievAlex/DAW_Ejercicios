<?php
/*
Ejercicio 05
Programa que guarde 50 números aleatorios (rango del 0 al 49) en
una tabla. Luego tiene que indicar cuántas veces aparece cada
número en el array. 

Build-in: http://localhost:8000/Actividad_5/ejercicio05.php
Xdebug: http://php-mvc.localhost/Actividad_5/ejercicio05.php
*/

$numeros = array();
$numerosContados = array();

echo ("Ejercicio 05");
echo ("</br>-------------------------------");


for($i = 0; $i < 50 ; $i++){
   $numeros[$i] = rand(1, 49);
}

$numerosContados = array_count_values($numeros);

foreach ($numerosContados as $numero => $repeticiones) {
    echo ("</br>" . $numero . " se ha repetido " . $repeticiones . " veces");
}

echo ("</br>-------------------------------");

?>