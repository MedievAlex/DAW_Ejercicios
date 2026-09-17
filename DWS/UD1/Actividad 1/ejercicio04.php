<?php
/*
Ejercicio 04
Define tres variables y ordenar en orden ascendente. Despúes en
orden descendente. Con IF.

Build-in: http://localhost:8000/Actividad_1/ejercicio04.php
Xdebug: http://php-mvc.localhost/Actividad_1/ejercicio04.php
*/

$num1 = 5;
$num2 = 10;
$num3 = 7;

$array_des = array();
$array_asc = array();

echo("Ejercicio 04");
echo("</br>-------------------------------</br>");

echo("Numeros: " . $num1 . ", " . $num2 . ", " . $num3);
echo("</br>");

if($num1 > $num2){
// El numero 1 es el mayor o intermedio
    if($num1 > $num3){ 
    // El numero 1 es el mayor
    $array_des[] = $num1;

        if($num2 > $num3){ 
        // El numero 2 es el intermedio y el numero 3 el pequeño
        $array_des[] = $num2;
        $array_des[] = $num3;
            
        } else {
        // El numero 3 es el intermedio y el numero 2 el pequeño
        $array_des[] = $num3;
        $array_des[] = $num2;

        }

    } else {
    // El numero 1 es el intermedio y el numero 3 el mayor
    $array_des[] = $num3;
    $array_des[] = $num1;
    $array_des[] = $num2;

    }
} else {
// El numero 2 es el mayor o intermedio
    if($num2 > $num3){ 
    // El numero 2 es el mayor
    $array_des[] = $num2;

        if($num1 > $num3){ 
        // El numero 1 es el intermedio y el numero 3 el pequeño
        $array_des[] = $num1;
        $array_des[] = $num3;
            
        } else {
        // El numero 3 es el intermedio y el numero 1 el pequeño
        $array_des[] = $num3;
        $array_des[] = $num1;

        }
    } else {
    // El numero 2 es el intermedio y el numero 3 el mayor
    $array_des[] = $num3;
    $array_des[] = $num2;
    $array_des[] = $num1;

    }
}

echo("Orden descendente: ");
for($i = 0; count($array_des) > $i; $i++){
    echo($array_des[$i]);
    echo(" ");
}
echo("</br>");
for($i = count($array_des)-1; 0 <= $i; $i--){
    $array_asc[] = $array_des[$i];
    echo(" ");
}

echo("Orden ascendente: ");
for($i = 0; count($array_asc) > $i; $i++){
    echo($array_asc[$i]);
    echo(" ");
}

echo("</br>-------------------------------");

?>