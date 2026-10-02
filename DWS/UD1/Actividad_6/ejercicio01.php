<?php
/*
Ejercicio 01
Crear un formulario de login y visulizar la información en pantalla. Los
campos del formulario serán usuario y contraseña. El formulario
enviará la información por POST. Al principio hacer la prueba con
GET para ver cómo se envían los parámetros.

Build-in: http://localhost:8000/UD1/Actividad_6/ejercicio01.php
Xdebug: http://dws-php.localhost/UD1/Actividad_6/ejercicio01.php
/UD1/Actividad_6/ejercicio01.php
*/

if (isset($_POST["userName"]) && isset($_POST["userPsw"])) {
    $userName = $_POST["userName"];
    $userPsw = $_POST["userPsw"];

    if (trim($userName) != "" && trim($userPsw) != "") {

        echo ("Ejercicio 01");
        echo ("</br>-------------------------------</br>");

        echo ("Usuario: " . $userName);
        echo ("</br>");
        echo ("Contraseña: " . $userPsw);

        echo ("</br>-------------------------------");
    } else {
        echo ("[ERROR]: El parámetro Usuario o Contraseña no es válido.");
    }
} else {
    echo ("[ERROR]: El parámetro Usuario o Contraseña no existe.");
}

?>