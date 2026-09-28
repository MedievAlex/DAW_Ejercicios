<?php
/*
Ejercicio 01
Crear un formulario de login y visulizar la información en pantalla. Los
campos del formulario serán usuario y contraseña. El formulario
enviará la información por POST. Al principio hacer la prueba con
GET para ver cómo se envían los parámetros.

Build-in: http://localhost:8000/Actividad_6/ejercicio01.php
Xdebug: http://php-mvc.localhost/Actividad_6/ejercicio01.php
*/

if (isset($_GET["numLineas"])) {
    echo ("Ejercicio 01");
    echo ("</br>-------------------------------</br>");

    

    echo ("</br>-------------------------------");
} else {
    echo ("No se a recibido el parámetro Numero.");
}

?>