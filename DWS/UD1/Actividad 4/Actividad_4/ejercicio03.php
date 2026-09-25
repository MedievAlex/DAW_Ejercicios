<?php
/*
Ejercicio 03
Para realizar este ejercicio copiar y renombrar el ejercicio02. Nuestra
zapatería pondrá rebajas. Hay que cambiar los precios de todos los
productos. La rebaja estará guardada en una variable y será un tanto
por ciento. (20%, 50%,...) ejemplo: $rebaja = 20;
Por pantalla se imprimirán los productos con viejo y el precio nuevo,
los nuevos precios se guardarán en el array de precios (al finalizar el
programa el array de precios quedará con los los precios nuevos).

Build-in: http://localhost:8000/Actividad_4/ejercicio03.php
Xdebug: http://php-mvc.localhost/Actividad_4/ejercicio03.php
*/

$productos = array("Botas", "Pantunflas", "Deportivas", "Zapatos", "Chancletas");
$precios  = array(45.95, 12.99, 38.95, 52, 5);
$rebaja = 25;
$precioRebajado = 0;

echo("Ejercicio 03");
echo("</br>-------------------------------");

echo("</br> PRODUCTOS");
for($i = 0; $i < count($productos); $i++){
    $precioRebajado = round($precios[$i] * ((100 - $rebaja)/100),2);;
    echo("</br>- " . $productos[$i] . " rebajadas de " . $precios[$i] . "€ un " . $rebaja . "% a " . $precioRebajado . "€");
    $precios[$i] = $precioRebajado;
}

echo("</br>-------------------------------");

echo("</br> PRECIOS NUEVOS");
for($i = 0; $i < count($productos); $i++){
    echo("</br>- " . $productos[$i] . " " . $precios[$i] . "€");
}

echo("</br>-------------------------------");

?>