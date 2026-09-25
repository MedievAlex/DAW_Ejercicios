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

$ar_Europa = array("Francia", "Italia", "Grecia");
$ar_Asia = array("China", "Rusia", "Japon");
$ar_Africa = array("Mali", "Egipto", "Somalia");
$ar_America = array("Chile", "EEUU", "Argentina", "Canada");
$ar_Oceania = array("Nueva Zelanda", "Papua", "Australia");

$ar_continentes = array(
    "Europa" => $ar_Europa,
    "Asia" => $ar_Asia,
    "Africa" => $ar_Africa,
    "America" => $ar_America,
    "Oceanida" => $ar_Oceania
);

echo ("Ejercicio 07");
echo ("</br>-------------------------------");

foreach ($ar_estados as $estado => $es_continente) {

    foreach ($ar_continentes as $continente => $co_paises)

        for ($i = 0; $i < count($co_paises); $i++) {
            if ($estado == $co_paises[$i]) {
                $es_continente = $continente;
            }
        }

        if($es_continente == ""){
            $es_continente = "DESCONOCIDO";
        }

    echo ("</br>" . $estado . " - " . $es_continente);
}

echo ("</br>-------------------------------");

?>
