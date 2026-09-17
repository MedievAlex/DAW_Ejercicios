<?php
/*
Ejercicio 01
Mostrar en pantalla números del 1 al 100. Con While y con For.

Build-in: http://localhost:8000/Actividad_2/ejercicio01.php
Xdebug: http://php-mvc.localhost/Actividad_2/ejercicio01.php
*/

$contador = 1;

echo("Ejercicio 01");
echo("</br>-------------------------------</br>");

echo("[Contador ascendente FOR]");

for($i = 1; $i <= 100; $i++){
    echo("</br>");
    echo($i);
}

echo("</br>");
echo("[Contador ascendente WHILE]");

while($contador <= 100){
    echo("</br>");
    echo($contador);
    $contador++;
}

echo("</br>-------------------------------");

?>