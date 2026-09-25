<?php
/*
Ejercicio 02
Crear un array asociativo con los nombres de meses como índice y
los números de los días valor. A continuación mostrar en pantalla. 

Build-in: http://localhost:8000/Actividad_5/ejercicio02.php
Xdebug: http://php-mvc.localhost/Actividad_5/ejercicio02.php
*/

$dias31 = 31;
$dias30 = 30;
$dias28 = 28;

$calendario = array(
    "ENERO" => $dias31,
    "FEBRERO" => $dias28,
    "MARZO" => $dias31,
    "ABRIL" => $dias30,
    "MAYO" => $dias30,
    "JUNIO" => $dias31,
    "JULIO" => $dias31,
    "AGOSTO" => $dias30,
    "SEPTIEMBRE" => $dias31,
    "OCTUBRE" => $dias30,
    "DICIEMBRE" => $dias31
);

echo ("Ejercicio 02");
echo ("</br>-------------------------------");

foreach ($calendario as $mes => $dia) {
    echo ("</br>" . $mes . " tiene " . $dia . " dias");
}

echo ("</br>-------------------------------");

?>