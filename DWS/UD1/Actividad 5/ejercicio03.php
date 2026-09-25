<?php
/*
Ejercicio 03
En este programa tendrás que utilizar un array asociativo para
guardar como key cada día de la semana y asociar a cada día un
valor entero. Se tendrá que mostrar en pantalla cada día y valor
almacenado en el array así como la suma y media de todos los
valores guadados en el array. 

Build-in: http://localhost:8000/Actividad_5/ejercicio03.php
Xdebug: http://php-mvc.localhost/Actividad_5/ejercicio03.php
*/

$semana = array(
    "ATELEHENA" => rand(1, 10),
    "MARTITZENA" => rand(1, 10),
    "EGUAZTENA" => rand(1, 10),
    "EGUENA" => rand(1, 10),
    "BARIKUA" => rand(1, 10),
    "LARUMBATA" => rand(1, 10),
    "IGANDEA" => rand(1, 10)
);

$suma = 0;
$media = 0;

echo ("Ejercicio 03");
echo ("</br>-------------------------------");

foreach ($semana as $dia => $numero) {
    $suma = $suma + $numero;
    echo ("</br>" . $dia . ": " . $numero);
}

echo ("</br>-------------------------------");

echo ("</br> La suma es: " . $suma);

$media = $suma / count($semana);

echo ("</br> La media es: " . $media);

echo ("</br>-------------------------------");

?>