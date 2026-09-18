<?php
/*
Ejercicio 05
Crear un programa que imprima la figura de un triángulo rectángulo
de 10 líneas ajustada a la izquierda, formada por letras “o”.
o
oo
ooo
oooo
ooooo
oooooo
ooooooo

Build-in: http://localhost:8000/Actividad_2/ejercicio05.php
Xdebug: http://php-mvc.localhost/Actividad_2/ejercicio05.php
*/

$n = 10; 
$relleno = 0; 
$fila = 1;

$linea = "";

echo("Ejercicio 05");
echo("</br>-------------------------------</br>");

echo("Triangulo rectangulo de " . $n . " x  " . $n . " x  " . $n . " con WHILE");

while ($fila <= $n){ 
    $relleno = 1; 
    echo("</br>");
    
    while ($relleno <= $fila){ 
        echo("o"); 
        $relleno++; 
    } 

    $fila++; 
} 
 
echo("</br>");
echo("Triangulo rectangulo de " . $n . " x  " . $n . " x  " . $n . " con FOR 1");

for($i = 1; $i <= 10; $i++){
    $linea = $linea . "o";

     echo("</br>" . $linea);
}

/*
echo("</br>");
echo("Triangulo rectangulo de " . $n . " x  " . $n . " x  " . $n . " con FOR 2");

for($i = 0; $i < 40; $i++) {
    for ($j = 0; $j < $i; $j++) {
        echo "o";
    }
    echo "</br>";
}

*/
    
echo("</br>-------------------------------");

?>