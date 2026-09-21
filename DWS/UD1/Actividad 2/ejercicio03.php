<?php
/*
Ejercicio 03
Definir una variable llamada “pares” y asignarle un valor booleano.
Si es true, mostrar en pantalla números pares del 1 al número
aleatorio menor que 99 si se le ha asignado el valor FALSE a la
variable pares en la pantalla tienen que aparecer los valores impares.

Build-in: http://localhost:8000/Actividad_2/ejercicio03.php
Xdebug: http://php-mvc.localhost/Actividad_2/ejercicio03.php
*/

$pares = true;
$par = null;
$contador = rand(1, 98);

echo ("Ejercicio 03");
echo ("</br>-------------------------------</br>");

if ($pares) {
    echo ("Mostrar numeros pares hasta " . $contador);
} else {
    echo ("Mostrar numeros impares hasta " . $contador);
}

for($i = 0; $i < $contador; $i++){
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