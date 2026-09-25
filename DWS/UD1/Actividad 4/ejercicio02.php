<?php
/*
Ejercicio 02
En una zapatería sólo se venden 5 productos. Tengo los productos y
los precios guardados en 2 arrays (en uno los productos y en otro los
precios). Hay que visualizar cada producto con su precio.

Build-in: http://localhost:8000/Actividad_4/ejercicio02.php
Xdebug: http://php-mvc.localhost/Actividad_4/ejercicio02.php
*/

$productos = array("Botas", "Pantunflas", "Deportivas", "Zapatos", "Chancletas");
$precios  = array(45.95, 12.99, 38.95, 52, 5);

echo ("Ejercicio 02");
echo ("</br>-------------------------------");

echo ("</br> PRODUCTOS");
for ($i = 0; $i < count($productos); $i++) {
    echo ("</br>- " . $productos[$i] . " " . $precios[$i] . "€");
}

echo ("</br>-------------------------------");

?>