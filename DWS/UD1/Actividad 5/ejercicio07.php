<?php
/*
Ejercicio 07
Tenemos los siguientes 6 arrays:
    • $ar_estados = array(
            "China" => "",
            "Francia" => "",
            "Somalia" => "",
            "Canada" => "",
            "Australia" => "",
            "Marruecos" => "",
            "Italia" => "",
            "Nueva Zelanda" => "",
            "Argentina" => "",
            "Japon" => ""
        );
    • $ar_Asia=array("China","Rusia","Japon");
    • $ar_Africa=array("Mali","Egipto","Somalia");
    • $ar_America=array("Chile","EEUU","Argentina","Canada");
    • $ar_Oceania=array("Nueva Zelanda","Papua","Australia");
Rellena $ar_estados con el continente de cada estado.

Build-in: http://localhost:8000/Actividad_5/ejercicio07.php
Xdebug: http://php-mvc.localhost/Actividad_5/ejercicio07.php
*/

$ar_estados = array(
    "China" => "",
    "Francia" => "",
    "Somalia" => "",
    "Canada" => "",
    "Australia" => "",
    "Marruecos" => "",
    "Italia" => "",
    "Nueva Zelanda" => "",
    "Argentina" => "",
    "Japon" => ""
);

$ar_Europa=array("Francia","Italia","Grecia");
$ar_Asia=array("China","Rusia","Japon");
$ar_Africa=array("Mali","Egipto","Somalia");
$ar_America=array("Chile","EEUU","Argentina","Canada");
$ar_Oceania=array("Nueva Zelanda","Papua","Australia");

echo ("Ejercicio 07");
echo ("</br>-------------------------------</br>");

foreach ($ar_estados as $estado => $continente) {
/*
    foreach ($continentes as $continente => $paisesC) {
        if (str_contains($paisesC, $pais)) {

            for ($i = 0; $i < count($poblaciones); $i++) {
                if (explode("-", $poblaciones[$i])[0] < $poblacion && $poblacion < explode("-", $poblaciones[$i])[1]) {
                    echo ("</br>" . $pais . " es un país " . strtolower(explode("-", $poblaciones[$i])[2]) . " de " . $continente);
                }
            }
        }
    }
*/
}

echo ("</br>-------------------------------");

?>