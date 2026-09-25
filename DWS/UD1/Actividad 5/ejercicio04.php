<?php
/*
Ejercicio 04
Crea un array asociativo y ordenalo dependiendo del key y del valor.
Para ello has de utilizar las funciones ksort y natsort. 

Build-in: http://localhost:8000/Actividad_5/ejercicio04.php
Xdebug: http://php-mvc.localhost/Actividad_5/ejercicio04.php
*/

$valores = array(
    "A" => rand(1, 10),
    "E" => rand(1, 10),
    "C" => rand(1, 10),
    "B" => rand(1, 10),
    "G" => rand(1, 10),
    "D" => rand(1, 10),
    "F" => rand(1, 10)
);

echo ("Ejercicio 04");
echo ("</br>-------------------------------</br>");

echo ("ORDEN POR KEY");

ksort($valores);

foreach ($valores as $letra => $numero) {
    echo ("</br>" . $letra . " - " . $numero);
}
echo ("</br>");

echo ("ORDEN NATURAL");

natsort($valores);

foreach ($valores as $letra => $numero) {
    echo ("</br>" . $letra . " - " . $numero);
}

echo ("</br>-------------------------------");

?>