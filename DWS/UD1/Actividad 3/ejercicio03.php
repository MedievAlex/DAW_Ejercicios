<?php
/*
Ejercicio 03
Se recibirá un dato llamado pares por GET que contendrá TRUE o
FALSE. Si es TRUE, mostrar en pantalla números pares del 1 al
número aleatorio menor que 99 si se le ha recibido el valor FALSE en
la pantalla tienen que aparecer los valores impares.

Build-in: http://localhost:8000/Actividad_3/ejercicio03.php?pares=on
Xdebug: http://php-mvc.localhost/Actividad_3/ejercicio03.php?pares=on
*/

$pares = $_GET["pares"];
$par = null;
$contador = rand(1, 98);

echo ("Ejercicio 03");
echo ("</br>-------------------------------</br>");

if ($pares) {
    echo ("Mostrar numeros pares hasta " . $contador);
} else {
    echo ("Mostrar numeros impares hasta " . $contador);
}

for($i = 1; $i < $contador; $i++){
    if ($i % 2 == 0) {
        $par = true;
    } else {
        $par = false;
    }

    if ($par == $pares) {
        echo ("</br>");
        echo ($i);
    }
}

echo ("</br>-------------------------------");

?>