<?php
/*
Ejercicio 06
El servidor recibirá un número. Tenemos que sacar por pantalla todos
los números primos que hay desde el 1 hasta ese número.

Build-in: http://localhost:8000/Actividad_3/ejercicio06.php?numero=20
Xdebug: http://php-mvc.localhost/Actividad_3/ejercicio06.php?numero=20
*/

$numero = $_GET["numero"];
$primo = true;

echo ("Ejercicio 06");
echo ("</br>-------------------------------</br>");

echo ("Numero primos hasta el " . $numero);

for ($i = 1; $i <= $numero; $i++) {
    $divisiones = 0; 
    for ($j = 1; $j <= $i; $j++) {
        if ($i % $j == 0) {
            $divisiones = $divisiones + 1;
        }
    }
    if ($divisiones == 2 or $i == 1) {
        echo("<br>");
        echo($i);
    }
}

echo ("</br>-------------------------------");

?>