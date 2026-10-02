<?php
/*
Ejercicio 02
Realiza la suma desde un número (primerNum) hasta otro
(ultimoNum). Los valores de los dos parámetros se enviarán por GET.

Build-in: http://localhost:8000/UD1/Actividad_3/ejercicio02.php?primerNum=5&ultimoNum=10
Xdebug: http://dws-php.localhost/UD1/Actividad_3/ejercicio02.php?primerNum=5&ultimoNum=10
*/

if (isset($_GET["primerNum"], $_GET["ultimoNum"])) {
    $primerNum = $_GET["primerNum"];
    $ultimoNum = $_GET["ultimoNum"];

    if (is_int($primerNum) && is_int($ultimoNum)) {
        $contador = $primerNum;
        $suma = 0;

        echo ("Ejercicio 04");
        echo ("</br>-------------------------------");

        for ($i = $primerNum; $i <= $ultimoNum; $i++) {
            $suma = $suma + $i;
            echo ("</br>");
            echo (($suma - $i) . " + " . $i . " = " . $suma);
        }

        echo ("</br>-------------------------------");
    } else {
        echo ("[ERROR]: El parámetro Primer numero o Ultimo numero no es válido.");
    }
} else {
    echo ("[ERROR]: El parámetro Primer numero o Ultimo numero no existe.");
}

?>