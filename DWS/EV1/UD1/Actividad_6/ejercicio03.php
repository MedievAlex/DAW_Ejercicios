<?php
/*
Ejercicio 03
Realizar una página web llamada calculadora.html. Se introducirán
dos números y según el botón pulsado realizará la operación
correspondiente:
    o Se deberá controlar que los números introducidos son
    enteros. Se indicará con un mensaje si no es así.
    o Se controlará si se han enviado los datos enviados
    mediante la función isset.
    o En caso de error se mantendrán los números en los
    textbox.

Build-in: http://localhost:8000/UD1/Actividad_6/ejercicio03.php
Xdebug: http://dws-php.localhost/UD1/Actividad_6/ejercicio03.php
*/

if (isset($_GET["numUno"], $_GET["numDos"])) {
    $primerNum = $_GET["numUno"];
    $ultimoNum = $_GET["numDos"];

echo ("Ejercicio 03");
echo ("<br>-------------------------------<br>");

if (isset($_POST["btnSuma"])) {



}

echo ("</br>-------------------------------");
} else {
    echo ("[ERROR]: El parámetro Primer numero o Ultimo numero no existe.");
}

?>