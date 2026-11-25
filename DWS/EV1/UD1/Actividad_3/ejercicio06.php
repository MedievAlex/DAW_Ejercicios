<?php
/*
Ejercicio 06
El servidor recibirá un número. Tenemos que sacar por pantalla todos
los números primos que hay desde el 1 hasta ese número.

Build-in: http://localhost:8000/UD1/Actividad_3/ejercicio06.php?numero=20
Xdebug: http://dws-php.localhost/UD1/Actividad_3/ejercicio06.php?numero=20
*/

if (isset($_GET["numero"])) {
    $numero = $_GET["numero"];

    if (is_int($numero)) {
        $primo = true;

        echo ("Ejercicio 05");
        echo ("<br>-------------------------------<br>");

        echo ("Numero primos hasta el " . $numero);

        for ($i = 1; $i <= $numero; $i++) {
            $divisiones = 0;
            for ($j = 1; $j <= $i; $j++) {
                if ($i % $j == 0) {
                    $divisiones = $divisiones + 1;
                }
            }
            if ($divisiones == 2 or $i == 1) {
                echo ("<br>");
                echo ($i);
            }
        }

        echo ("<br>-------------------------------");
    } else {
        echo ("[ERROR]: El parámetro Numero no es válido.");
    }
} else {
    echo ("[ERROR]: El parámetro Numero no existe.");
}

?>