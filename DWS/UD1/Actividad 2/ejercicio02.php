
<?php
/*
Ejercicio 02
Mostrar en pantalla números pares del 100 al 1. Con While y con
For.

Build-in: http://localhost:8000/Actividad_2/ejercicio02.php
Xdebug: http://php-mvc.localhost/Actividad_2/ejercicio02.php
*/

$contador = 100;

echo("Ejercicio 01");
echo("</br>-------------------------------</br>");

echo("[Contador descendente FOR]");

for($i = $contador; $i > 0; $i--){
    if($i%2 == 0){
    	echo("</br>");
    	echo($i);
    }
}

echo("</br>");
echo("[Contador descendente WHILE]");

while($contador > 0){
    if($contador%2 == 0){
    	echo("</br>");
    	echo($contador);
    }
    $contador--;
}

echo("</br>-------------------------------");

?>