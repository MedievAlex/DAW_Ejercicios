<?php
/*
Ejercicio 07
Hasta ahora para visualizar el contenido de una variable hemos
utilizado echo o print. En el caso de los arrays se puede utilizar la
orden print_r($array) para visualizar el contenido del array junto con
su índice.
Se debe realizar un programa que cree un array con 10 números
aleatorios (números entre 1 y 200) los imprima de las dos formas que
aparecen en pantalla y después los imprima al revés. 

Build-in: http://localhost:8000/Actividad_4/ejercicio07.php
Xdebug: http://php-mvc.localhost/Actividad_4/ejercicio07.php
*/

$numeros = array();

echo ("Ejercicio 07");
echo ("</br>-------------------------------</br>");

echo ("NUMEROS");
for ($i = 0; $i < 10; $i++) {
    echo ("</br>");
    $numeros[$i] = rand(1, 200);
    echo ("- " . $numeros[$i]);
}

echo ("</br>");
print_r($numeros);

echo ("</br>");
echo ("NUMEROS ORDEN INVERSO");
for ($i = 10; $i > 0; $i--) {
    echo ("</br>");
    echo ("- " . $numeros[$i - 1]);
}

echo ("</br>");
print_r(array_reverse($numeros));

echo ("</br>-------------------------------");

?>
