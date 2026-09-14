<?php
/*
Ejercicio 09
Definir dos notas en dos variables y calcular si la media es aprobada
o suspendida.

http://localhost:8000/Actividad_1/ejercicio09.php
*/

$not1 = 4;
$not2 = 7;
$med = ($not1 + $not2) / 2;

echo("Ejercicio 09");
echo("</br>-------------------------------");
echo("</br>");
echo("Nota uno: " . $not1);
echo("</br>");
echo("Nota dos: " . $not2);
echo("</br>");
echo("Media: " . $med);

if($med < 5){
    echo(" suspendida");

} else {
    echo(" aprobada");

}

echo("</br>-------------------------------");

?>