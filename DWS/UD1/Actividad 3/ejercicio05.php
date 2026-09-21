<?php
/*
Ejercicio 05
El servidor recibirá un número. El programa tendrá que decirnos si
es primo o no.

Build-in: http://localhost:8000/Actividad_3/ejercicio05.php?numero=7
Xdebug: http://php-mvc.localhost/Actividad_3/ejercicio05.php?numero=7
*/

$numero = $_GET["numero"];
$contador = 2;
$primo = true;

echo ("Ejercicio 05");
echo ("</br>-------------------------------</br>");

while ($primo && ($contador != $numero)) {
    if ($numero % $contador == 0) {
        $primo = false;
    }
    $contador++;
}

if ($primo) {
    echo ("Es un numero primo.");
} else {
    echo ("No es un numero primo.");
}

echo ("</br>-------------------------------");

?>